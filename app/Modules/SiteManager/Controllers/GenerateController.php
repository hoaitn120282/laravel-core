<?php

namespace App\Modules\SiteManager\Controllers;

use App\Facades\Theme;
use App\Http\Controllers\Controller;
use App\Modules\LanguageManager\Models\Countries;
use App\Modules\LanguageManager\Models\Language;
use App\Modules\SiteManager\Models\ClinicLanguage;
use ZipArchive;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use App\Modules\SiteManager\Models\Clinic;
use App\Modules\SiteManager\Models\ClinicTheme;
use App\Modules\ContentManager\Models\Themes;
use App\Modules\SiteManager\Models\ClinicHosting;
use App\Modules\SiteManager\Models\ClinicDatabase;

class GenerateController extends Controller
{
    public function __construct()
    {
    }

    /*
     * Move all file to public/temp
     * */
    public function compress($siteID = 0){
        if ($siteID == 0) {
            return;
        }
        // create temp folder in public/generate
        if (!file_exists(public_path().'/generate/temp')) {
            mkdir(public_path().'/generate/temp', 0777, true);
        }
        // copy to temp folder
        $this->recurse_copy(public_path().'/generate/original',public_path().'/generate/temp');

        // move Template file to temp
        $this->moveTemplateFile($siteID);

        // Dump all sql file to /public/generate/temp/database/site-site.sql
        $this->dumpData($siteID);

        // Update sql file : remove theme, and language not belong to site site
        $this->updateSql($siteID);

        // Update /app/theme.php for theme active of site site
        $this->updateConfigTheme($siteID);

        //update config locale in public/app.php
        $this->setDefaultLocale($siteID);

        // zip folder public/generate/temp
        $directory = public_path().'/generate/temp';
        \Zipper::make(public_path().'/generate/destination/'.$siteID.'.zip')->add($directory)->close();

        // Remove all file after upload to server
        $this->removeFolder(public_path().'/generate/temp');

        $checkHosing = $this->checkHosting($siteID);
        if($checkHosing){
            // If site deploy to current host => create execute.php file createNewFileExecute
            $this->createNewFileExecute($siteID);
        }

    }

    /*
     * PHP check different hosting
     * return true : same hosting
     * return false : different hosting
     * */
    public function checkHosting($siteId){
        return true;
    }

    /*
     * Deploy to sever
     * */
    public function deploy($siteId){
        // Upload package (.zip) to server
         $uploadZip =  $this->uploadUseFTP(public_path().'/generate/destination/'.$siteId.'.zip', 'new-site.zip', $siteId);

         if($uploadZip['status'] == 0) {
            return $uploadZip;
         }



        $this->uploadUseFTP(public_path().'/generate/'.$siteId.'-execute.php', 'execute.php', $siteId);
//        unlink(public_path().'/generate/execute.php');

        $ch = curl_init("http://sbd639-1.2ezcms.com/execute.php");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $r = curl_exec($ch);
        curl_close($ch);
    }

