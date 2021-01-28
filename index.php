<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "vendor/autoload.php";
use  BBCurl\Core\Request;

//    use BBDropbox\Core\Dropbox;
////
////    $d = (new Dropbox("https://api.dropboxapi.com/2/files/list_folder"))
////        ->listFolder("/digital/pdf/documentos_assinados/0-671");
//
//    $d = (new Dropbox("https://content.dropboxapi.com/2/files/download"))
//        ->download("id:X2mWIH6F-6AAAAAAACByEQ");
//
//    var_dump($d);


//$url = "https://api.dropboxapi.com/2/files/list_folder";
$url = "https://content.dropboxapi.com/2/files/download";

$dropHeader = [
    "Authorization: Bearer x3iy2r0NEsoAAAAAAAAAAa3ZTNXYwU_VwkIAc7yuGB9jeI9fNHEF06h-IhpJoSCw",
    "Dropbox-API-Select-User: dbmid:AAA9rjSU7Gg1W99Yvg7DUF43I0D9AkYv1vA",
];

(new Request($url))
    ->setHeader("Authorization", "Bearer x3iy2r0NEsoAAAAAAAAAAa3ZTNXYwU_VwkIAc7yuGB9jeI9fNHEF06h-IhpJoSCw")
    ->setHeader("Dropbox-API-Select-User", "dbmid:AAA9rjSU7Gg1W99Yvg7DUF43I0D9AkYv1vA")
    ->setJsonHeader('Dropbox-API-Arg', ['path' => 'id:X2mWIH6F-6AAAAAAACByEQ'])
    ->post()->download("/pdf/teste.pdf");
echo "ss";