<?php

namespace App\Modules\SiteManager\Controllers;

use App\Facades\Theme;
use App\Http\Controllers\Controller;
use ZipArchive;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use App\Modules\SiteManager\Models\Clinic;
use App\Modules\SiteManager\Models\ClinicTheme;
use App\Modules\ContentManager\Models\Themes;

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

//        $this->zipFolder(public_path().'/generate/temp',public_path().'/generate/destination',$siteID);
        $files = glob(public_path().'/generate/temp');
        \Zipper::make(public_path().'/generate/destination/'.$siteID.'.zip')->add($files)->close();

        $this->removeFolder(public_path().'/generate/temp');

//        $this->uploadUseFTP(public_path().'/generate/destination/new-site.zip', '/new-site.zip');
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
    public function uploadUseFTP($local_file,$ftp_path){
        $host = '2ezcms.com';
        $usr = 'sbd639-1@2ezcms.com';
        $pwd = 'GMW)=bIK$WqC';

// file to move:
//        $local_file = 'C:\wamp\www\demo.zip';
//        $ftp_path = '/demo.zip';

// connect to FTP server (port 21)
        $conn_id = ftp_connect($host, 21) or die ("Cannot connect to host");

// send access parameters
        ftp_login($conn_id, $usr, $pwd) or die("Cannot login");

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
        if (ftp_chmod($conn_id, 0644, $ftp_path) !== false) {
            print $ftp_path . " chmoded successfully to 644\n";
        } else {
            print "could not chmod ";
        }

        // close the FTP stream
        ftp_close($conn_id);
    }
}