    public function updateSql($siteID){
        $ds = DIRECTORY_SEPARATOR;
        $path = public_path(). $ds .'generate'. $ds .'temp'. $ds .'database'.$ds ;
        $file = 'site-site.sql';
        $sqlPath = $path.$file;

        $clinicThemes = ClinicTheme::where('clinic_id',$siteID)->get();

        // get all theme id
        $themeids = [];
        foreach ($clinicThemes as $clinicTheme) {
            if(!in_array($clinicTheme->theme_id, $themeids)){
                array_push($themeids, $clinicTheme->theme_id);
            }
        }

        $themeRemoves = Themes::whereNotIn('id', $themeids)->get();

        $themeIDRemoves = [];
        foreach ($themeRemoves as $themeRemove) {
            if(!in_array($themeRemove->id, $themeIDRemoves)){
                array_push($themeIDRemoves, $themeRemove->id);
            }
        }

        foreach ($themeIDRemoves as $themeIDRemove) {
            $temp = 'DELETE FROM `themes` WHERE `themes`.`id` = '.$themeIDRemove.';';
            $myfile = file_put_contents($sqlPath, $temp.PHP_EOL , FILE_APPEND | LOCK_EX);
        }

        // Update theme active
        $setStatusTo0 = 'UPDATE themes SET `status` = 0 ;';
        file_put_contents($sqlPath, $setStatusTo0.PHP_EOL , FILE_APPEND | LOCK_EX);

        $firstThemeId = $this->getFirstThemeID($siteID);
        $updateStatusTo1 = 'UPDATE themes SET `status`=1 WHERE id='.$firstThemeId.';';
        file_put_contents($sqlPath, $updateStatusTo1.PHP_EOL , FILE_APPEND | LOCK_EX);

        // update language
        $clinicLanguages = ClinicLanguage::where('clinic_id',$siteID)->get();

        $languageids = [];
        foreach ($clinicLanguages as $clinicLanguage) {
            if(!in_array($clinicLanguage->language_id, $languageids)){
                array_push($languageids, $clinicLanguage->language_id);
            }
        }

        $langRemoves = Language::whereNotIn('language_id', $languageids)->get();

        $langIDRemoves = [];
        foreach ($langRemoves as $langRemove) {
            if(!in_array($langRemove->language_id, $langIDRemoves)){
                array_push($langIDRemoves, $langRemove->language_id);
            }
        }

        foreach ($langIDRemoves as $langIDRemove) {
            $temp = 'DELETE FROM `language` WHERE `language`.`language_id` = '.$langIDRemove.';';
            $myfile = file_put_contents($sqlPath, $temp.PHP_EOL , FILE_APPEND | LOCK_EX);
        }
    }

    public function createNewFileExecute($siteId){
        if (!$siteId ) return;
        $file = public_path().'/generate/execute-example.php';
        $newFile = public_path().'/generate/'.$siteId.'-execute.php';
        copy($file, $newFile);

        $clinicDatabase = ClinicDatabase::where('clinic_id', $siteId)->first();

        $ds = DIRECTORY_SEPARATOR;

        $dbhost = $clinicDatabase->host;
        $dbuser = $clinicDatabase->username;
        $dbpass = $clinicDatabase->password;
        $dbname = $clinicDatabase->database_name;


        $ds = DIRECTORY_SEPARATOR;
        $path = public_path(). $ds .'generate'. $ds ;
        $file = $siteId.'-execute.php';
        $appConfigPath = $path.$file;
        file_put_contents($appConfigPath,str_replace('dbhost-value', 'localhost', file_get_contents($appConfigPath)));
        file_put_contents($appConfigPath,str_replace('dbuser-value', $dbuser, file_get_contents($appConfigPath)));
        file_put_contents($appConfigPath,str_replace('dbpass-value', $dbpass, file_get_contents($appConfigPath)));
        file_put_contents($appConfigPath,str_replace('dbname-value', $dbname, file_get_contents($appConfigPath)));
    }

    public function setDefaultLocale($siteId){
        $clinicLanguages = ClinicLanguage::where('clinic_id',$siteId)->first();
        $languageId = $clinicLanguages->language_id;
        $language = Language::find($languageId);

        $countryId = $language->country_id;
        $country = Countries::find($countryId);
        $locale = $country->locale;

        $ds = DIRECTORY_SEPARATOR;
        $path = public_path(). $ds .'generate'. $ds .'temp'. $ds .'config'.$ds ;
        $file = 'app.php';
        $appConfigPath = $path.$file;
        file_put_contents($appConfigPath,str_replace('locale_value', $locale, file_get_contents($appConfigPath)));
    }

    /*
     * get Fist themeID of site site by Clinic site ID
     * */
    public function getFirstThemeID($siteId = null){
        if(!$siteId) return;
        $clinicThemes = ClinicTheme::where('clinic_id', $siteId)->first();
        $themeID = $clinicThemes->theme_id;
        return $themeID;
    }

