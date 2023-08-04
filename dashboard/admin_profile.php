<?php 

  include "header.php";
  if(isset($_SESSION['u_data'])){
    $user = $_SESSION['u_data'];
  }
  if($role != 0){
    header("location: ../404.php");
  }
  
?>
<?php
    if(isset($_SESSION['error'])){
      $error = $_SESSION['error'];
  ?>
  <div class="alert alert-dismissible alert-danger">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <?php 
      echo $error;
      unset($_SESSION['error']); 
    ?>
  </div>
  <?php
    }else{
      echo "";
    }
  ?>
<div class="container mt-5 mb-2">
  <div class="row m-2">
    <div class="col-md-7 m-auto emp_profile p-4 border border-secondary">
      <p class="text-center bg-white p-3"> <span class="emp_name"><?= ucwords($user['0']) ?></span>
        <br> <span>(<?= ucwords($user['1']) ?></span> <span><?= ucwords($user['2']) ?>)</span> </p>
      <div class="bg-white p-3">
        <form action="report.php" method="POST">
          <label><strong>Daily Work</strong></label>
          <input type="date" name="work_date" class="form-control" required>
          <button name="report_btn" class="btn btn-primary mt-2">Report Generate</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php 

  include "footer.php" 

?>