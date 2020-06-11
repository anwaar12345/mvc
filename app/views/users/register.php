<?php

require_once APPROOT. '/views/inc/header.php';

?>

<div class="row">
<div class="col-md-6 mx-auto">
<div class="card card-body bg-light mt-5">
<h2  style="text-align:center"> Create An Account </h2>
<p  style="text-align:center">Please Enter Required Information To Register as a User</p>
<form action="<?php echo URLROOT; ?>/users/register" method="post">
<div class="form-group">

<label for="name">Name: <sup>*</sup></label>
<input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" placeholder="Enter Your Name ..." value="<?php echo $data['name']; ?>" Required>
<span class="text-danger"><?php echo $data['name_err']; ?></span>
</div>
<div class="form-group">
<label for="email">Email: <sup>*</sup></label>
<input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"  placeholder="Enter Your Email ..."  value="<?php echo $data['email']; ?>" Required>
<span class="text-danger"><?php echo $data['email_err']; ?></span>
</div>
<div class="form-group">
<label for="password">Password: <sup>*</sup></label>
<input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" placeholder="Enter Your Password ..."  value="<?php echo $data['password']; ?>" Required>
<span class="text-danger"><?php echo $data['password_err']; ?></span>
</div>
<label for="cpassword">Confirm Password: <sup>*</sup></label>
<input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirmpass_err'])) ? 'is-invalid' : ''; ?>" placeholder="Please Confirm Your Password ..."  value="<?php echo $data['confirm_password']; ?>" Required>
<span class="text-danger"><?php echo $data['confirmpass_err']; ?></span>

<div class="row mt-3">
<div class="col">
<input type="submit" value="Register" class="btn btn-success btn-block">
</div>
<div class="col">
    <a href="<?php echo URLROOT; ?>/users/login" >Already Have Account ?</a>
</div>
</div>

</div>


</form>

</div>
</div>
</div>

<?php

require_once APPROOT. '/views/inc/footer.php';

?>