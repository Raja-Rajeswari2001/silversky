    <header class="header" id="header">
        <div class="header__toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
    </header>

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="index.php" class="nav__logo">
                    <i class='bx bx-layer nav__logo-icon'></i>
                    <span class="nav__logo-name">Tourism Management</span>
                </a>

                <div class="nav__list">
                    <a href="index.php" class="nav__link nav-home">
                      <i class='bx bx-grid-alt nav__icon' ></i>
                      <span class="nav__name">Home</span>
                    </a>
                    <a href="index.php?page=packageManage" class="nav__link nav-contactManage">
                      <i class="fa fa-tasks"></i>
                      <span class="nav__name">Tour Packages</span>
                    </a>
                    <a href="index.php?page=bookingManage" class="nav__link nav-menuManage">
                      <i class='fa fa-tasks' ></i>
                      <span class="nav__name">Manage Booking</span>
                    </a>
                    <a href="index.php?page=userManage" class="nav__link nav-contactManage">
                      <i class="fa fa-users"></i>
                      <span class="nav__name">Manage Users</span>
                    </a>
                     <a href="index.php?page=galleryManage" class="nav-orderManage nav__link ">
                      <i class='fa fa-image' ></i>
                      <span class="nav__name">Manage Gallery</span>
                    </a>
                   <a href="index.php?page=queryManage" class="nav__link nav-categoryManage">
                      <i class='fa fa-file' ></i>
                      <span class="nav__name">Manage Enquiries</span>
                    </a>
                </div>
            </div>
            <a href="partials/_logout.php" class="nav__link">
              <i class='bx bx-log-out nav__icon' ></i>
              <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>  
    
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    <?php $page = isset($_GET['page']) ? $_GET['page'] :'home'; ?>
	  $('.nav-<?php echo $page; ?>').addClass('active')
</script>
   