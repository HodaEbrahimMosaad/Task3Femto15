<?php require_once("../../private/initialize.php"); ?>
<?php include(LAYOUT_PATH . "/header.php"); ?>
<link rel="stylesheet" href="../css/add_user_style.css">
<link rel="stylesheet" href="../css/user_profile_style.css">

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
} else {
    $customer = Customer::find_by_id($id);
}

?>
<?php include(LAYOUT_PATH . "/admin-nav.php"); ?>
<?php echo display_session_message(); ?>
<div class="profile">
    <h4 class="text-center">Profile</h4>
    <span class="daimond"></span>
    <div class="row">
        <div class="col">
            Name:
        </div>
        <div class="col right">
            <?php echo htmlspecialchars(ucfirst($customer->get_username())); ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            Email:
        </div>
        <div class="col right">
            <?php echo htmlspecialchars($customer->email); ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            Phone number
        </div>
        <div class="col right">
            <?php echo htmlspecialchars($customer->phone_number); ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            Birth-date
        </div>
        <div class="col right">
            <?php echo htmlspecialchars(format_birthdate($customer->birthdate)); ?>
        </div>
    </div>
    <br>
</div>

<?php include(LAYOUT_PATH . "/footer.php"); ?>

