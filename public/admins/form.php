<div class="row">
    <div class="col">
        Name:
    </div>
    <div class="col right">

        <input name="admin[username]" class="form-control" type="text" required value="<?php echo htmlspecialchars($admin->get_username()) ?>">
    </div>
</div>
<br>
<div class="row">
    <div class="col">
        Email:
    </div>
    <div class="col right">
        <input name='admin[email]' required class="form-control" type="email" value="<?php echo htmlspecialchars($admin->email) ?>">
    </div>
</div>
<br class="passBr">
<div class="row password">
    <div class="col">
        Password:
    </div>
    <div class="col right">
        <input name='admin[password]' class="form-control" type="password">
    </div>
</div>
<br>
<button class="btn btn-dark submit" type="submit">
    Submit
</button>
<br>
