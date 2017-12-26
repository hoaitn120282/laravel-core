<?php

$file = 'new-site.zip';
$path = pathinfo(realpath($file), PATHINFO_DIRNAME);

$zip = new ZipArchive;

if ($zip->open($file) === TRUE) {
    $zip->extractTo($path);
    $zip->close();
    echo 'ok';
} else {
    echo 'failed';
}


$dbhost = 'localhost';
$dbuser = '';
$dbpass = '';
$dbname = '';

$ds = DIRECTORY_SEPARATOR;

$path_data = $path. $ds .'database'.$ds ;
$file = 'site-site.sql';
$filename = $path_data.$file;

//        $command = sprintf('mysqldump -h %s -u %s -p\'%s\' %s > %s', $host, $username, $password, $database, $path . $file);
$command = sprintf("mysql -h $dbhost -u $dbuser --password='$dbpass' $dbname < $filename");


if (!is_dir($path)) {
    mkdir($path, 0755, true);
}
exec($command);

?>