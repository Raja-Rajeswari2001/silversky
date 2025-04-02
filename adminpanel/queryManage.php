<div class="container-fluid" style="margin-top:98px">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: rgb(111 202 203);">
                        Manage Contact Enquiries
                    </div>
                    <div class="card-body">
                        <table class="table-striped table-bordered col-md-12 text-center">
                            <thead style="background-color: rgb(111 202 203);">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>EmailId</th>
                                    <th>Mobile</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Enquiry Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                           $sql = "SELECT * from tbl_userquery"; 
                           $result = mysqli_query($conn, $sql);
                            
                            while($row_query=mysqli_fetch_assoc($result)) {
                        $id = $row_query['id'];
                        $name = $row_query['name'];
                        $emailid = $row_query['emailid'];
                        $mobile = $row_query['mobile'];
                        $subject = $row_query['subject'];
                        $message = $row_query['message'];
                        $created_at = $row_query['created_at'];
                        
                                echo '<tr>
                                    <td>' .$id. '</td>
                                    <td>' .$name. '</td>
                                    <td>' .$emailid. '</td>
                                    <td>' .$mobile. '</td>
                                    <td>' .$subject. '</td>
                                    <td>' .$message. '</td>
                                    <td>' .$created_at. '</td>
                                    <td class="text-center">
                                        <div class="row mx-auto" style="width:136px">';
                                                                                
                                                echo '<form action="partials/_queryManage.php" method="POST">
                                                        <button  name="dltquery" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete</button>
                                                        <input type="hidden" name="id" value="'.$id. '">
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