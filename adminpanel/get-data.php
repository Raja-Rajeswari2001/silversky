<?php
include 'partials/_dbconnect.php';
$id = $_POST['galleryid'];
$sql = "select images from tbl_gallery where id='$id'";   
$result = mysqli_query($conn, $sql);
$row = mysqli_num_rows($result);
if($row>0)
{
	$res = mysqli_fetch_assoc($result);
	echo json_encode($res);
}
?>