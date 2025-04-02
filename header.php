<?php 
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
  $userId = $_SESSION['userId'];
  $username = $_SESSION['username'];
}
else{
  $loggedin = false;
  $userId = 0;
}
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<!------------ custom code -------------->
<!-- Sign up Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(249 128 27); padding: 1rem 2rem;">
                <h5 style="font-size: 2.25rem; font-weight: 600; padding-top: 8px;" class="modal-title"
                    id="signupModal">SignUp Here</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="margin-top: -24px!important;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="_handleSignup.php" method="post">
                    <div class="form-row">
                        <div class="form-group">
                            <b><label for="name">Name:</label></b>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <b><label for="email">Email:</label></b>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email"
                            required>
                    </div>
                    <div class="form-group">
                        <b><label for="phone">Phone No:</label></b>
                        <input type="tel" class="form-control" id="phone" name="phone"
                            placeholder="Enter Your Phone Number" required pattern="[0-9]{10}" maxlength="10">
                    </div>
                    <div class="form-group text-left my-2">
                        <b><label for="password">Password:</label></b>
                        <input class="form-control" id="password" name="password" placeholder="Enter Password"
                            type="password" required data-toggle="password" minlength="4" maxlength="21">
                    </div>
                    <div class="form-group text-left my-2">
                        <b><label for="password1">Renter Password:</label></b>
                        <input class="form-control" id="cpassword" name="cpassword" placeholder="Renter Password"
                            type="password" required data-toggle="password" minlength="4" maxlength="21">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
                <p class="mb-0 mt-1">Already have an account? <a href="#" data-dismiss="modal" data-toggle="modal"
                        data-target="#loginModal">Login here</a>.</p>
            </div>
        </div>
    </div>
</div>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(249 128 27); padding: 1rem 2rem;">
                <h5 style="font-size: 2.25rem; font-weight: 600; padding-top: 8px;" class="modal-title" id="loginModal">
                    Login Here</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="margin-top: -24px!important;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="_handleLogin.php" method="post">
                    <div class="form-group text-left my-2">
                        <b><label for="username">Email</label></b>
                        <input class="form-control" id="emailid" name="emailid" placeholder="Enter Your Email"
                            type="text" required>
                    </div>
                    <div class="form-group text-left my-2">
                        <b><label for="password">Password</label></b>
                        <input class="form-control" id="loginpassword" name="loginpassword"
                            placeholder="Enter Your Password" type="password" required data-toggle="password">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
                <p class="mb-0 mt-1">Don't have an account? <a href="#" data-dismiss="modal" data-toggle="modal"
                        data-target="#signupModal">Sign up now</a>.</p>
            </div>
        </div>
    </div>
</div>

<!-- Topbar Start -->
<div class="container-fluid bg-primary px-5 d-none d-lg-block">
    <div class="row gx-0">
        <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i
                        class="fab fa-twitter fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i
                        class="fab fa-facebook-f fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i
                        class="fab fa-linkedin-in fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i
                        class="fab fa-instagram fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i
                        class="fab fa-youtube fw-normal"></i></a>
            </div>
        </div>
        <div class="col-lg-4 text-center text-lg-end">
            <div class="d-inline-flex align-items-center" style="height: 45px;">

                <a data-toggle="modal" data-target="#signupModal"><small class="me-3 text-light"><i
                            class="fa fa-user me-2"></i>Register</small></a>
                <a data-toggle="modal" data-target="#loginModal"><small class="me-3 text-light"><i
                            class="fa fa-sign-in-alt me-2"></i>Login</small></a>
                <ul class=" navbar-nav navbar-right">
                    <?php if($loggedin){
          echo '<li class="dropdown" <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown"  class="dropdown-toggle" style="padding:18px; color: white;"> Welcome ' .$username. ' <span class="dropdown-toggle"></a></li>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <ul class="drop-menu">
                <li><a style="color:#555;" href="profile.php">My Profile</a></li>
                <li><a style="color:#555;" href="booking.php">My Booking</a></li>
                <li><a style="color:#555;" href="change-password.php">Change Password</a></li>
                <li><a style="color:#555;" href="_logout.php">Logout</a></li>
                </ul>
              </div>';
        } else {?>
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="false">Signup/Login <span class="caret"></span></a>
                        <div class="dropdown-menu">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">

                                    <ul class="drop-menu">
                                        <li><a data-toggle="modal" data-target="#signupModal">Signup</a></li>
                                        <li><a data-toggle="modal" data-target="#loginModal">Login</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <?php } ?>

                </ul>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle text-light" data-bs-toggle="dropdown"><small><i
                                class="fa fa-home me-2"></i> My Dashboard</small></a>
                    <div class="dropdown-menu rounded">
                        <a href="#" class="dropdown-item"><i class="fas fa-user-alt me-2"></i> My Profile</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-comment-alt me-2"></i> Inbox</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-bell me-2"></i> Notifications</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-cog me-2"></i> Account Settings</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-power-off me-2"></i> Log Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>