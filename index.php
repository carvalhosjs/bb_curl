<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "vendor/autoload.php";
use  BBCurl\Core\Request;



$url = "https://api.dropboxapi.com/2/files/list_folder";
//$url = "https://content.dropboxapi.com/2/files/download";


$a = (new Request($url))
    ->withJson()
    ->setHeader("Authorization", "")
    ->setHeader("Dropbox-API-Select-User", "")
    ->post(["path" => "/digital/pdf/documentos_assinados/0-671"])->run()->data();

var_dump($a);


