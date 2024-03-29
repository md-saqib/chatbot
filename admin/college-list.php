<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'college_management.php');
include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config.php');
if(strlen($_SESSION['login'])==0)
  {
header('location:login.php');
}
else{

if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "select * from college_details WHERE id=:id; delete from college_details WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;

$_SESSION['delmsg']="College deleted";
header('location:college-list.php?deleted=1');

}?>
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
        <!-- Section title -->
        <div class="actions-toolbar py-2 mb-4">
          <div class="actions-search" id="actions-search">
            <div class="input-group input-group-merge input-group-flush">
              <div class="input-group-prepend">
                <span class="input-group-text bg-transparent"><i class="fas fa-search"></i></span>
              </div>
              <input id="search" type="text" class="form-control" placeholder="Type and hit enter ...">
              <div class="input-group-append">
                <a href="#" class="input-group-text bg-transparent" data-action="search-close" data-target="#actions-search"><i class="fas fa-times"></i></a>
              </div>
            </div>
          </div>
          <div class="row justify-content-between align-items-center">
            <div class="col">
              <h2 class="mb-1">Affiliated College List</h2>
            </div>
            <div class="col text-right">
              <div class="actions">
                <a href="#" class="action-item mr-2" data-action="search-open" data-target="#actions-search"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <!-- Orders table -->
        <div class="table-responsive college-list-table">
          <table class="table table-cards align-items-center">
            <thead>
              <tr>
                <th scope="col" class="sort" data-sort="name">College Name</th>
                <th scope="col" class="sort" data-sort="name">College Code</th>
                <th scope="col" class="sort" data-sort="name">District</th>                
              </tr>
            </thead>
            <tbody class="list">
              <?php $sql = "SELECT * from  college_details";
                $query = $dbh-> prepare($sql);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if($query->rowCount() > 0)
                  {
                    foreach($results as $result)
                      {               ?>
              <tr>
                <th scope="row">
                  <div class="media align-items-center">
                    <div class="media-body">
                      <span class="name mb-0 text-sm"><?php echo htmlentities($result->collegeName);?></span>
                    </div>
                  </div>
                </th>
                <td>
                  <?php echo htmlentities($result->collegeCode);?>
                </td>
                <td>
                  <?php echo htmlentities($result->collegeDistrict);?>
                </td>
                <td class="text-right">
                  <!-- Actions -->
                  <div class="actions ml-3">
                    <a href="view-college.php?cid=<?php echo htmlentities($result->id);?>" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="Quick view">
                      <i class="fas fa-external-link-alt"></i>
                    </a>
                    <a href="edit-college.php?cid=<?php echo htmlentities($result->id);?>" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="Edit">
                      <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a href="college-list.php?del=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to delete?');" class="action-item text-danger mr-2" data-toggle="tooltip" title="" data-original-title="Move to trash">
                      <i class="fas fa-trash"></i>
                    </a>
                  </div>
                </td>
              </tr>
              <tr class="table-divider"></tr>

              <?php $cnt=$cnt+1;}} ?>
            </tbody>
          </table>
        </div>
        <!-- Load more -->
        <div class="mt-4 text-center">
          <a href="#" id="seeMore" class="btn btn-sm btn-neutral rounded-pill shadow hover-translate-y-n3">Load more ...</a>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="assets/js/demo.js"></script>
  <script type="text/javascript">

    $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".list tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  $(document).ready(function(){
  $("tr").slice(0,10).show();
  $("#seeMore").click(function(e){
    e.preventDefault();
    $("tr:hidden").slice(0,10).fadeIn("slow");
    
    if($("tr:hidden").length == 0){
       $("#seeMore").fadeOut("slow");
      }
  });
})


  </script>
</body>

</html>

<?php } ?>