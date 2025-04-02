<div class="container-fluid" style="margin-top:98px">
	<div class="row">
        <div class="col-lg-12">
            <button class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#newgallery"><i class="fa fa-plus"></i> Add New</button>
        </div>
	</div>
	    <br>
	<div class="col-lg-12">
        <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header" style="background-color: rgb(111 202 203);">
                            Manage Gallery
                        </div>
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12 text-center">
                    <thead style="background-color: rgb(111 202 203);">
                        <tr>
                            <th>Location</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php
                           $sql = "SELECT * FROM tbl_gallery"; 
                            $result = mysqli_query($conn, $sql);
                            
                            while($row=mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $location = $row['location'];
                                echo '<tr>
                                    <td>' .$location. '</td>
                                    <td>';

                                    $images = explode(', ', $row['images']);
                                    foreach ($images as $image) {
                                    echo '<img src="./uploads/' . $image . '" height="90" style="margin-right: 10px;">';
                                    }

                                    echo '</td>
                                    <td class="text-center">
                                        <div class="row mx-auto" style="width:112px">
                                            <button id="edit-gal" data-id="'.$id. '" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editgallery'.$id. '" type="button">Edit</button>';
                                            
                                                echo '<form action="partials/_galleryManage.php" method="POST">
                                                        <button name="removegallery" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete</button>
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
    $gallerysql = "SELECT * FROM tbl_gallery";
    $galleryResult = mysqli_query($conn, $gallerysql);
    while($galleryRow = mysqli_fetch_assoc($galleryResult)){
        $id = $galleryRow['id'];
        $location = $galleryRow['location'];
        
                
?>
<!-- editgallery Modal -->
<div class="modal fade" id="editgallery<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="editgallery<?php echo $id; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="editgallery<?php echo $id; ?>">Edit Gallery </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form action="partials/_galleryManage.php" method="post" enctype="multipart/form-data">
                <div class="form-row">
                <div class="form-group col-md-12">
                  <b><label for="name">Location:</label></b>
                  <input type="text" class="form-control" id="location" name="location" placeholder="Enter Location Name" value="<?php echo $location; ?>" required>
                </div> 
                <div class="form-group col-md-12">
                  <b><label for="image">Choose Images:</label></b>
                  <input type="file" class="form-control" id="packageimage" name="packageimage[]" multiple>
              </div>              
              </div>
                 <input type="hidden" id="galleryId" name="galleryId" value="<?php echo $id; ?>">
                <button type="submit" name="editGallery" id="editGallery" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
  </div>
</div>
<?php } ?>

<!-- newgallery Modal -->
<div class="modal fade" id="newgallery" tabindex="-1" role="dialog" aria-labelledby="newgallery" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="newgallery">Create Gallery</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="partials/_GalleryManage.php" method="post" enctype="multipart/form-data">
              <div class="form-row">
                <div class="form-group col-md-12">
                  <b><label for="name">Location:</label></b>
                  <input type="text" class="form-control" id="location" name="location" placeholder="Enter Location Name" required>
                </div>
                <div class="form-group col-md-12">
                  <b><label for="image">Choose Images:</label></b>
                  <input type="file" class="form-control" id="packageimage" name="packageimage[]"required multiple>
              </div>
              <button type="submit" name="creategallery" class="btn btn-success">Submit</button>
            </form>
      </div>
    </div>
  </div>
</div>