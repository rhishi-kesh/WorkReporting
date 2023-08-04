<?php 

  include "header.php";
  if(isset($_SESSION['u_data'])){
    $user = $_SESSION['u_data'];
  }
  if($role != 1){
    header("location: ../404.php");
  }

  if(isset($_SESSION['error'])){
      $error = $_SESSION['error'];
  ?>
  <div class="alert alert-dismissible alert-info">
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
<div class="container mt-2 mb-2">
  <div class="row">
    <div class="col-md-6 m-auto emp_profile p-4 border border-secondary">
      <p class="text-center bg-white p-3"> <span class="emp_name"><?= ucwords($user['0']) ?></span>
        <br> <span>(<?= ucwords($user['1']) ?></span> <span><?= ucwords($user['2']) ?>)</span> </p>
      <div class="bg-white p-3"> <strong>Job Responsibilities</strong>
        <ul>
          <li><?= $user['3'] ?></li>
        </ul>
      </div>
      <br>
      <div class="bg-white p-3">
        <form method="POST">
          <label><strong>Daily Work</strong></label>
          <textarea required="required" class="form-control" rows="5" name="work_desc" maxlength="200" minlength="10"></textarea>
          <button name="work_btn" class="btn btn-primary mt-2">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php 

  include "footer.php";
  if(isset($_POST['work_btn'])){
    $id = $user['5'];
    $work_desc = mysqli_real_escape_string($con, $_POST['work_desc']);
    $date = date('Y-m-d', time());
    $check = "SELECT * FROM `work_tbl` WHERE emp_id = '$id' AND work_date = '$date'";
    $query = mysqli_query($con, $check);
    $rows = mysqli_num_rows($query);
    if($rows){
      $_SESSION['error'] = "You can't submit work again in same date";
      header('location: emp_profile.php');
    }else{
      $insert = "INSERT INTO `work_tbl`(`emp_id`, `work_desc`, `work_date`) VALUES ('$id','$work_desc','$date')";
      $insquery = mysqli_query($con, $insert);
      if($insquery){
        $_SESSION['error'] = "Data insert successfull";
        header('location: emp_profile.php');
      }else{
        $_SESSION['error'] = "Please try again";
        header('location: emp_profile.php');
      }
    }
  }
 
?>