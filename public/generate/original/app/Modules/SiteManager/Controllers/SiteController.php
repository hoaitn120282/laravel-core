<?php

namespace App\Modules\SiteManager\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\ContentManager\Models\ThemeMeta;
use App\Modules\LanguageManager\Models\Language;
use App\Modules\SiteManager\Models\ClinicDatabase;
use App\Modules\SiteManager\Models\ClinicHosting;
use App\Modules\SiteManager\Models\ClinicInfo;
use App\Modules\SiteManager\Models\Hosting;
use App\Modules\SiteManager\Models\ClinicLanguage;
use App\Modules\SiteManager\Models\ClinicTheme;
use App\Modules\SiteManager\Models\ThemeType;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Session;
use Validator;
use DB;
use Flash;
use Mail;
use App\Facades\Admin;
use App\Facades\Theme;
use App\Modules\TemplateManager\Models\Template;
use App\Modules\ContentManager\Models\Themes;
use App\Modules\SiteManager\Models\Clinic;
use App\Repositories\ClinicRepository;

use File;
use View;

class SiteController extends Controller
{

    /** @var  ClinicRepository */
    private $clinicRepository;

    public function __construct(ClinicRepository $clinicRepo) {
        $this->clinicRepository = $clinicRepo;
    }

    /**
     * Show list of site library.
     *
     * @return Response
     */
    public function index($theme_type_id = 0, $status = -1)
    {
        $templates = \Session::set('templates', []);
        $theme_type = ThemeType::all();

        $query = Input::get("q");

        if($theme_type_id !=0){
            // get all theme has theme_type_id = $theme_type_id
            $templates = Template::where('theme_type_id', $theme_type_id)->where('is_publish', 1)->get();

            $theme_ids = [];
            foreach ($templates as $temp){
                array_push($theme_ids, $temp->id);
            }

            $clinicThemes = ClinicTheme::whereIn('theme_id',$theme_ids)->get();
            $clinic_ids = [];

            foreach ($clinicThemes as $ct){
                array_push($clinic_ids, $ct->clinic_id);
            }

            if($status != -1){
                // filter template, filter status
                $clinics = Clinic::whereIn('clinic_id', $clinic_ids)->where('status', $status)->paginate(10);
            }else{
                // filter template, not filter status
                $clinics = Clinic::whereIn('clinic_id', $clinic_ids)->paginate(10);
            }

        }else{
            if($status!= -1) {
                // No filter template, filter by status
                $clinics = Clinic::where('status', $status)->paginate(10);
            }else{
                // No filter all.
                $clinics = Clinic::paginate(10);
            }
        }

        foreach ($clinics as &$site){
            $clinicThemes =  ClinicTheme::where('clinic_id',$site->clinic_id)->first();
            if($clinicThemes){
                $site->firstThemeId = $clinicThemes->theme_id;
            }else{
                $site->firstThemeId = 0;
            }
        }

        return view('SiteManager::index', [
            'clinics' => $clinics,
            'theme_type'=> $theme_type,
            'theme_type_id' => $theme_type_id,
            'status' => $status,
            'query'=> $query
        ]);
    }

    /**
     * @return view send email
     */

    public function sendEmail(Request $request) {
        $email = $request->all();
        Mail::send('SiteManager::email', array(
            'adminName'=>$email["adminName"],
            'password'=>$email['password'],
            'usernameName'=>$email['usernameName'],
            'siteName'=>$email['siteName']
        ), function($message) use ($email) {
            $message->to($email['email'], 'Sanmax')->subject('Sanmax email!');
        });
        Session::flash('flash_message', 'Send message successfully!');

    }

