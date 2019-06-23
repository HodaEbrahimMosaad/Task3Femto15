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
    .status
    {
        display: none;
    }
</style>
</head>
<body>
<?php
if(!$admin_session->is_logged_in())
{
    redirect_to('../admins/login.php');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $arg = $_POST['customer'];
    $arg['status'] = "ACCEPTED";
    $customer = new Customer($arg);
    $result = $customer->create();

    if($result == true) {
        $new_id = $customer->get_id();
        $_SESSION['message'] = 'The customer was added successfully.';
        redirect_to('view.php?id=' . $new_id);
    }
} else {
    $customer = new Customer;
}


?>
<?php include(LAYOUT_PATH . "/customer-nav.php"); ?>
<?php echo display_errors($customer->errors)?>
<form method="post">
    <div class="profile">
        <h4 class="text-center">Add Customer</h4>
        <span class="daimond"></span>
        <?php include_once('form.php');?>
    </div>
</form>
<?php include(LAYOUT_PATH . "/footer.php"); ?>

