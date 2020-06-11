<?php

require_once APPROOT. '/views/inc/header.php';

?>

<div class="row">
<div class="col-md-6 mx-auto">
<div class="card card-body bg-light mt-5">
<h2  style="text-align:center"> Login Here </h2>

<form action="<?php echo URLROOT; ?>/users/login" method="post">

<div class="form-group">
<label for="email">Email: <sup>*</sup></label>
<input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"  placeholder="Enter Your Email ..."  value="<?php echo $data['email']; ?>" Required>
<span class="text-danger"><?php echo $data['email_err']; ?></span>
</div>
<div class="form-group">
<label for="password">Password: <sup>*</sup></label>
<input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"  placeholder="Enter Your Password ..."  value="<?php echo $data['password']; ?>" Required>
<span class="text-danger"><?php echo $data['password_err']; ?></span>
</div>

<div class="row mt-3">
<div class="col">
<input type="submit" value="Register" class="btn btn-success btn-block">
</div>
<div class="col">
    <a href="<?php echo URLROOT; ?>/users/register" >Need An Account ?</a>
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