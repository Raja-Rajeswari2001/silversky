<?php
    include '_dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['removepackage'])) {
        $Id = $_POST["Id"];
        $sql = "DELETE FROM `tbl_tourpackage` WHERE `id`='$Id'";   
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Removed.');
            window.location=document.referrer;
            </script>";
    }
    
    if(isset($_POST['createpackage'])) {
        $packagename = $_POST["packagename"];
        $packagetype = $_POST["packagetype"];
        $packagelocation = $_POST["packagelocation"];
        $packageprice = $_POST["packageprice"];
        $packagedetails = $_POST["packagedetails"];

       $image_name = $_FILES['packageimage']['name'];
       $image_tmp = $_FILES['packageimage']['tmp_name'];
       $image_destination = '../uploads/'.$image_name;
       move_uploaded_file($image_tmp, $image_destination);

        $sql = "INSERT INTO `tbl_tourpackage` ( `package_name`, `package_type`, `package_location`, `package_price`, `package_details`,`package_image`) VALUES ('$packagename', '$packagetype', '$packagelocation', '$packageprice', '$packagedetails', '$image_name')";   
                $result = mysqli_query($conn, $sql);
                if ($result){
                    echo "<script>alert('New Pakage Added Successfully.');
                            window.location=document.referrer;
                        </script>";
                }else {
                    echo "<script>alert('Failed');
                            window.location=document.referrer;
                        </script>";
                }
            }
            
    if(isset($_POST['editPackage'])) {
        $id = $_POST["packageId"];
        $packagename = $_POST['packagename'];
        $packagetype = $_POST['packagetype'];
        $packagelocation = $_POST['packagelocation'];
        $packageprice = $_POST['packageprice'];
        $packagedetails = $_POST['packagedetails'];

        if(isset($_FILES['packageimage']))
        {
           $image_name = $_FILES['packageimage']['name'];
           $image_tmp = $_FILES['packageimage']['tmp_name'];
           $image_destination = '../uploads/'.$image_name;
           move_uploaded_file($image_tmp, $image_destination); 
        
        $sql = "UPDATE `tbl_tourpackage` SET `package_name`='$packagename', `package_type`='$packagetype', `package_location`='$packagelocation', `package_price`='$packageprice', `package_details`='$packagedetails', `package_image`='$image_name'  WHERE `id`='$id'";   
        $result = mysqli_query($conn, $sql);
        if ($result){
            echo "<script>alert('Update successfully.');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('failed');
                window.location=document.referrer;
                </script>";
            }
        }
    }   
}
?>