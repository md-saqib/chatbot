<?php
session_start();
error_reporting(0);
include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config.php');
if($_SESSION['login']!=''){
$_SESSION['login']='';
}
if(isset($_POST['login']))
{
$un=$_POST['un'];
$ps=md5($_POST['ps']);
$sql ="SELECT * FROM admin WHERE username=:un and password=:ps";
$query= $dbh -> prepare($sql);
$query-> bindParam(':un', $un, PDO::PARAM_STR);
$query-> bindParam(':ps', $ps, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
 foreach ($results as $result) {
 $_SESSION['stdid']=$result->id;
 $_SESSION['login']=$_POST['un'];
 $_SESSION['email']=$result->email;
 $_SESSION['name']=$result->name;
 $_SESSION['display_name']=$result->display_name;
 $_SESSION['role']=$result->role;
echo "<script type='text/javascript'> document.location ='index.php'; </script>";
}
}
else{
echo "<script>alert('Invalid Details');</script>";
}
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
  <div class="main-content">
    <div class="container h-100vh d-flex align-items-center">
      <div class="col">
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-5 col-xl-4">
            <div>
              <div class="mb-5 text-center">
                <h6 class="h3">Login</h6>
                <p class="text-muted mb-0">Sign in to your account to continue.</p>
              </div>
              <span class="clearfix"></span>
              <form method="POST" role="form">
                <div class="form-group">
                  <label class="form-control-label">Email address</label>
                  <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" name="un" placeholder="name@example.com">
                  </div>
                </div>
                <div class="form-group mb-4">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <label class="form-control-label">Password</label>
                    </div>
                  </div>
                  <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control" name="ps" placeholder="Password">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="fas fa-eye"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="mt-4">
                  <button type="submit" name="login" class="btn btn-block btn-primary">Sign in</button></div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
  <script src="assets/js/purpose.core.js"></script>
  <!-- Purpose JS -->
  <script src="assets/js/purpose.js"></script>
  <!-- Demo JS - remove it when starting your project -->
  <script src="assets/js/demo.js"></script>
</body>

</html>