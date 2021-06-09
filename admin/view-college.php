<?php
session_start();
error_reporting(0);
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
                  <button id="btn-group-boards" type="button" onclick="location.href='forms.php';" class="btn btn-neutral btn-icon" data-toggle="dropdown" data-offset="0,8" aria-haspopup="true" aria-expanded="false">
                    <span class="btn-inner--icon"><i class="fas fa-file-alt"></i></span>
                    <span class="btn-inner--text d-none d-sm-inline-block">Forms</span>
                  </button>
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
    
    <section class="slice slice-lg">
      <div class="container">
        <?php
          $cid=intval($_GET['cid']);
          $sql="SELECT * from college_details where id=:cid";
          $query=$dbh->prepare($sql);
          $query-> bindParam(':cid',$cid, PDO::PARAM_STR);
          $query->execute();
          $results=$query->fetchAll(PDO::FETCH_OBJ);
          $cnt=1;
          if($query->rowCount() > 0)
          {
          foreach($results as $result)
          {
            ?>
        <div class="row row-grid">
          <div class="col-lg-4">
            <h4>College Name:</h4>
          </div>
          <div class="col-lg-8">
            <h4 class="lead lh-180">
              <?php echo htmlentities($result->collegeName);?>
            </h4>
          </div>
        </div>
        <div class="row row-grid">
          <div class="col-lg-4">
            <h4>College Code:</h4>
          </div>
          <div class="col-lg-8">
            <h4 class="lead lh-180">
              <?php echo htmlentities($result->collegeCode);?>
            </h4>
          </div>
        </div>
        <div class="row row-grid">
          <div class="col-lg-4">
            <h4>College Suburb:</h4>
          </div>
          <div class="col-lg-8">
            <h4 class="lead lh-180">
              <?php echo htmlentities($result->collegeSuburb);?>
            </h4>
          </div>
        </div>
        <div class="row row-grid">
          <div class="col-lg-4">
            <h4>College Official Email:</h4>
          </div>
          <div class="col-lg-8">
            <h4 class="lead lh-180">
              <?php echo htmlentities($result->collegeEmail);?>
            </h4>
          </div>
        </div>
        <div class="row row-grid">
          <div class="col-lg-4">
            <h4>College STD Code:</h4>
          </div>
          <div class="col-lg-8">
            <h4 class="lead lh-180">
              <?php echo htmlentities($result->collegeSTD);?>
            </h4>
          </div>
        </div>
        <div class="row row-grid">
          <div class="col-lg-4">
            <h4>College Phone:</h4>
          </div>
          <div class="col-lg-8">
            <h4 class="lead lh-180">
              <?php echo htmlentities($result->collegePhone);?>
            </h4>
          </div>
        </div>
        <div class="row row-grid">
          <div class="col-lg-4">
            <h4>College Website:</h4>
          </div>
          <div class="col-lg-8">
            <h4 class="lead lh-180">
              <a href="<?php echo htmlentities($result->collegeWebsite);?>"><?php echo htmlentities($result->collegeWebsite);?></a>
            </h4>
          </div>
        </div>
        <div class="row row-grid">
          <div class="col-lg-4">
            <h4>College Address:</h4>
          </div>
          <div class="col-lg-8">
            <h4 class="lead lh-180">
              <?php echo htmlentities($result->collegeAddress);?>
            </h4>
          </div>
        </div>
        <div class="row row-grid">
          <div class="col-lg-4">
            <h4>College City:</h4>
          </div>
          <div class="col-lg-8">
            <h4 class="lead lh-180">
              <?php echo htmlentities($result->collegeCity);?>
            </h4>
          </div>
        </div>
        <div class="row row-grid">
          <div class="col-lg-4">
            <h4>College District:</h4>
          </div>
          <div class="col-lg-8">
            <h4 class="lead lh-180">
              <?php echo htmlentities($result->collegeDistrict);?>
            </h4>
          </div>
        </div>
        <?php }} ?>
      </div>
    </section>
  </div>
  <footer class="footer p-0 footer-light bg-section-secondary" id="footer-main">
    <div class="container">
      <div class="py-4">
        <div class="row align-items-md-center">
          <div class="col-md-4 mb-4 mb-md-0">
            <div class="d-flex align-items-center">
              <p class="text-sm mb-0">&copy; VTU. 2021 All rights reserved.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
  <script src="assets/js/purpose.core.js"></script>
  <!-- Purpose JS -->
  <script src="assets/js/purpose.js"></script>
  <!-- Demo JS - remove it when starting your project -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="assets/js/demo.js"></script>
</body>

</html>

<?php } ?>