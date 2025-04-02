<?php
session_start();
$user_id = $_SESSION['userId'];
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $start = $_POST["start"];
    $end = $_POST["end"];
    $comment = $_POST['comment'];
    $package_id = $_POST['package_id'];
        
          $sql = "INSERT INTO `tbl_booking` ( `user_id`, `package_id`, `from_date`,  `to_date`,`comment`,`registration_date`) VALUES ('$user_id', '$package_id', '$start', '$end', '$comment', current_time())";   
          $result = mysqli_query($conn, $sql);
          if ($result){
              $showAlert = true;
              echo "<script>alert('Your Booking details submitted.');
                    window.history.back(1);
                    </script>";
          }
      }
      
?>