    /**
     * Show site detqail.
     *
     * @return Response
     */
    public function getSiteDetail($id)
    {
        $site = Clinic::find($id);
        $languageSelected = [];
        $languages = Language::get();

        for($i=0 ; $i < count($site->language) ; $i++) {
            foreach ($languages as $lang) {
                if ($lang->language_id == $site->language[$i]->language_id) {
                    array_push($languageSelected, $lang->name);
                }
            }
        }

        $templates = \Session::get('templates', []);

        if (empty($site)) {
            return redirect(Admin::route('siteManager.index'));
        }

        return view('SiteManager::site-detail', ['site' => $site, 'templates' => $templates, 'languageSelected' => $languageSelected]);
    }

    /**
     * Show site edit.
     *
     * @return Response
     */
    public function editInfo($id)
    {
        $site = Clinic::find($id);
        $languages = Language::get();
        if (empty($site)) {
            return redirect(Admin::route('siteManager.index'));
        }

        $langs = $site->language;
        $languageSelected = [];
        foreach ($langs as $la) {
            array_push($languageSelected, $la->language_id);
        }

        return view('SiteManager::edit.edit', ['site' => $site, 'languages'=> $languages, 'languageSelected'=> $languageSelected]);
    }

    /*
     * Add new site site - step 1 : select template
     * @param : null
     * Save selected template to session
     * */
    public function selectTemplate($theme_type = 0){
        $query = Input::get("q");
        if ($theme_type == 0) {
            $templates = Template::where('theme_type_id', '<>', 3)
                ->where('is_publish',1)
                ->where('name', 'like', '%'.$query.'%')
                ->paginate(6);
        } else {
            $templates = Template::where('theme_type_id', '<>', 3)
                ->where('is_publish',1)
                ->where('name', 'like', '%'.$query.'%')
                ->where('theme_type_id', $theme_type)
                ->paginate(6);
        }
        $selected =  \Session::get('templates',[]);

        return view('SiteManager::create.step-1-select-template',
            [
                'templates'=> $templates,
                'theme_type' => $theme_type,
                'selected' =>$selected,
                'query' => $query
            ]
        );
    }

    /*
     *  Add new site site - step 2: Add info site site
     * @param : null
     * */
    public function addInfo(Request $request){
        $languages = Language::get();
        $templates = \Session::get('templates', []);

        if (count($templates) == 0) {
            Session::flash('message', 'Please select at least 1 template!');
            Session::flash('alert-class', 'alert-danger');
            return redirect(Admin::route('siteManager.select-template'));
        } else {
            return view('SiteManager::create.step-2-add-info', ['languages' => $languages]);
        }
    }

