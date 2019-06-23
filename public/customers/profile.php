
<?php require_once("../../private/initialize.php"); ?>
<?php include(LAYOUT_PATH . "/header.php"); ?>
<link rel="stylesheet" href="../css/add_user_style.css">
<link rel="stylesheet" href="../css/user_profile_style.css">
<?php
if(!$customer_session->is_logged_in())
{
    redirect_to('login.php');
}
$customer = Customer::find_by_id($_SESSION['customer_id']);
?>
</head>
<body>

<?php include(LAYOUT_PATH . "/customer-nav.php"); ?>
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
            Plan:
        </div>
        <div class="col right">
            <?php echo htmlspecialchars(ucfirst($customer->plan)); ?>
        </div>
    </div>
</div>

<?php include(LAYOUT_PATH . "/footer.php"); ?>

