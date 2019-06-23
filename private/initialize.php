<?php


define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("LAYOUT_PATH", PRIVATE_PATH . "/layout");
define("PUBLIC_PATH", PROJECT_PATH . "/public");

require_once('database_funcs.php');
require_once('function.php');
require_once('validation_funcs.php');
require_once('status_error_functions.php');
//require_once('query_functions.php');
//require_once('validation_funcs.php');

require_once('../../private/classes/DBInterface.class.php');
require_once('../../private/classes/Porson.class.php');
require_once('../../private/classes/Customer.class.php') ;
require_once('../../private/classes/Admin.class.php') ;
require_once('../../private/classes/CustomerSession.class.php') ;
require_once('../../private/classes/AdminSession.class.php') ;

$db = db_connect();
$errors = [];
Customer::set_database($db);
session_start();
$customer_session = new CustomerSession;
$admin_session = new AdminSession;

?>