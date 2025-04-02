<?php
session_start();
$user_id = $_SESSION['userId'];
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $book_id = $_POST["book_id"];
            
          $sql = "update `tbl_booking` set status=2, cancelled_by=1 where user_id='$user_id' and id='$book_id'";   
          $result = mysqli_query($conn, $sql);
          if ($result){
              $showAlert = true;
              echo "<script>alert('Your Booking Cancelled.');
                    window.history.back(1);
                    </script>";
          }
      }
      
?>