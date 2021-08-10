<?php 
// error_reporting(0);
session_start();
include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config.php');
if(strlen($_SESSION['login'])==0)
  {
header('location:login.php');
}
else{?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title></title>
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
  <!-- Font Awesome 5 -->
  <link rel="stylesheet" href="assets/libs/@fortawesome/fontawesome-free/css/all.min.css"><!-- Purpose CSS -->
  <link rel="stylesheet" href="assets/css/purpose.css" id="stylesheet">
</head>

<body>
  <header class="header header-transparent" id="header-main">
    <!-- Main navbar -->
    <nav class="navbar navbar-main navbar-expand-lg navbar-dark bg-dark" id="navbar-main">
      <div class="container px-lg-0">
        <!-- Logo -->
        <a class="navbar-brand mr-lg-5" href="index.php">
          <img alt="Image placeholder" src="assets/img/vtu-logo.png" id="navbar-logo" style="height:150px;">
        </a>
        <!-- Navbar collapse trigger -->
        <button class="navbar-toggler pr-0" type="button" data-toggle="collapse" data-target="#navbar-main-collapse" aria-controls="navbar-main-collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>
  </header>
  <div class="main-content">
    <!-- Header (account) -->
    <section class="header-account-page bg-primary d-flex align-items-end" data-offset-top="#header-main">
      <!-- Header container -->
      <div class="container pt-4 pt-lg-0">
        <div class="row">
          <div class=" col-lg-12">
            <!-- Salute + Small stats -->
            <div class="row align-items-center mb-4">
              <div class="col-md-5 mb-4 mb-md-0">
                <span class="h2 mb-0 text-white d-block">Hello, <?php echo $_SESSION['display_name'];?></span>
              </div>
            </div>
            <!-- Account navigation -->
            <div class="d-flex">
              <a href="index.php" class="btn btn-icon btn-group-nav shadow btn-neutral">
                <span class="btn-inner--icon"><i class="fas fa-chart-bar"></i></span>
                <span class="btn-inner--text d-none d-md-inline-block">Dashboard</span>
              </a>
              
              <div class="btn-group btn-group-nav shadow ml-auto" role="group" aria-label="Basic example">
                <div class="btn-group" role="group">
                  <button id="btn-group-settings" type="button" class="btn btn-neutral btn-icon" data-toggle="dropdown" data-offset="0,8" aria-haspopup="true" aria-expanded="false">
                    <span class="btn-inner--icon"><i class="fas fa-building"></i></span>
                    <span class="btn-inner--text d-none d-sm-inline-block">Colleges</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" aria-labelledby="btn-group-settings">
                    <a class="dropdown-item" href="add-college.php">Add College</a>
                    <a class="dropdown-item" href="college-list.php">College List</a>
                  </div>
                </div>
                
                <div class="btn-group" role="group">
                  <button id="btn-group-listing" type="button" class="btn btn-neutral btn-icon rounded-right" data-toggle="dropdown" data-offset="0,8" aria-haspopup="true" aria-expanded="false">
                    <span class="btn-inner--icon"><i class="fas fa-user"></i></span>
                    <span class="btn-inner--text d-none d-sm-inline-block">My Profile</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" aria-labelledby="btn-group-settings">
                    <a class="dropdown-item" href="view-profile.php">View Profile</a>
                    <a class="dropdown-item" href="log-out.php">Log Out</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="slice bg-section-secondary">
      <div class="container">
        <!-- Stats -->
              
      </div>
    </section>
  </div>
  <footer class="footer p-0 footer-light bg-section-secondary" id="footer-main">
    <div class="container">
      <div class="py-4">
        
      </div>
    </div>
  </footer>
  <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
  <script src="assets/js/purpose.core.js"></script>
  <!-- Purpose JS -->
  <script src="assets/js/purpose.js"></script>
  <!-- Demo JS - remove it when starting your project -->
  <script src="assets/js/demo.js"></script>
</body>

</html>
<?php } ?>