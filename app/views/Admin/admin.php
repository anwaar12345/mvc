<?php

require_once APPROOT. '/views/inc/header.php';

?>

<div class="container-fluid">
<div class="row">
    <div class="col-md-2">
    <ul class="list-group">
    <li class="list-group-item"><a href="<?php echo URLROOT; ?>/admin/status" style="text-decoration:none; color:black;">Status Management</a></li>
    <li class="list-group-item"> <a href="<?php echo URLROOT; ?>/tasks" style="text-decoration:none; color:black;">All Tasks</a></li>
</ul>
    </div>
    <div class="col-md-10">
    <p><?php echo $_SESSION['name']."<br>".$_SESSION['role']; ?></p>
    </div>
</div>


</div>


<?php

require_once APPROOT. '/views/inc/footer.php';

?>
