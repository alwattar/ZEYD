<?php
// error_reporting(0);
// config files
require_once("./config/cons.php");
require_once("./config/db.php");

// libs
require_once("./libs/Controller.php");
require_once("./libs/DB.php");
require_once("./libs/Model.php");
require_once("./libs/Session.php");
require_once("./libs/simple_html_dom.php");
require_once("./libs/View.php");
require_once("./libs/Route.php");


/* 
   set GET to pass parameters to method getUser
   we must go to http://url.com/index/users/2
   we get user id 2
   for more than one parameter we should type
   http://url.com/index/users/2|3|4|5
   then we will explode it in getUser by this :
   explode('|',$parameter);
   ------------------------------
   $r->addRoute("/index/users/GET","index@getUser");
*/

// Routes 
/*
 * Example :
 * $r->addRoute('/path','controllerName@methodIntoIt');
*/

// index controller
$r->addRoute("/index","index@index");
// admin controller
$r->addRoute("/admin","admin@index");
$r->addRoute("/admin/index","admin@index");
$r->addRoute("/admin/login","admin@adminLogin");
$r->addRoute("/admin/new-article","admin@newArticle");
$r->addRoute("/admin/new-section","admin@newSection");


if(isset($_GET['route'])){
    $route = "/" . rtrim($_GET['route'],"/");
    $r->getRoute($route);
}else{
    Controller::redirect(URL . "/index");
}

?>
