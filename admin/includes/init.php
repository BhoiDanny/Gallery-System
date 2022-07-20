<?php /** @noinspection PhpExpressionResultUnusedInspection */
date_default_timezone_set("Africa/Accra");

!defined('DS') ? define('DS', DIRECTORY_SEPARATOR) : null;
const SITEROOT = 'C:' . DS . 'xampp' . DS . 'htdocs' . DS . 'Gallery System - Starter';
!defined('INCLUDES_PATH') ? define('INCLUDES_PATH', SITEROOT . DS . 'admin' . DS . 'includes') : null;

//ini_set('display_errors', 1);
ob_start();
require_once(INCLUDES_PATH.DS."functions.php");
require_once(INCLUDES_PATH.DS."classes/Config.php");
require_once(INCLUDES_PATH.DS."classes/Alpha.php");
require_once(INCLUDES_PATH.DS."classes/Database.php");
require_once(INCLUDES_PATH.DS."classes/User.php");
require_once(INCLUDES_PATH.DS."classes/Photos.php");
require_once(INCLUDES_PATH.DS."classes/Comments.php");
require_once(INCLUDES_PATH.DS."classes/Session.php");
require_once(INCLUDES_PATH.DS."classes/Paginate.php");
