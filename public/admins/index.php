
<?php require_once("../../private/initialize.php"); ?>

<?php include(LAYOUT_PATH . "/header.php"); ?>
<link rel="stylesheet" href="../../public/css/add_user_style.css">
<link rel="stylesheet" href="../../public/css/login_style.css">

</head>
<body>

<?php
if(!$admin_session->is_logged_in())
{
    redirect_to('login.php');
}
$errors = [];
$username = '';
$password = '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if(is_blank($username)) {
        $errors[] = "Username cannot be blank.";
    }
    if(is_blank($password)) {
        $errors[] = "Password cannot be blank.";
    }

    if(empty($errors)) {
        $admin = Admin::find_by_username($username);
        if($admin != false && $admin->verify_password($password)) {
            //$session->login($admin);
            redirect_to('home.php');
        } else {
            $errors[] = "Log in was unsuccessful.";
        }

    }

}

?>
<?php echo display_errors($errors)?>
<?php include(LAYOUT_PATH . "/admin-nav.php"); ?>
<div class="profile">
    <h4 class="text-center">Profile</h4>
    <span class="daimond"></span>
    <div class="row">
        <div class="col">
            <a href="../customers/home.php">Customers</a>
        </div>
        <div class="col right">
            <a href="home.php">Admins</a>
        </div>
    </div>
</div>


<?php include(LAYOUT_PATH . "/footer.php"); ?>

