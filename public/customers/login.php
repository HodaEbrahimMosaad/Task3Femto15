
<?php require_once("../../private/initialize.php"); ?>

<?php include(LAYOUT_PATH . "/header.php"); ?>
<link rel="stylesheet" href="../../public/css/add_user_style.css">
<link rel="stylesheet" href="../../public/css/login_style.css">

</head>
<body>

<?php
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
        $customer = Customer::find_by_username($username);
        if($customer != false && $customer->verify_password($password) && $customer->status === "ACCEPTED") {
            $customer_session->login($customer);
            redirect_to('profile.php');
        } else {
            $errors[] = "Log in was unsuccessful.";
        }

    }

}

?>
<?php include(LAYOUT_PATH . "/customer-nav.php"); ?>
<?php echo display_errors($errors)?>
<form method="post">
    <h4 class="e1 text-center">Log in</h4>
    <span class="daimond"></span>

    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">
            <i class="fa fa-user-circle">

            </i>
        </label>
        <div class="col-sm-10">
            <input type="text" name="username" class="form-control" id="staticEmail" placeholder="user name">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">
            <i class="fa fa-unlock-alt">

            </i>
        </label>
        <div class="col-sm-10">
            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
        </div>
    </div>
    <br>
    <input type="hidden" name="submit" value="loginAdmin">
    <button class="btn btn-dark submit" type="submit">
        <i class="fa fa-submit">
            Submit
        </i>
    </button>
</form>

<?php include(LAYOUT_PATH . "/footer.php"); ?>

