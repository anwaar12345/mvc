
    <?php

    require_once APPROOT. '/views/inc/header.php';
    
    ?>



<div class="mb-3 bg-dark">

<div style="padding:10px;">
<a href="<?php echo URLROOT;?>/tasks/add" class="btn btn-success">Add Tasks</a>
</div>
<table class="table table-dark">
  <thead>
    <tr>
      <th>Title</th>
      <th>Status</th>
      <th>Description</th>
      <th>Duration</th>
      <th>Created By</th>
      <th>Priority</th>
      <th>Attachment</th>
      <th>Created At</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($data['tasks'] as $task){

?>
    <tr>
      <th><?php echo $task->title; ?></th>
      <td><?php echo $task->status; ?></td>
      <td><?php echo $task->descrip; ?></td>
      <td><?php echo $task->duration; ?></td>
      <td><?php echo $task->created_by; ?></td> 
      <td><?php echo $task->priority; ?></td>
      <td><img src="public/images/<?php echo $task->attachment;?>" style="width:100px;"></td>
      <td><?php echo $task->created_at; ?> </td>
       <td> <a href="<?php echo URLROOT; ?>/tasks/edit/<?php echo $task->id; ?>"> <i class="fa fa-edit"></i></a><a href="<?php echo URLROOT; ?>/tasks/delete/<?php echo $task->id; ?>"> <i class="fa fa-trash"></i></a> </td> 
    </tr>
 

<?php
}
?>
 </tbody>
</table>

</div>




<?php

require_once APPROOT. '/views/inc/footer.php';

?>
