<?php
//api.php
const APP_DIRECTORY="";

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require 'vendor/autoload.php';

$app = new Application();
$app['debug'] = true;
//pripojeni servisy
$app['myService'] = function() {
  require "services/myService.php";
  return new MyService();
};
//test api
$app->get(APP_DIRECTORY.'/api/test',function(){
   //some logic with api failing (db connect,etc.)
   return new Response("",200); //otherwise we return 200
});
//some request
$app->get(APP_DIRECTORY.'/api/books', function(Request $req) use ($app) {
    $result = $app['myService']->findAll($req->query->all());
  return new Response(json_encode($result),200,array("Content-Type" => "application/json; charset=UTF-8"));
});
//run the app to handle the incoming request
//404, 405 responses are handled automatically
$app->run();