    //Create site
    public function createInfo(Request $request){
        $input = Input::all();
        $templates = \Session::get('templates', []);

        $languages = $request->get('language');

        $rules = array(
            'site-name' => 'required',
            'admin-name' => 'required',
            'email-address' => 'required|email',
            'address' => 'required',
            'telephone' => 'required|numeric',
            'language' =>'required',
//            'domain' => 'required',
//            'host' => 'required',
//            'host-username' => 'required',
//            'host-password' => 'required',
//            'database-name' => 'required',
//            'database-host' => 'required',
//            'database-password' => 'required',
//            'database-username' => 'required',
        );

        $messages = [
            'site-name.required' => 'The Site Name field is required.',
            'admin-name.required' => 'The Admin Name field is required.',
            'email-address.required' => 'The Email Address field is required.',
            'email-address.email' => 'Please enter a valid email address.',
            'address.required' => 'The Address field is required.',
            'telephone.required' => 'The Telephone field is required.',
            'telephone.numeric' => 'Please enter a valid number.',
//            'domain.required' => 'The Domain field is required.',
//            'host.required' => 'The Host field is required.',
//            'host-username.required' => 'The Host Username field is required.',
//            'host-password.required' => 'The Host Password field is required.',
//            'database-name.required' => 'The Database Name field is required.',
//            'database-host.required' => 'The Database Host field is required.',
//            'database-password.required' => 'The Database Password field is required.',
//            'database-username.required' => 'The Database Username field is required.',
            'language.required' => 'The Language field is required.',
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails())
        {
            return redirect('admin/site-manager/add-info')
                ->withErrors($validator)
                ->withInput();
        } else {
            $site = new Clinic();
            $site->domain = $input['domain'];
            $site->save();
            $clinicId = $site->clinic_id;

            // save site info table
            $clinicInfo = new ClinicInfo();
            $clinicInfo->site_name = $input['site-name'];
            $clinicInfo->email = $input['email-address'];
            $clinicInfo->username = $input['admin-name'];
            $clinicInfo->telephone = $input['telephone'];
            $clinicInfo->address = $input['address'];
            $clinicInfo->site()->associate($site);
            $clinicInfo->save();

            // save site database table
            $clinicDatabase = new ClinicDatabase();
            $clinicDatabase->database_name = $input['database-name'];
            $clinicDatabase->host = $input['database-host'];
            $clinicDatabase->username = $input['database-username'];
            $clinicDatabase->password = bcrypt($input['database-password']);
            $clinicDatabase->site()->associate($site);
            $clinicDatabase->save();

            // save site hosting table
            $clinicHosting = new ClinicHosting();
            $clinicHosting->host = $input['host'];
            $clinicHosting->username = $input['host-username'];
            $clinicHosting->password =bcrypt($input['host-password']);
            $clinicHosting->site()->associate($site);
            $clinicHosting->save();

            // save site language table
            foreach ($languages as $langu){
                $clinicLanguage = new ClinicLanguage();
                $clinicLanguage->language_id = $langu;
                $clinicLanguage->site()->associate($site);
                $clinicLanguage->save();
            }

            // save site theme table
            foreach ($templates as $temp){
                $clinicTheme = new ClinicTheme();
                $clinicTheme->theme_id = $temp;
                $clinicTheme->site()->associate($site);
                $clinicTheme->save();
            }

            $templates = \Session::set('templates', []);

//            GenerateController::compress($clinicId);
            app('App\Modules\SiteManager\Controllers\GenerateController')->compress($clinicId);

            return redirect(Admin::route('siteManager.index'));
        }
    }

    //Update site info
    public function updateInfo($id, Request $request){
        $input = Input::all();;
        $languages = $request->get('language');

        $rules = array(
            'site-name' => 'required',
            'admin-name' => 'required',
            'email-address' => 'required|email',
            'address' => 'required',
            'telephone' => 'required|numeric',
            'language' =>'required',
        );

        $messages = [
            'site-name.required' => 'The Site Name field is required.',
            'admin-name.required' => 'The Admin Name field is required.',
            'email-address.required' => 'The Email Address field is required.',
            'email-address.email' => 'Please enter a valid email address.',
            'address.required' => 'The Address field is required.',
            'telephone.required' => 'The Telephone field is required.',
            'telephone.numeric' => 'Please enter a valid number.',
            'language.required' => 'The Language field is required.',
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails())
        {
            return redirect('admin/site-manager/edit-info/'.$id)
                ->withErrors($validator)
                ->withInput();
        } else {
            $site = Clinic::find($id);
            $site->domain = $input['domain'];
            $site->save();

            $site->info->site_name = $input['site-name'];
            $site->info->email = $input['email-address'];
            $site->info->username = $input['admin-name'];
            $site->info->telephone = $input['telephone'];
            $site->info->address = $input['address'];
            $site->info->save();

            $site->database->database_name = $input['database-name'];
            $site->database->host = $input['database-host'];
            $site->database->username = $input['database-username'];
            $site->database->password = bcrypt($input['database-password']);
            $site->database->save();

            $site->hosting->host = $input['host'];
            $site->hosting->username = $input['host-username'];
            $site->hosting->password =bcrypt($input['host-password']);
            $site->hosting->save();

            // edit site language table
            foreach ($site->language as $lang){
                $lang->delete();
            }

            foreach ($languages as $langu){
                $clinicLanguage = new ClinicLanguage();
                $clinicLanguage->language_id = $langu;
                $clinicLanguage->site()->associate($site);
                $clinicLanguage->save();
            }

    //        return redirect(Admin::route('siteManager.index'));
            return $this->getSiteDetail($id);
        }
    }

