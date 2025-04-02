<?php
session_start();
$user_id = $_SESSION['userId'];
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $cpassword = $_POST["cpassword"];
    $npassword = $_POST["npassword"];
    $conpassword = $_POST['conpassword'];
          $current_pass = md5($cpassword); 
          $select_sql = "select password from `tbl_userregistration` where id='$user_id'";   
          $result = mysqli_query($conn, $select_sql); 
          $curr_pass = mysqli_fetch_assoc($result); 
          if($curr_pass['password']==$current_pass){
          if(($npassword == $conpassword)){
          $md5 = md5($npassword);
          $sql = "update `tbl_userregistration` set password='$md5' where id='$user_id'";   
          $result = mysqli_query($conn, $sql);
          if ($result){
              $showAlert = true;
              echo "<script>alert('Your Password updated successfully!');
                    window.history.back(1);
                    </script>";
          }
      }
      else{
          echo "<script>alert('New Password and Confirm Password do not match!');
                    window.history.back(1);
                    </script>";
      
    }
}
else
{
  echo "<script>alert('Current Password do not match!');
                    window.history.back(1);
                    </script>";
}
}
?>