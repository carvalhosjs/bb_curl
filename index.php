<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "vendor/autoload.php";
use  BBCurl\Core\Request;



$url = "https://api.dropboxapi.com/2/files/list_folder";
//$url = "https://content.dropboxapi.com/2/files/download";


//$a = (new Request($url))
//    ->setHeader("Authorization", "Bearer x3iy2r0NEsoAAAAAAAAAAa3ZTNXYwU_VwkIAc7yuGB9jeI9fNHEF06h-IhpJoSCw")
//    ->setHeader("Dropbox-API-Select-User", "dbmid:AAA9rjSU7Gg1W99Yvg7DUF43I0D9AkYv1vA")
//    ->setJsonHeader('Dropbox-API-Arg', ['path' => 'id:X2mWIH6F-6AAAAAAACByEQ'])
//    ->post()->download("teste.pdf")->withErrors();

$a = (new Request($url))
    ->withJson()
    ->setHeader("Authorization", "Bearer x3iy2r0NEsoAAAAAAAAAAa3ZTNXYwU_VwkIAc7yuGB9jeI9fNHEF06h-IhpJoSCw")
    ->setHeader("Dropbox-API-Select-User", "dbmid:AAA9rjSU7Gg1W99Yvg7DUF43I0D9AkYv1vA")
    ->post(["path" => "/digital/pdf/documentos_assinados/0-671"])->run()->data();

var_dump($a);


