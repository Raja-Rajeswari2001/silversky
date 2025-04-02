<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $emailid = $_POST["emailid"];
    $password = md5($_POST["loginpassword"]); 
    
    $sql = "Select * from tbl_userregistration where emailid='$emailid' and password='$password'"; 
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $row=mysqli_fetch_assoc($result);
        $userId = $row['id'];
        $username = $row['name'];
        
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['userId'] = $userId;
            //header("location: /opd/index.php");
            echo "<script>alert('You are logged in now!');
                    window.history.back(1);
                    </script>";
            exit();
        } 
        else{
            echo "<script>alert('You have entered wrong password!');
                    window.history.back(1);
                    </script>";
        }
    } 
?>