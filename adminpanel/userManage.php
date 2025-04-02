<div class="container-fluid" style="margin-top:98px">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: rgb(111 202 203);">
                        Registered Users
                    </div>
                    <div class="card-body">
                        <table class="table-striped table-bordered col-md-12 text-center">
                            <thead style="background-color: rgb(111 202 203);">
                                <tr>
                                    <th>Name</th>
                                    <th>Emailid</th>
                                    <th>Mobile</th>
                                    <th>Registration Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            $sql = "SELECT * FROM tbl_userregistration"; 
                            $result = mysqli_query($conn, $sql);
                            
                            while($row=mysqli_fetch_assoc($result)) {
                                $Id = $row['id'];
                                $name = $row['name'];
                                $mobile = $row['mobile'];
                                $emailid = $row['emailid'];
                                $registration_date = $row['registration_date'];
                                echo '<tr>
                                    <td> ' .$name. ' </td>
                                    <td>' .$emailid. '</td>
                                    <td>' .$mobile. '</td>
                                    <td>' .$registration_date. '</td>
                                    <td class="text-center">
                                        <div class="row mx-auto" style="width:112px">';
                                            
                                                echo '<form action="partials/_userManage.php" method="POST">
                                                        <button name="removeUser" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete</button>
                                                        <input type="hidden" name="Id" value="'.$Id. '">
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