    /*
    * Edit site site : select template
    * @param : clinic_id
    * Save selected template to session
    * */
    public function updateTemplate($id, $theme_type = 0) {
        $query = Input::get("q");

        \Session::set('templatesUpdate',[]);

        $clinicThemes =  ClinicTheme::where('clinic_id',$id)->get();
        $templates = [];
        foreach ($clinicThemes as $ct){
                array_push($templates, $ct->theme_id);
        }
        \Session::set('templatesUpdate',$templates);

        if ($theme_type == 0) {
            $templatesUpdate = Template::where('theme_type_id', '<>', 3)
                ->where('is_publish',1)
                ->where('name', 'like', '%'.$query.'%')
                ->paginate(6);
        } else {
            $templatesUpdate = Template::where('theme_type_id', '<>', 3)
                ->where('is_publish',1)
                ->where('name', 'like', '%'.$query.'%')
                ->where('theme_type_id', $theme_type)
                ->paginate(6);
        }

        $selected =  \Session::get('templatesUpdate',[]);

        return view('SiteManager::edit.edit-template',
            [
                'id' => $id,
                'templatesUpdate'=> $templatesUpdate,
                'theme_type' => $theme_type,
                'selected' =>$selected,
                'query' => $query
            ]
        );
    }

    /*
    * Save site template
    * @param : clinic_id
    * Save selected template to table
    * */
    public function saveTemplate($id) {
        $site = Clinic::find($id);
        $templatesUpdate = \Session::get('templatesUpdate', []);

        if (count($templatesUpdate) == 0) {
            Session::flash('message', 'Please select at least 1 template!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('admin/site-manager/update-template/'.$id);
//            return redirect(Admin::route('siteManager.update-template/'.$id));
        } else {
            // edit site theme table
            foreach ($site->theme as $theme){
                $theme->delete();
            }

            foreach ($templatesUpdate as $temp){
                $clinicTheme = new ClinicTheme();
                $clinicTheme->theme_id = $temp;
                $clinicTheme->site()->associate($site);
                $clinicTheme->save();
            }
            $templatesUpdate = \Session::set('templatesUpdate', []);
            return redirect(Admin::route('siteManager.edit-info', ['id' => $id]));
        }
    }

    /*
     * Push template to session
     * When sanmax admin check or uncheck session
     * */
    public function toggleTemplateSession($id){
        $templates = \Session::get('templates', []);

        if (($key = array_search($id, $templates)) !== false) {
            unset($templates[$key]);
        }else{
            $templates[] = $id;
        }

        \Session::set('templates', $templates);
        \Session::save();
        $templates = \Session::get('templates',[]);
    }

    /*
    * Push templatesUpdate to session
    * When sanmax admin check or uncheck session
    * */
    public function toggleUpdateTemplateSession($id){
        $templatesUpdate = \Session::get('templatesUpdate', []);

        if (($key = array_search($id, $templatesUpdate)) !== false) {
            unset($templatesUpdate[$key]);
        }else{
            $templatesUpdate[] = $id;
        }

        \Session::set('templatesUpdate', $templatesUpdate);
        \Session::save();
        $templatesUpdate = \Session::get('templatesUpdate',[]);
    }

    /*
     * Destroy site info
     * */
    public function destroyInfo($clinicID){
        // delete site
        Clinic::destroy($clinicID);
    }

    /*
     * Download template
     * */
    public function download($filename = null){
        $file_path = public_path().'/generate/destination/'.$filename;
        if (file_exists($file_path))
        {
            return response()->download($file_path);
        }
        else
        {
            // Error
            exit('Requested file does not exist on our server!');
        }
    }
}