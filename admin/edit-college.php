<?php
session_start();
error_reporting(0);
include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{ 
  if(isset($_POST['update']))
{
      $cid=intval($_GET['cid']);
      $collegeName=$_POST['collegeName'];
      $collegeCode=$_POST['collegeCode'];
      $collegeSuburb=$_POST['collegeSuburb'];
      $collegeEmail=$_POST['collegeEmail'];
      $collegeSTD=$_POST['collegeSTD'];
      $collegePhone=$_POST['collegePhone'];
      $collegeWebsite=$_POST['collegeWebsite'];
      $collegeAddress=$_POST['collegeAddress'];
      $collegeCity=$_POST['collegeCity'];
      $collegeDistrict=$_POST['collegeDistrict'];


$sql="update college_details set collegeName=:collegeName, collegeCode=:collegeCode, collegeSuburb=:collegeSuburb, collegeEmail=:collegeEmail,  collegeSTD=:collegeSTD, collegePhone=:collegePhone, collegeWebsite=:collegeWebsite, collegeAddress=:collegeAddress, collegeCity=:collegeCity, collegeDistrict=:collegeDistrict where id=:cid";

$query = $dbh->prepare($sql);
$query->bindParam(':collegeName',$consultant_name,PDO::PARAM_STR);
$query->bindParam(':collegeCode',$role,PDO::PARAM_STR);
$query->bindParam(':collegeSuburb',$technology,PDO::PARAM_STR);
$query->bindParam(':collegeEmail',$years_of_experience,PDO::PARAM_STR);
$query->bindParam(':collegeSTD',$education,PDO::PARAM_STR);
$query->bindParam(':collegePhone',$notice_period,PDO::PARAM_STR);
$query->bindParam(':collegeWebsite',$language,PDO::PARAM_STR);
$query->bindParam(':collegeAddress',$min_rate,PDO::PARAM_STR);
$query->bindParam(':collegeCity',$current_location,PDO::PARAM_STR);
$query->bindParam(':collegeDistrict',$comments,PDO::PARAM_STR);
$query->bindParam(':cid',$cid,PDO::PARAM_STR);
$query->execute();
$_SESSION['updatemsg']="Candidate info updated successfully";
header('location:college-list.php');

}
?>
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
                <span class="h2 mb-0 text-white d-block">Morning, <?php echo $_SESSION['display_name'];?></span>
                
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
    <section class="slice bg-section-secondary">
      <div class="container">
        <div class="col-lg-9 m-auto">
          <!-- General information form -->
          <div class="actions-toolbar py-2 mb-4">
            <h2 class="mb-1">Collge information</h2>
          </div>
          <form method="POST" enctype="multipart/form-data">
            <?php 
              $cid=intval($_GET['cid']);
              $sql = "SELECT * from  college_details where id=:cid";
              $query = $dbh -> prepare($sql);
              $query->bindParam(':cid',$cid,PDO::PARAM_STR);
              $query->execute();
              $results=$query->fetchAll(PDO::FETCH_OBJ);
              $cnt=1;
              if($query->rowCount() > 0)
              {
              foreach($results as $result)
              {               ?>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="form-control-label">College Name</label>
                  <input class="form-control" type="text" name="collegeName" placeholder="Enter College Name" value="<?php echo htmlentities($result->collegeName);?>">
                </div>
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">College Code</label>
                  <input class="form-control" type="text" name="collegeCode" placeholder="Enter College Code" value="<?php echo htmlentities($result->collegeCode);?>">
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group focused">
                    <label class="form-control-label">Suburb</label>
                    <select class="form-control select2-hidden-accessible" name="collegeSuburb" data-toggle="select" title="Country" data-live-search="true" data-live-search-placeholder="Country" data-select2-id="4" tabindex="-1" aria-hidden="true">
                      <option selected><?php if($result->collegeSuburb==='urban') {?>
                        Urban
                        <?php } 
                                else {?>
                        Rural
                        <?php } ?></option>
                      <option value="urban">Urban</option>
                      <option value="rural">Rural</option>
                    </select>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">College Official Email</label>
                  <input class="form-control" type="email" name="collegeEmail" placeholder="name@exmaple.com" value="<?php echo htmlentities($result->collegeEmail);?>">
                  <small class="form-text text-muted mt-2">This is the main email address that we'll send notifications to. </small>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">College STD Code</label>
                  <input class="form-control" type="text" name="collegeSTD" placeholder="080" value="<?php echo htmlentities($result->collegeSTD);?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">College Phone</label>
                  <input class="form-control" type="text" name="collegePhone" placeholder="+40-777 245 549" value="<?php echo htmlentities($result->collegePhone);?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="form-control-label">College Website</label>
                  <input class="form-control" type="text" name="collegeWebsite" placeholder="Enter College Website" value="<?php echo htmlentities($result->collegeWebsite);?>">
                </div>
              </div>
            </div>
            <!-- Address -->
            <div class="pt-5 mt-5 delimiter-top">
              <div class="actions-toolbar py-2 mb-4">
                <h5 class="mb-1">Address details</h5>
                <p class="text-sm text-muted mb-0">Fill in the address of the College.</p>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label class="form-control-label">Address</label>
                    <input class="form-control" type="text" name="collegeAddress" placeholder="Enter the College address" value="<?php echo htmlentities($result->collegeAddress);?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label">City</label>
                    <input class="form-control" type="text" name="collegeCity" placeholder="City" value="<?php echo htmlentities($result->collegeCity);?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group focused">
                    <label class="form-control-label">District</label>
                    <select class="form-control select2-hidden-accessible" name="collegeDistrict" data-toggle="select" title="Country" data-live-search="true" data-live-search-placeholder="Country" data-select2-id="4" tabindex="-1" aria-hidden="true">
                      <option selected><?php if($result->collegeDistrict==='Bengaluru') {?>
                        Bengaluru
                        <?php } elseif ($result->collegeDistrict==='Belgavi') {?>
                         Belgavi
                        <?php } elseif ($result->collegeDistrict==='Kalaburgi') {?>
                        Kalaburgi
                        <?php } else {?>
                        Mysuru
                        <?php } ?></option>
                      <option value="Bengaluru">Bengaluru</option>
                      <option value="Belgavi">Belgavi</option>
                      <option value="Kalaburgi">Kalaburgi</option>
                      <option value="Mysuru">Mysuru</option>
                    </select>
                  </div>
                </div>
              </div>
              <?php }} ?>
            </div>            
            <!-- Save changes buttons -->
            <div class="pt-5 mt-5 delimiter-top text-center">
              <button type="submit" name="update" value="Update" class="btn btn-sm btn-primary">Save changes</button>
              <button onclick="location.href='#';" class="btn btn-link text-muted">Cancel</button>
            </div>
          </form>
        </div>       
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
  <script src="assets/js/demo.js"></script>
</body>

</html>
<?php } ?>