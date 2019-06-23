<div class="row">
    <div class="col">
        Name:
    </div>
    <div class="col right">

        <input name="customer[username]" class="form-control" type="text" required value="<?php echo htmlspecialchars($customer->get_username()) ?>">
    </div>
</div>
<br class="passBr">
<div class="row password">
    <div class="col">
        Password
    </div>
    <div class="col right">
        <input name='customer[password]' class="form-control" type="password">
    </div>
</div>
<br>
<div class="row">
    <div class="col">
        Email:
    </div>
    <div class="col right">
        <input name="customer[email]" class="form-control" type="text" required value="<?php echo htmlspecialchars($customer->email) ?>">
    </div>
</div>
<br>
<div class="row">
    <div class="col">
        Phone number
    </div>
    <div class="col right">
        <input name="customer[phone_number]" class="form-control" type="text" required value="<?php echo htmlspecialchars($customer->phone_number) ?>">
    </div>
</div>
<br>
<div class="row">
    <div class="col">
        Birth-date
    </div>
    <div class="col right">
        <input name="customer[birthdate]" class="form-control" type="date" required value="<?php echo htmlspecialchars($customer->birthdate) ?>">
    </div>
</div>
<br>
<div class="row">
    <div class="col">
        Birth-date
    </div>
    <div class="col right">
        <select name="customer[plan]" class="form-control">
            <?php foreach(Customer::PLANS as $plan) { ?>
                <option value="<?php echo $plan; ?>" <?php if($customer->plan == $plan) { echo 'selected'; } ?>><?php echo $plan; ?></option>
            <?php } ?>
        </select>
    </div>
</div>
<br>
<div class="row status">
    <div class="col">
        Status
    </div>
    <div class="col right">
        <select name="customer[status]" class="form-control">
            <option <?php
            if($customer->status == "ACCEPTED"){echo "selected";}
            ?>>
                ACCEPTED
            </option>
            <option <?php
            if($customer->status == "BLOCKED"){echo "selected";}
            ?>>
                BLOCKED
            </option>
        </select>
    </div>
</div>
<br>
<button class="btn btn-dark submit" type="submit">
    Submit
</button>
<br>
