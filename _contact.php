<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $name = $_POST["name"];
    $email = $_POST["emailid"];
    $phone = $_POST["phone"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    
    
          $sql = "INSERT INTO `tbl_userquery` ( `name`, `emailid`, `mobile`,  `subject`, `message`) VALUES ('$name', '$email', '$phone', '$subject', '$message')";   
          $result = mysqli_query($conn, $sql);
          if ($result){
              $showAlert = true;
              echo "<script>alert('Your Query successfully submitted.');
                    window.history.back(1);
                    </script>";
          }
      }
      
?>