<?php
session_start();
$user_id = $_SESSION['userId'];
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST['phone'];
            
          $sql = "update `tbl_userregistration` set name='$name', emailid='$email', mobile='$phone' where id='$user_id'";   
          $result = mysqli_query($conn, $sql);
          if ($result){
              $showAlert = true;
              echo "<script>alert('Your Profile updated successfully.');
                    window.history.back(1);
                    </script>";
          }
      }
      
?>