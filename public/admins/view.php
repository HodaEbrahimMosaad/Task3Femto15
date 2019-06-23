<?php require_once("../../private/initialize.php"); ?>
<?php include(LAYOUT_PATH . "/header.php"); ?>
<link rel="stylesheet" href="../css/add_user_style.css">
<link rel="stylesheet" href="../css/user_profile_style.css">
<style>
    .message
    {
        width: fit-content;
        margin: 10px auto 0px;
        background-color: rgba(53 ,182,6,.5);
        padding: 3px 50px;
        border-radius: 8px;
        color: white;
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
} else {
    $admin = Admin::find_by_id($id);
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
            <?php echo htmlspecialchars(ucfirst($admin->get_username())); ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            Email:
        </div>
        <div class="col right">
            <?php echo htmlspecialchars($admin->email); ?>
        </div>
    </div>
</div>

<?php include(LAYOUT_PATH . "/footer.php"); ?>

