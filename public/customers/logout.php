<?php


require_once('../../private/initialize.php');

$customer_session->logout();

redirect_to('login.php');

?>