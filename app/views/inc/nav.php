
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4 mt-3" style="vertical-align: center;">
  <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo URLROOT; ?>/about">About Us</a>
      </li>
      <?php
      if(isset($_SESSION['user_id'])){
    ?>
      <li class="nav-item  active">
        <a class="nav-link" href="<?php echo URLROOT; ?>/tasks">Tasks</a>
      </li>
    <?php  
      }
      ?>
      <?php
      if(isset($_SESSION['user_id'])){
    ?>
      <li class="nav-item  active">
        <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
      </li>
    <?php  
      }else{
      
      ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
      </li>
     <?php  
      }
      ?>
  
    </ul>
    
  </div>
</nav>
