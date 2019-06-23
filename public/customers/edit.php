<?php require_once("../../private/initialize.php"); ?>
<?php include(LAYOUT_PATH . "/header.php"); ?>
<link rel="stylesheet" href="../css/add_user_style.css">
<link rel="stylesheet" href="../css/user_profile_style.css">
<style>
    form {
        width: inherit;
        margin: 0px;
        background-color: rgba(0, 0, 0, 0);
        padding: 0px;
        border-radius: 15px;
    }

</style>
</head>
<body>

<?php
if(!$admin_session->is_logged_in())
{
    redirect_to('../admins/login.php');
}
$id = $_GET['id'] ?? false;
if (!$id){
    redirect_to('home.php');
}

$customer = Customer::find_by_id($id);
if($customer == false) {
    redirect_to('home.php');
}


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $arg = $_POST['customer'];
    $customer->merge_attributes($arg);
    $result = $customer->update();

    if($result === true) {
        $_SESSION['message'] = 'Customer was updated successfully.';
        redirect_to('view.php?id=' . $id);
    } else {
        // show errors
    }
} else {


}

?>
<?php include(LAYOUT_PATH . "/admin-nav.php"); ?>
<?php echo display_errors($customer->errors)?>
<form method="post" action="edit.php?id=<?php echo htmlspecialchars(urldecode($customer->get_id()))?>">
    <div class="profile">
        <h4 class="text-center">Edit Customer</h4>
        <span class="daimond"></span>
        <?php include_once('form.php');?>
    </div>
</form>
<?php include(LAYOUT_PATH . "/footer.php"); ?>
