
<?php

require_once APPROOT. '/views/inc/header.php';

?>
<div class="jumbotron-fluid">

<?php  foreach($data['task'] as $task){

?>
<div class="card p-5" style="min-width: 18rem;">
  <img class="card-img-top" src="<?php echo URLROOT;?>/public/images/<?php echo $task->attachment;?>" alt="Card image cap" style="max-width:700px;">
  <div class="card-body">
    <h5 class="card-title">Title: <?php echo $task->title; ?></h5>
    <p class="card-text"><span style="font-weight:bold;">Task Description:</span>  <?php echo $task->descrip; ?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><strong>Task Priority:</strong> <?php echo $task->priority; ?></li>
    <li class="list-group-item"><strong>Created By:</strong> <?php echo $task->created_by; ?></li>
   
  </ul>
  <div class="card-body">
  <p><strong>Duration:</strong> <?php echo $task->duration; ?> </p>
  <p><strong>Created At:</strong> <?php echo $task->created_at; ?> </p>
 <a href="<?php echo URLROOT; ?>/tasks" class="btn btn-primary">Back</a>
    </div>
</div>

<?php
} ?>

</div>
<?php

require_once APPROOT. '/views/inc/footer.php';

?>