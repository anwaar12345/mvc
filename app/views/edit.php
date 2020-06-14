<?php

require_once APPROOT. '/views/inc/header.php';

?>

<div class="row">
<div class="col-md-6 mx-auto">
<div class="card card-body bg-light mt-3">
<h2  style="text-align:center"> Edit Tasks </h2>
<p  style="text-align:center">Kindly Enter Task Details </p>
<form action="<?php echo URLROOT.'/tasks/edit/'.$data['id']; ?>" method="post" enctype="multipart/form-data">
<div class="form-group">

<label for="title">Task Title: <sup>*</sup></label>
<input type="hidden" name='id' value="<?php echo $data['id']; ?>" name="id">

<input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" placeholder="Enter Task Title ..." value="<?php echo $data['title']; ?>" Required>
<span class="text-danger"><?php echo $data['title_err']; ?></span>
</div>
<div class="form-group">
<label for="status">Status: <sup>*</sup></label>
<select name="status" class="form-control" Required>
<option>d</option>
<option value="dummy" <?php if($data['status']===$data['status']) echo "selected";  ?> Required>Dummy</option>

</select>
<span class="text-danger"><?php echo $data['status_err']; ?></span>
</div>
<div class="form-group">
<label for="desc">Description: <sup>*</sup></label>
<textarea name="descrip" Required cols="30" rows="5" class="form-control form-control-lg <?php echo (!empty($data['descrip_err'])) ? 'is-invalid' : ''; ?>" placeholder="Enter Task Description ..."  style="resize:none;"><?php echo $data['descrip']; ?></textarea>

<span class="text-danger"><?php echo $data['descrip_err']; ?></span>
<br>
</div>
<div class="form-group">
<label for="workhr">Work Hour ( Duration To Complete ): <sup>*</sup></label>
<input type="text" name="workhr" Required class="form-control form-control-lg <?php echo (!empty($data['workhr_err'])) ? 'is-invalid' : ''; ?>" placeholder="Please Provide Duration of Task ..."  value="<?php echo $data['workhr']; ?>" >
<span class="text-danger"><?php echo $data['workhr_err']; ?></span>
</div>
<br>
<div class="form-group">
<label for="created_by" class="mt-3">created By: <sup>*</sup></label>
<input type="text" name="crby" Required class="form-control form-control-lg <?php echo (!empty($data['crby_err'])) ? 'is-invalid' : ''; ?>"   value="<?php echo $data['crby']; ?>"  placeholder="Please Enter Author Name ...">
<span class="text-danger"><?php echo $data['crby_err']; ?></span>
</div>
<br>
<div class="form-group">
<label for="created_by" class="mt-3">Priority: <sup>*</sup></label>
<input type="text" name="priority" Required class="form-control form-control-lg <?php echo (!empty($data['priority_err'])) ? 'is-invalid' : ''; ?>"   value="<?php echo $data['priority']; ?>"  placeholder="Please Enter Task Priority ...">
<span class="text-danger"><?php echo $data['priority_err']; ?></span>
</div>
<br>
<div class="form-group">
<label for="created_by" class="mt-3">Attachment: <sup>*</sup></label>
<input type="file" name="attachment"   Required class="form-control-file form-control-lg <?php echo (!empty($data['attachment_err'])) ? 'is-invalid' : ''; ?>" > <?php if(isset($data['attachment'])) { echo  $data['attachment']; } ?>
<img src="<?php echo URLROOT; ?>/public/images/<?php echo $data['attachment'];?>" style="width:100px;">
<span class="text-danger"><?php echo $data['attachment_err']; ?></span>
</div>
<br>
<div class="row mt-3">
<div class="col">
<input type="submit" value="Submit Task" class="btn btn-success btn-block">
</div>
<div class="col" style="">
    <a href="<?php echo URLROOT; ?>/tasks/add" class="btn btn-primary btn-block">Clear Form</a>
</div>
<div class="col">
    <a href="<?php echo URLROOT; ?>/tasks" class="btn btn-danger btn-block">Cancel</a>
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