<?php /** @noinspection PhpExpressionResultUnusedInspection */

!defined('DS') ? define('DS', DIRECTORY_SEPARATOR) : null;
const SITEROOT = 'C:' . DS . 'xampp' . DS . 'htdocs' . DS . 'Gallery System - Starter';
!defined('INCLUDES_PATH') ? define('INCLUDES_PATH', SITEROOT . DS . 'admin' . DS . 'includes') : null;

//ini_set('display_errors', 1);
ob_start();
require_once("functions.php");
require_once("classes/Config.php");
require_once("classes/Alpha.php");
require_once("classes/Database.php");
require_once("classes/User.php");
require_once("classes/Session.php");
require_once("classes/Photos.php");