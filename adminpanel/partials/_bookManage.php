<?php
    include '_dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['cancelbook'])) {
        $Id = $_POST["cid"];
        $sql = "update `tbl_booking` set status=2, cancelled_by=2 WHERE `id`='$Id'";   
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Booking Cancelled.');
            window.location=document.referrer;
            </script>";
    }
    
    if(isset($_POST['confirmbook'])) {
        $Id = $_POST["id"];
        $sql = "update `tbl_booking` set status=1 WHERE `id`='$Id'";   
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Booking Confirmed.');
            window.location=document.referrer;
            </script>";
            }
}
?>