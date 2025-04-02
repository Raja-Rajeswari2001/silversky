<div class="container-fluid" style="margin-top:98px">
    <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#newpackage"><i
                    class="fa fa-plus"></i> New Package</button>
        </div>
    </div>
    <br>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: rgb(111 202 203);">
                        Manage Packages
                    </div>
                    <div class="card-body">
                        <table class="table-striped table-bordered col-md-12 text-center">
                            <thead style="background-color: rgb(111 202 203);">
                                <tr>
                                    <th>Package Name</th>
                                    <th>Package Type</th>
                                    <th>Package Location</th>
                                    <th>Package Price</th>
                                    <th>Package Details</th>
                                    <th>Package Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                           $sql = "SELECT tbl_tourpackage.*, tbl_packagetype.package_type FROM tbl_tourpackage inner join tbl_packagetype on tbl_tourpackage.package_type=tbl_packagetype.id"; 
                            $result = mysqli_query($conn, $sql);
                            
                            while($row=mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $package_name = $row['package_name'];
                                $package_type = $row['package_type'];
                                $package_location = $row['package_location'];
                                $package_price = $row['package_price'];
                                $package_details = $row['package_details'];
                                 
                                echo '<tr>
                                    <td>' .$package_name. '</td>
                                    <td>' .$package_type. '</td>
                                    <td>' .$package_location. '</td>
                                    <td>' .$package_price. '</td>
                                    <td>' .$package_details. '</td>
                                    <td><img src="uploads/'.$row['package_image'].'" height="60"></td>
                                    <td class="text-center">
                                        <div class="row mx-auto" style="width:112px">
                                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editpackage'.$id. '" type="button">Edit</button>';
                                            
                                                echo '<form action="partials/_packageManage.php" method="POST">
                                                        <button name="removepackage" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete</button>
                                                        <input type="hidden" name="Id" value="'.$id. '">
                                                    </form>';
                                            
                                    echo '</div>
                                    </td>
                                </tr>';
                            }
                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    $usersql = "SELECT * FROM tbl_tourpackage";
    $userResult = mysqli_query($conn, $usersql);
    while($userRow = mysqli_fetch_assoc($userResult)){
        $id = $userRow['id'];
        $package_name = $userRow['package_name'];
        $package_type = $userRow['package_type'];
        $package_location = $userRow['package_location'];
        $package_price = $userRow['package_price'];
        $package_details = $userRow['package_details'];
                
?>
<!-- editpackage Modal -->
<div class="modal fade" id="editpackage<?php echo $id; ?>" tabindex="-1" role="dialog"
    aria-labelledby="editpackage<?php echo $id; ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(111 202 203);">
                <h5 class="modal-title" id="editpackage<?php echo $id; ?>">Edit Package </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="partials/_packageManage.php" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <b><label for="name">Package Name:</label></b>
                            <input type="text" class="form-control" id="packagename" name="packagename"
                                placeholder="Enter Package Name" value="<?php echo $package_name; ?>" required>
                        </div>
                        <div class="form-group col-md-12 my-0">
                            <b><label for="type">Package Type:</label></b>
                            <select name="packagetype" id="packagetype" class="custom-select browser-default" required>
                                <?php 
                        $sql = "SELECT * FROM tbl_packagetype"; 
                            $result = mysqli_query($conn, $sql);
                            
                            while($row=mysqli_fetch_assoc($result)) {
                        ?>
                                <option value="<?php echo $row['id']; ?>"
                                    <?php if($row['id'] == $package_type) { echo "selected"; }?>>
                                    <?php echo $row['package_type']; ?></option>
                                <?php
                             } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <b><label for="location">Package Location:</label></b>
                            <input type="text" class="form-control" id="packagelocation" name="packagelocation"
                                placeholder="Enter Location" value="<?php echo $package_location; ?>" required>
                        </div>
                        <div class="form-group col-md-12">
                            <b><label for="price">Package Price:</label></b>
                            <input type="text" class="form-control" id="packageprice" name="packageprice"
                                placeholder="Enter Price" value="<?php echo $package_price; ?>" required>
                        </div>
                        <div class="form-group col-md-12">
                            <b><label for="details">Package Details:</label></b>
                            <textarea class="form-control" id="packagedetails" name="packagedetails"
                                placeholder="Enter Details" required><?php echo $package_details; ?></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <b><label for="image">Package Image:</label></b>
                            <input type="file" class="form-control" id="packageimage" name="packageimage">
                        </div>
                    </div>
                    <input type="hidden" id="packageId" name="packageId" value="<?php echo $id; ?>">
                    <button type="submit" name="editPackage" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<!-- newpackage Modal -->
<div class="modal fade" id="newpackage" tabindex="-1" role="dialog" aria-labelledby="newpackage" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(111 202 203);">
                <h5 class="modal-title" id="newpackage">Create Package</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="partials/_packageManage.php" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <b><label for="name">Package Name:</label></b>
                            <input type="text" class="form-control" id="packagename" name="packagename"
                                placeholder="Enter Package Name" required>
                        </div>
                        <div class="form-group col-md-12 my-0">
                            <b><label for="type">Package Type:</label></b>
                            <select name="packagetype" id="packagetype" class="custom-select browser-default" required>
                                <option value="">Select Package Type</option>
                                <?php
                        $select_type = "SELECT * FROM tbl_packagetype";
                        $typeResult = mysqli_query($conn, $select_type);
                        while($typeRow = mysqli_fetch_assoc($typeResult)){
                        ?>
                                <option value="<?php echo $typeRow['id']; ?>"><?php echo $typeRow['package_type']; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <b><label for="location">Package Location:</label></b>
                            <input type="text" class="form-control" id="packagelocation" name="packagelocation"
                                placeholder="Enter Location" required>
                        </div>
                        <div class="form-group col-md-12">
                            <b><label for="price">Package Price:</label></b>
                            <input type="text" class="form-control" id="packageprice" name="packageprice"
                                placeholder="Enter Price" required>
                        </div>
                        <div class="form-group col-md-12">
                            <b><label for="details">Package Details:</label></b>
                            <textarea class="form-control" id="packagedetails" name="packagedetails"
                                placeholder="Enter Details" required></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <b><label for="image">Package Image:</label></b>
                            <input type="file" class="form-control" id="packageimage" name="packageimage" required>
                        </div>
                        <button type="submit" name="createpackage" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>