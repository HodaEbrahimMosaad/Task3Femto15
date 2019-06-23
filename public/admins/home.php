<?php require_once("../../private/initialize.php");?>
<?php include(LAYOUT_PATH . "/header.php"); ?>
<style>
    .row:nth-child(1),.row:nth-child(2),.row:nth-child(3){
        width: 100%;
    }
    .row:nth-child(1)
    {
        margin-top: 30px;
    }
    .row:nth-child(2)
    {
        margin: auto;
    }
    .add
    {
        margin: 13px 15px -50px;
    }
    .addDiv
    {
        height: 90px;
    }

</style>
<?php
if(!$admin_session->is_logged_in())
{
    redirect_to('login.php');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'] ?? false;
    if (!$id){
        redirect_to('home.php');
    }

    $admin = Admin::find_by_id($id);
    if($admin == false) {
        redirect_to('home.php');
    }
    $result = $admin->delete();
    if($result === true) {
    $_SESSION['message'] = 'Admin was deleted successfully.';
    redirect_to('home.php');
}

}
?>
<?php include(LAYOUT_PATH . "/admin-nav.php"); ?>
<?php echo display_session_message(); ?>
<div class="row addDiv">
    <div class="col-sm-3">
        <a href="add.php" target="_blank" class="btn btn-info add" >Add Admin</a>
    </div>
</div>

    <table id="myTable" class="table table-bordered table-hover">
        <thead class="thead-dark">
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </thead>
        <tbody>
        <?php

        $admins = Admin::find_all();
        foreach ($admins as $admin)
        {?>
            <tr>
                <td><?php echo $admin->get_id()?></td>
                <td><?php echo $admin->get_username() ?></td>
                <td><?php echo $admin->email ?></td>

                <td>
                    <a target="_blank" href='edit.php?id=<?php echo $admin->get_id()?>' class='btn btn-success btn-sm' >Edit</a>
                    <a target="_blank" href='delete.php?id=<?php echo $admin->get_id()?>' class='btn btn-danger btn-sm' data-toggle="modal" data-target="#deleteModal<?php echo $admin->get_id()?>"> Delete</a>
                    <a target="_blank" href='view.php?id=<?php echo $admin->get_id()?>' class='btn btn-info btn-sm' > View</a>
                </td>
            </tr>
            <div class="modal fade" id="deleteModal<?php echo $admin->get_id()?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete <?php echo $admin->get_username() ?>
                        </div>
                        <form method="post" action="home.php">
                            <input type="hidden" name="id" value="<?php echo $admin->get_id() ?>">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button  class="btn btn-danger" type="submit">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--include('edit_delete_modal.php');-->
        <?php } ?>
        </tbody>
    </table>

<?php

//$cust = new Customer();



?>



<?php include(LAYOUT_PATH . "/footer.php"); ?>