<?php
require_once $_SERVER["DOCUMENT_ROOT"] ."/project/app/vendor/autoload.php";
use app\core\Application;
$app= new Application();
$app->router->get("home","home");
$app->router->get("contact","contact");
$app->router->get("site/home","site/home");
$app->router->get("login","login");
$app->router->get("user/register","user/register");
$app->router->get("about","about");
$app->router->get("profile","profile");
$app->router->get("user/profile","user/profile");
$app->router->get("project","project");
$app->router->post("user/register","user/register");
$app->router->get("user/logout","user/logout");
  ///testing
$app->router->get("user/log","user/log");
// testing
$app->router->post("user/login","user/login");
$app->router->get("user/login","user/login");
$app->router->post("user/ajax","user/ajax");
$app->run();


?>