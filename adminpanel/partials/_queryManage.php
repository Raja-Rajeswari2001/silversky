<?php
    include '_dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['dltquery'])) {
        $id = $_POST["id"];
        $sql = "delete from `tbl_userquery` WHERE `id`='$id'";   
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Query Removed.');
            window.location=document.referrer;
            </script>";
    }
}
?>