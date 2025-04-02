<div class="container-fluid" style="margin-top:98px">
	<div class="col-lg-12">
        <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header" style="background-color: rgb(111 202 203);">
                            Manage Booking
                        </div>
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12 text-center">
                    <thead style="background-color: rgb(111 202 203);">
                        <tr>
                        <th>Booking Id</th>
                        <th>Name</th>
                        <th>EmailId</th>
                        <th>Mobile</th>
                        <th>Package Name</th>
                        <th>Package Type</th>
                        <th>Booking Date</th>                    
                        <th>Comment</th>
                        <th>Status</th>                    
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                           $sql = "SELECT tbl_booking.*, tbl_tourpackage.package_name, tbl_packagetype.package_type,tbl_userregistration.name,tbl_userregistration.emailid,tbl_userregistration.mobile  from  tbl_booking inner join tbl_tourpackage on tbl_tourpackage.id=tbl_booking.package_id inner join tbl_packagetype on tbl_tourpackage.package_type=tbl_packagetype.id inner join tbl_userregistration on tbl_userregistration.id=tbl_booking.user_id"; 
                            $result = mysqli_query($conn, $sql);
                            
                            while($row_package=mysqli_fetch_assoc($result)) {
                        $book_id = $row_package['id'];
                        $bkid = 'BK-0'.$book_id;
                        $name = $row_package['name'];
                        $emailid = $row_package['emailid'];
                        $mobile = $row_package['mobile'];
                        $package_id = $row_package['package_name'];
                        $package_type = $row_package['package_type'];
                        $from_date = $row_package['from_date'];
                        $to_date = $row_package['to_date'];
                        $comment = $row_package['comment'];
                        $status = $row_package['status'];
                        $cancelled_by = $row_package['cancelled_by'];
                        $registration_date = $row_package['registration_date'];
                        if($status==0)
                        {
                            $st = 'Pending';
                        }
                        else if($status==1)
                        {
                            $st = 'Confirmed';
                        }
                        else if($cancelled_by==1)
                        {
                            $st = 'Cancelled by User.';
                        }
                        else
                        {
                            $st = 'Cancelled by Admin.';
                        }
                                echo '<tr>
                                    <td>' .$bkid. '</td>
                                    <td>' .$name. '</td>
                                    <td>' .$emailid. '</td>
                                    <td>' .$mobile. '</td>
                                    <td>' .$package_id. '</td>
                                    <td>' .$package_type. '</td>
                                    <td>From: ' .$from_date. ' To: ' .$to_date. '</td>
                                    <td>' .$comment. '</td>
                                    <td>' .$st. '</td>
                                    <td class="text-center">
                                        <div class="row mx-auto" style="width:136px">';
                                        if ($status == 0) {
                                      echo '<form action="partials/_bookManage.php" method="POST">
                                        <input type="hidden" name="id" value="'.$book_id. '">
                                            <button name="confirmbook" class="btn btn-sm btn-primary">Confirm</button></form>';
                                            
                                                echo '<form action="partials/_bookManage.php" method="POST">
                                                        <button name="cancelbook" class="btn btn-sm btn-danger" style="margin-left:9px;">Cancel</button>
                                                        <input type="hidden" name="cid" value="'.$book_id. '">
                                                    </form>';
                                            }
                                            else
                                            {
                                                echo '<form action="partials/_bookManage.php" method="POST">
                                        <input type="hidden" name="id" value="'.$book_id. '">
                                            <button disabled name="confirmbook" class="btn btn-sm btn-primary">Confirm</button></form>';
                                            
                                                echo '<form action="partials/_bookManage.php" method="POST">
                                                        <button disabled name="cancelbook" class="btn btn-sm btn-danger" style="margin-left:9px;">Cancel</button>
                                                        <input type="hidden" name="cid" value="'.$book_id. '">
                                                    </form>';
                                            }
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

<!-- newroom Modal -->
<div class="modal fade" id="newroom" tabindex="-1" role="dialog" aria-labelledby="newroom" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="newroom">Add New Room</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="partials/_roomManage.php" method="post">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <b><label for="roomno">Room Number:</label></b>
                  <input type="text" class="form-control" id="roomno" name="roomno" placeholder="Enter Room Number" required>
                </div>
                <div class="form-group col-md-6 my-0">
                        <b><label for="seater">Seater:</label></b>
                        <select name="seater" id="seater" class="custom-select browser-default" required>
                        <option value="">Select Seater</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        </select>
                    </div>
                <div class="form-group col-md-6">
                  <b><label for="fees">Fees:</label></b>
                  <input type="text" class="form-control" id="fees" name="fees" placeholder="Enter Total Fees" required>
                </div>
              </div>
              <button type="submit" name="createRoom" class="btn btn-success">Submit</button>
            </form>
      </div>
    </div>
  </div>
</div>

<?php 
    // $usersql = "SELECT * FROM `roomsdetails`";
    // $userResult = mysqli_query($conn, $usersql);
    // while($userRow = mysqli_fetch_assoc($userResult)){
    //     $Id = $userRow['id'];
    //     $seater = $userRow['seater'];
    //     $room_no = $userRow['room_no'];
    //     $fees = $userRow['fees'];
                
?>
<!-- editroom Modal -->
<div class="modal fade" id="editroom<?php echo $Id; ?>" tabindex="-1" role="dialog" aria-labelledby="editroom<?php echo $Id; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="editroom<?php echo $Id; ?>">Edit Room Details </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form action="partials/_roomManage.php" method="post">
                <div class="form-row">
                <div class="form-group col-md-6">
                  <b><label for="roomno">Room Number:</label></b>
                  <input type="text" class="form-control" id="roomno" name="roomno" placeholder="Enter Room Number" value="<?php echo $room_no; ?>" required>
                </div>
                <div class="form-group col-md-6 my-0">
                        <b><label for="seater">Seater:</label></b>
                        <select name="seater" id="seater" class="custom-select browser-default" required>
                        <?php 
                        for($i=1; $i<=5; $i++){
                        ?>
                        <option value="<?php echo $i; ?>"<?php if($seater == $i) { echo "selected"; }?>><?php echo $i; ?></option>
                        <?php
                             } ?>
                        </select>
                    </div>
                <div class="form-group col-md-6">
                  <b><label for="fees">Fees:</label></b>
                  <input type="text" class="form-control" id="fees" name="fees" placeholder="Enter Total Fees" value="<?php echo $fees; ?>" required>
                </div>
              </div>
                <input type="hidden" id="roomId" name="roomId" value="<?php echo $Id; ?>">
                <button type="submit" name="editRoom" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
  </div>
</div>
<?php
// }
?>