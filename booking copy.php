<?php include('header.php'); ?>
<section class="inner-2"> <img src="images/inner2.jpg" alt="">
<div class="pagination_b">
<div class="container">
<ul class="pagi-inner">
<li><a href="index.php">Home </a></li>
<li><a href="#0"> Booking </a></li>
</ul>
</div>
</div>
</section>
<?php if($loggedin){?>
<section class="inner-3">
<div class="container">
<div class="details">
<div class="row">
<table class="table text-center">
                <thead style="background: #dddddd;">
                    <tr>
                        <th>Booking Id</th>
                        <th>Package Name</th>
                        <th>Package Type</th>
                        <th>From</th>
                        <th>To</th>						
                        <th>Comment</th>
                        <th>Status</th>	
                        <th>Booking Date</th>					
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody style="background: white;">
						<?php
						include '_dbconnect.php';
						$id = $_SESSION['userId']; 
						$sql_package = "SELECT tbl_booking.*, tbl_tourpackage.package_name, tbl_packagetype.package_type from  tbl_booking inner join tbl_tourpackage on tbl_tourpackage.id=tbl_booking.package_id inner join tbl_packagetype on tbl_tourpackage.package_type=tbl_packagetype.id where tbl_booking.user_id='$id'";
						$result_package = mysqli_query($conn, $sql_package);
						while($row_package = mysqli_fetch_assoc($result_package)){
						$book_id = $row_package['id'];
						$bkid = 'BK-0'.$book_id;
						$package_id = $row_package['package_name'];
						$package_type = $row_package['package_type'];
						$from_date = $row_package['from_date'];
						$to_date = $row_package['to_date'];
						$comment = $row_package['comment'];
						$status = $row_package['status'];
						$cancelled_by = $row_package['cancelled_by'];
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
						$registration_date = $row_package['registration_date'];
                            
                            echo '<tr>
                                    <td>' . $bkid . '</td>
                                    <td>' . $package_id .'</td>
                                    <td>' . $package_type .'</td>
                                    <td>' . $from_date . '</td>
                                    <td>' . $to_date . '</td>
                                    <td>' . $comment . '</td>
                                    <td>' . $st . '</td>
                                    <td>' . $registration_date . '</td>';
									if ($status == 0) {
									echo '<td>
									<form method="post" action="_bookingCancel.php">
									<input type="hidden" name="book_id" value="' . $book_id . '">
									<button class="btn btn-danger" type="submit">Cancel</button>
									</form>
									</td>';
									} else if ($status == 1) {
									echo '<td>
									<button disabled class="btn btn-danger" type="submit">Cancel</button>
									</td>';
									}
									else {
									echo '<td>
									<button disabled class="btn btn-danger" type="submit">Cancelled</button>
									</td>';
									}
                               
                               echo '</tr>';
                        }
                        
                    ?>
                </tbody>
            </table>
</div>
</div>
</div>
</section>
<?php } else {
	echo "<script>
                    window.history.back(1);
                    </script>";
} ?>
<?php include('footer.php'); ?>