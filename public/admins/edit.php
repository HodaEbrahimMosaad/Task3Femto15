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
    redirect_to('login.php');
}
$id = $_GET['id'] ?? false;
if (!$id){
    redirect_to('home.php');
}

$admin = Admin::find_by_id($id);
if($admin == false) {
    redirect_to('home.php');
}


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $arg = $_POST['admin'];
    $admin->merge_attributes($arg);
    $result = $admin->update();

    if($result === true) {
        $_SESSION['message'] = 'Admin was updated successfully.';
        redirect_to('view.php?id=' . $id);
    } else {
        // show errors
    }
} else {


}

?>
<?php include(LAYOUT_PATH . "/admin-nav.php"); ?>
<?php echo display_errors($admin->errors)?>
<form method="post" action="edit.php?id=<?php echo htmlspecialchars(urldecode($admin->get_id()))?>">
    <div class="profile">
        <h4 class="text-center">Edit Admin</h4>
        <span class="daimond"></span>
        <?php include_once('form.php');?>
    </div>
</form>
<?php include(LAYOUT_PATH . "/footer.php"); ?>
