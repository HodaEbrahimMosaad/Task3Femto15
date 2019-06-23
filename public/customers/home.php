<?php require_once("../../private/initialize.php");?>
<?php include(LAYOUT_PATH . "/header.php"); ?>
<style>
    .row:nth-child(1),.row:nth-child(3),.row:nth-child(4){
        width: 100%;
    }
    .row:nth-child(1)
    {
        margin-top: 30px;
    }
    .row:nth-child(3)
    {
        margin: auto;
    }
    .appn
    {
        margin: 10px;
    }

    .pagination li
    {
        margin: 3px;
        background-color: white;
        letter-spacing: 2px;
        padding: 2px;
        border-radius: 2px;
    }
</style>
<?php
if(!$admin_session->is_logged_in())
{
    redirect_to('../admins/login.php');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'] ?? false;
    if (!$id){
        redirect_to('home.php');
    }
    $customer = Customer::find_by_id($id);
    if($customer == false) {
        redirect_to('home.php');
    }
    $result = $customer->delete();
    if($result === true) {
    $_SESSION['message'] = 'Customer was deleted successfully.';
    redirect_to('home.php');
    }
}
?>
<?php include(LAYOUT_PATH . "/admin-nav.php"); ?>
<?php echo display_session_message(); ?>
<div class="row appn">
    <a href="add.php" target="_blank" class="btn btn-info add class="col-sm-2"" >Add customer</a>
    <div class="col-sm-2">
        <select class="form-control status" >
            <option value="">
                All
            </option>
            <option value="ACCEPTED">
                ACCEPTED
            </option>
            <option value="BLOCKED">
                BLOCKED
            </option>
        </select>
    </div><div class="col-sm-2">
        <select class="form-control plan" >
            <option value="">
                All
            </option>
            <option value="Gold">
                Gold
            </option>
            <option value="Silver">
                Silver
            </option>
            <option value="Regular">
                Regular
            </option>
        </select>
    </div>
</div>
<br>

    <table id="myTable" class="table table-bordered table-hover">
        <thead class="thead-dark">
            <th>ID</th>
            <th>Name</th>
            <th>Birthdate</th>
            <th>Phone</th>
            <th>Status</th>
            <th>Plan</th>
            <th>Action</th>
        </thead>
        <tbody>
        <?php

        $customers = Customer::find_all("customers");
        foreach ($customers as $customer)
        {?>
            <tr>
                <td><?php echo $customer->get_id()?></td>
                <td><?php echo $customer->get_username() ?></td>
                <td><?php echo $customer->birthdate ?></td>
                <td><?php echo $customer->phone_number ?></td>
                <td><?php echo $customer->status ?></td>
                <td><?php echo $customer->plan ?></td>
                <td>
                    <a target="_blank" href='edit.php?id=<?php echo $customer->get_id()?>' class='btn btn-success btn-sm' >Edit</a>
                    <a target="_blank" href='delete.php?id=<?php echo $customer->get_id()?>' class='btn btn-danger btn-sm' data-toggle="modal" data-target="#deleteModal<?php echo $customer->get_id()?>"> Delete</a>
                    <a target="_blank" href='view.php?id=<?php echo $customer->get_id()?>' class='btn btn-info btn-sm' > View</a>
                </td>
            </tr>
            <div class="modal fade" id="deleteModal<?php echo $customer->get_id()?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete <?php echo $customer->get_username() ?>
                        </div>
                        <form method="post" action="home.php">
                            <input type="hidden" name="id" value="<?php echo $customer->get_id() ?>">
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

<?php include(LAYOUT_PATH . "/footer.php"); ?>
<script>
    $(document).ready(function(){

        var table = $('#myTable').DataTable({
            dom: 'lrtip'
        });
        $('.status, .plan').on('change', function(){
            var sr = $(".status").val() + " " + $(".plan").val();
            table.search(sr).draw();
        });
        //$("#myTable_length").prepend($('#appn'));
        // $(document).on("change", "#status",function () {
        //     var val = $(this).val();
        //     var id = $(this).data("id");
        //     console.log(id);
        //     $.ajax({
        //         type: "POST",
        //         method: "POST",
        //         url: "../../private/classes/Customer.class.php",
        //         data: {
        //             val: val,
        //             id: id,
        //             submit: "editStatus"
        //         },
        //         success: function (data) {
        //             $('#freshItems').load(window.location.href + " #freshItems");
        //             $("body").css('padding-right', '0px');
        //         }
        //     })
        // })
    });
</script>
