<?php
/**
 * Created by PhpStorm.
 * User: matej
 * Date: 08/06/16
 * Time: 07:13
 */
session_start();

mb_internal_encoding("UTF-8");
require_once('../Utilities/dateConversion/DateUtils.php');
require_once('../Utilities/StringUtils/StringUtils.php');
//require_once('../public/css/login.css');

function autoloadFunction($class)
{
    if (preg_match('/Controller$/', $class))
        require("controllers/" . $class . ".php");
    else
        require("models/" . $class . ".php");
}
spl_autoload_register("autoloadFunction");

Db::connect("192.168.1.116", "root", "", "mvc_db2");
/*
$login = new LoginController();
$login->compile($_POST['name'], $_POST['password']);
*/
$router = new RouterController();
$router->compile(array($_SERVER['REQUEST_URI']));

$router->extractView();