    /*
     * Update config theme file config/theme.php
     * */
    public function updateConfigTheme($siteId = null){
        $firstThemeId = $this->getFirstThemeID($siteId);
        $theme = Themes::find($firstThemeId);

        $ds = DIRECTORY_SEPARATOR;
        $path = public_path(). $ds .'generate'. $ds .'temp'. $ds .'config'.$ds ;
        $file = 'theme.php';
        $themeConfigPath = $path.$file;

        $active = '$config[\'active\'] =\''.$theme->theme_root.'\';';
        $active_extra = '$config[\'active_extra\'] =\''.$theme->machine_name.'\';';
        $active_id = '$config[\'active_id\'] =\''.$theme->id.'\';';
        $driver = '$config[\'driver\'] =\'file\';';

        $endConfig =  'return $config;';

        file_put_contents($themeConfigPath, $active.PHP_EOL , FILE_APPEND | LOCK_EX);
        file_put_contents($themeConfigPath, $active_extra.PHP_EOL , FILE_APPEND | LOCK_EX);
        file_put_contents($themeConfigPath, $active_id.PHP_EOL , FILE_APPEND | LOCK_EX);
        file_put_contents($themeConfigPath, $driver.PHP_EOL , FILE_APPEND | LOCK_EX);
        file_put_contents($themeConfigPath, $endConfig.PHP_EOL , FILE_APPEND | LOCK_EX);
    }

