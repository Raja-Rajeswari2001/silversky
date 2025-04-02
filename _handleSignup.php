<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    
    
      if(($password == $cpassword)){
          $md5 = md5($password);
          $sql = "INSERT INTO `tbl_userregistration` ( `name`, `emailid`, `mobile`,  `password`, `registration_date`) VALUES ('$name', '$email', '$phone', '$md5', current_timestamp())";   
          $result = mysqli_query($conn, $sql);
          if ($result){
              $showAlert = true;
              echo "<script>alert('Your account successfully created. Now you can login to your account!');
                    window.history.back(1);
                    </script>";
          }
      }
      else{
          echo "<script>alert('Passwords do not match!');
                    window.history.back(1);
                    </script>";
      
    }
}
?>