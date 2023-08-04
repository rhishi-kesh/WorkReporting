<?php 

  include "header.php";
  if($role != 0){
    header("location: ../404.php");
  }

?>
<div class="container mt-2">
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
  <form action="" method="POST">
    <div class="row m-2 p-3 register_form border border-secondary">
      <h5 class="text-center">Employee Registration Form</h5>
      <div class="col-md-5 m-auto">
        <div class="mb-2">
          <label>Fullname</label>
          <input type="text" name="user_name" placeholder="Fullname" class="form-control" required maxlength="30" minlength="3"> </div>
        <div class="mb-2">
          <label>Designation</label>
          <input type="text" name="user_des" placeholder="Designation" class="form-control" required maxlength="30" minlength="3"> </div>
        <div class="mb-2">
          <label>Responsibilities</label>
          <textarea class="form-control" rows="6" name="user_res" maxlength="300" minlength="10"></textarea>
        </div>
      </div>
      <div class="col-md-5 m-auto">
        <div class="mb-2">
          <label>Scale</label>
          <select class="form-control required" name="user_scale">
            <option value="">Select Scale</option>
            <option value="BPS-09">BPS-09</option>
            <option value="BPS-10">BPS-10</option>
            <option value="BPS-11">BPS-11</option>
            <option value="BPS-12">BPS-12</option>
            <option value="BPS-13">BPS-13</option>
            <option value="BPS-14">BPS-14</option>
            <option value="BPS-15">BPS-15</option>
            <option value="BPS-16">BPS-16</option>
            <option value="BPS-17">BPS-17</option>
            <option value="BPS-18">BPS-18</option>
            <option value="BPS-19">BPS-19</option>
            <option value="BPS-20">BPS-20</option>
          </select>
        </div>
        <div class="mb-2">
          <label>User ID</label>
          <input type="text" name="user_id" class="form-control" maxlength="30" minlength="4"> </div>
        <div class="mb-2">
          <label>Password</label>
          <input type="password" name="user_pass" class="form-control" maxlength="100" minlength="4"> </div>
        <div class="mb-2">
          <label>User Role</label>
          <select required name="user_role" class="form-control">
            <option value="">Select Role</option>
            <option value="1">Normal User</option>
            <option value="0">Admin</option>
          </select>
        </div>
        <div class="mb-2">
          <button class="btn btn-primary" name="add_emp">Register</button> 
          <a href="users_list.php" class="btn btn-secondary">Back</a> </div>
      </div>
    </div>
  </form>
</div>
<?php 

  include "footer.php";
  if(isset($_POST['add_emp'])){
    $fullName = mysqli_real_escape_string($con,$_POST['user_name']);
    $Designation = mysqli_real_escape_string($con,$_POST['user_des']);
    $Responsibilities = mysqli_real_escape_string($con,$_POST['user_res']);
    $Scale = mysqli_real_escape_string($con,$_POST['user_scale']);
    $user_id = mysqli_real_escape_string($con,$_POST['user_id']);
    $Password = mysqli_real_escape_string($con,sha1($_POST['user_pass']));
    $user_Role = mysqli_real_escape_string($con,$_POST['user_role']);
    if(strlen($Password) < 4){
      $_SESSION['error'] = "Password Must have minimum 4 character long";
      header("Location: add_emp.php");
    }
    else{
      $sql = "SELECT * FROM `user_table` WHERE user_id = '$user_id'";
      $query = mysqli_query($con, $sql);
      $rows = mysqli_num_rows($query);
      if($rows){
        $error = $_SESSION['error'] = "User already exist";
        header("Location: add_emp.php");
      }
      else{
        $sql2 = "INSERT INTO `user_table`(`fullname`, `user_des`, `user_scale`, `user_res`, `user_id`, `user_pass`, `user_role`) VALUES ('$fullName','$Designation','$Scale','$Responsibilities','$user_id','$Password','$user_Role')";
        $query2 = mysqli_query($con, $sql2);
        if($query2){
          header("Location: users_list.php");
        }
      }
    }
  }

?>