    /*
     * Dump data for new site
     *
     * */
    public function dumpData($siteID){
        $ds = DIRECTORY_SEPARATOR;
        $host = env('DB_HOST');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $database = env('DB_DATABASE');

        $ts = time();
//        $path = database_path() . $ds . 'backups' . $ds . date('Y', $ts) . $ds . date('m', $ts) . $ds . date('d', $ts) . $ds;
//        $file = date('Y-m-d-His', $ts) . '-dump-' . $database . '.sql';

        $path = public_path(). $ds .'generate'. $ds .'temp'. $ds .'database'.$ds ;
        $file = 'site-site.sql';

        $command = sprintf('mysqldump -h %s -u %s -p\'%s\' %s > %s', $host, $username, $password, $database, $path . $file);

        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }
        exec($command);
    }

    public function moveTemplateFile($siteID){
        // get all theme id belong to this site
        $clinicThemes = ClinicTheme::where('clinic_id', $siteID)->get();

        // get all theme id
        $themeids = [];
        foreach ($clinicThemes as $clinicTheme) {
            if(!in_array($clinicTheme->theme_id, $themeids)){
                array_push($themeids, $clinicTheme->theme_id);
            }
        }

        $themes = Themes::whereIn('id',$themeids)->get();
        // find parent theme
        $themeOris = [];
        foreach ($themes as $theme){
            // check if parent_id = 0 and not in $themOris
            if(!in_array($theme->id, $themeOris) && $theme->parent_id ==0){
                array_push($themeOris, $theme->id);
            }
            // check if parent_id !=0 and not in $themeOris
            if(!in_array($theme->parent_id, $themeOris) && $theme->parent_id !=0){
                array_push($themeOris, $theme->parent_id);
            }
        }

        $themeOriIDs = Themes::whereIn('id',$themeOris)->get();
        // get all theme origin be long to this site
        $machineNames = [];
        foreach ($themeOriIDs as $themeOri) {
            if (!in_array($themeOri->machine_name, $machineNames)){
                array_push($machineNames, $themeOri->machine_name);
            }
        }
        // copy to temp folder
        foreach ($machineNames as $machineName){
            // copy resource
            if (!file_exists(public_path().'/generate/temp/resources/views/themes/'.$machineName)) {
                mkdir(public_path().'/generate/temp/resources/views/themes/'.$machineName, 0777, true);
            }
            $this->recurse_copy(resource_path().'/views/themes/'.$machineName,public_path().'/generate/temp/resources/views/themes/'.$machineName);

            // copy public
            if (!file_exists(public_path().'/generate/temp/public/themes/'.$machineName)) {
                mkdir(public_path().'/generate/temp/public/themes/'.$machineName, 0777, true);
            }
            $this->recurse_copy(public_path().'/themes/'.$machineName,public_path().'/generate/temp/public/themes/'.$machineName);
        }

    }

    /*
     * Copy all file from $src to $dst
     * */
    public function recurse_copy($src,$dst) {
        $dir = opendir($src);
        @mkdir($dst);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if ( is_dir($src . '/' . $file) ) {
                    $this->recurse_copy($src . '/' . $file,$dst . '/' . $file);
                }
                else {
                    copy($src . '/' . $file,$dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

    public function zipFolder($src,$dst, $name){
        // Get real path for our folder
//        $rootPath = realpath('folder-to-zip');
        $rootPath = realpath($src);

// Initialize archive object
        $zip = new ZipArchive();
        $zip->open($dst.'/'.$name.'.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

// Create recursive directory iterator
        /** @var SplFileInfo[] $files */
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($rootPath),
            RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file)
        {
            // Skip directories (they would be added automatically)
            if (!$file->isDir())
            {
                // Get real and relative path for current file
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($rootPath) + 1);

                // Add current file to archive
                $zip->addFile($filePath, $relativePath);
            }
        }

// Zip archive will be created only after closing object
        $zip->close();
    }

    public function removeFolder($src){
        $rootPath = realpath($src);
        $it = new RecursiveDirectoryIterator($rootPath, RecursiveDirectoryIterator::SKIP_DOTS);
        $files = new RecursiveIteratorIterator($it,
            RecursiveIteratorIterator::CHILD_FIRST);
        foreach($files as $file) {
            if ($file->isDir()){
                rmdir($file->getRealPath());
            } else {
                unlink($file->getRealPath());
            }
        }
        rmdir($rootPath);
    }

    /*
     * upload file to server
     * */
    public function uploadUseFTP($local_file,$ftp_path, $siteId){

        $clinicHosing = ClinicHosting::where('clinic_id', $siteId)->first();
        if($clinicHosing->host == null || $clinicHosing->username == null || $clinicHosing->password == null){
            $response = [
                'status' => 0,
                'message' => 'Thiếu thông tin hosting !'
            ];

            return $response;
        }

//        $host = '2ezcms.com';
//        $usr = 'sbd639-1@2ezcms.com';
//        $pwd = 'GMW)=bIK$WqC';
        $host = $clinicHosing->host;
        $usr = $clinicHosing->username;
        $pwd = $clinicHosing->password;

// connect to FTP server (port 21)
        $conn = @ftp_connect($host, 21);
        if(!$conn)
        {
            $response = [
                'status' => 0,
                'message' => 'Sai thông tin host, làm ơn check lại thông tin hosting và deploy lại'
            ];

            return $response;
        }

        $conn_id = ftp_connect($host) or die ("Cannot connect to host");


//        ftp_login($conn_id, $usr, $pwd) or die("Cannot login");

        // try to login
        if (!@ftp_login($conn_id, $usr, $pwd)) {
            $response = [
                'status' => 0,
                'message' => 'Sai thông tin login, làm ơn check lại thông tin hosting và deploy lại'
            ];

            return $response;
        }

// turn on passive mode transfers (some servers need this)
        ftp_pasv ($conn_id, true);

// perform file upload
        $upload = ftp_put($conn_id,$ftp_path,$local_file, FTP_BINARY);

        // check upload status:
        print (!$upload) ? 'Cannot upload' : 'Upload complete';
        print "\n";

        /*
         ** Chmod the file (just as example)
        */

        // If you are using PHP4 then you need to use this code:
        // (because the "ftp_chmod" command is just available in PHP5+)
        if (!function_exists('ftp_chmod')) {
            function ftp_chmod($ftp_stream, $mode, $filename){
                return ftp_site($ftp_stream, sprintf('CHMOD %o %s', $mode, $filename));
            }
        }

        // try to chmod the new file to 666 (writeable)
        if (ftp_chmod($conn_id, 0644, $ftp_path) == false) {
            $response = [
                'status' => 0,
                'message' => 'could not chmod '
            ];
            return $response;
        }

        // close the FTP stream
        ftp_close($conn_id);
    }

}