<?php require_once("initialize.php");
require_once('classes/DBInterface.class.php');
require_once('classes/Porson.class.php');
require_once('classes/Customer.class.php') ;
require_once('classes/Admin.class.php') ;

function format_birthdate($birthdate) {
    $date = new DateTime($birthdate .' 00:00:00.000');
    return $date->format('j\'S F Y');
}


function redirect_to($location) {
    header("Location: " . $location);
    exit;
}

function get_and_clear_session_error($errorType) {
    if(isset($_SESSION[$errorType]) && $_SESSION[$errorType] != '') {
        $error = $_SESSION[$errorType];
        unset($_SESSION[$errorType]);
        echo "<span class='error'>" . $error . "</span>";
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST["submit"] == "editStatus"){
    $val = $_POST["val"];
    $id = $_POST["id"];
    $customer = new Customer;
    $sql ="UPDATE customers SET " .
        "status='" . $val . "' " .
        " WHERE id='" . $id . "' ";
    "LIMIT 1";
}



?>