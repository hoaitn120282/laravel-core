<?php

namespace App\Modules\ContentManager\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\SiteManager\Models\Clinic;
use App\Modules\TemplateManager\Models\Template;
use App\Modules\ContentManager\Models\User;
use DB;
use Illuminate\Support\Facades\Input;
use App\Modules\ContentManager\Models\UserMeta;
class DefaultController extends Controller
{
    public function index(Request $request){
        $q= Input::get("q");
        $sites = Clinic::count();
        $templates = Template::count();

        $filters = [];

        if (isset($q)){
            $filters[] = [
                'property' => 'name',
                'operator' => 'like',
                'value' => $q
            ];
        }
//        $users = User::applyFilter($filters)
//            ->with(['meta' => function($query) {
//                return $query->orderBy('user_meta.created_at', 'desc');
//            }])
//            ->paginate(10);

        $users = User::applyFilter($filters)
            ->with(['meta' => function($query) {
                return $query->orderBy('user_meta.created_at', 'desc');
            }])
            ->paginate(10);


    	return view("ContentManager::index", compact('sites', 'templates', 'users', 'q'));
    }
}
