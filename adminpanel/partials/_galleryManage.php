<?php
    include '_dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['removegallery'])) {
        $Id = $_POST["Id"];
        $sql = "DELETE FROM `tbl_gallery` WHERE `id`='$Id'";   
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Removed.');
            window.location=document.referrer;
            </script>";
    }
    
    if(isset($_POST['creategallery'])) {
    $location = $_POST["location"];
    foreach($_FILES['packageimage']['tmp_name'] as $key => $tmp_name)
    {
       $file_name = $_FILES['packageimage']['name'][$key];
       $file_tmp = $_FILES['packageimage']['tmp_name'][$key];
       $file_destination = '../uploads/'.$file_name;
       move_uploaded_file($file_tmp, $file_destination);
    }
        $images = implode(', ',$_FILES['packageimage']['name']);
        $sql = "INSERT INTO `tbl_gallery` ( `location`,`images`) VALUES ('$location', '$images')";   
                $result = mysqli_query($conn, $sql);
                if ($result){
                    echo "<script>alert('New Gallery Added Successfully.');
                            window.location=document.referrer;
                        </script>";
                }else {
                    echo "<script>alert('Failed');
                            window.location=document.referrer;
                        </script>";
                }
            }
            
    if(isset($_POST['editGallery'])) {
    $id = mysqli_real_escape_string($conn, $_POST["galleryId"]);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    
    $sql = "UPDATE `tbl_gallery` SET `location`='$location' WHERE `id`='$id'";
    $result = mysqli_query($conn, $sql);

    if($result) {
        if(isset($_FILES['packageimage'])) {
            $existing_images = array();
            
            // Fetch existing images
            $sql = "SELECT `images` FROM `tbl_gallery` WHERE `id`='$id'";
            $result = mysqli_query($conn, $sql);
            if($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $existing_image_str = $row['images'];
                $existing_images = explode(', ', $existing_image_str);
            }

            foreach($_FILES['packageimage']['tmp_name'] as $key => $tmp_name) {
                $image_name = $_FILES['packageimage']['name'][$key];
                $image_tmp = $_FILES['packageimage']['tmp_name'][$key];
                $image_destination = '../uploads/'.basename($image_name);

                if(move_uploaded_file($image_tmp, $image_destination)) {
                    $existing_images[] = $image_name; // Add new image to existing list
                } 
            }

            // Prepare updated images string
            $updated_images_str = implode(', ', $existing_images);

            // Update images in database
            $sql = "UPDATE `tbl_gallery` SET `images`='$updated_images_str' WHERE `id`='$id'";
            $result = mysqli_query($conn, $sql);

            if($result) {
                echo "<script>alert('Update successful.');
                      window.location=document.referrer;</script>";
            } 
        } else {
            echo "<script>alert('No images to update.');</script>";
        }
    } else {
        echo "<script>alert('Failed to update gallery location.');</script>";
    }
}
}
?>