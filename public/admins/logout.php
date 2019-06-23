<?php


require_once('../../private/initialize.php');

$admin_session->logout();

redirect_to('login.php');

?>