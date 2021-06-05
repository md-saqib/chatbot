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
                <span class="h2 mb-0 text-white d-block">Morning, Heather</span>
                
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
          <form>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="form-control-label">College Name</label>
                  <input class="form-control" type="text" placeholder="Enter College Name">
                </div>
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">College Code</label>
                  <input type="text" class="form-control flatpickr-input" data-toggle="date" placeholder="Enter College Code">
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group focused">
                    <label class="form-control-label">Suburb</label>
                    <select class="form-control select2-hidden-accessible" data-toggle="select" title="Country" data-live-search="true" data-live-search-placeholder="Country" data-select2-id="4" tabindex="-1" aria-hidden="true">
                      <option data-select2-id="6">- Select-</option>
                      <option>Urban</option>
                      <option>Rural</option>
                    </select>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">College Official Email</label>
                  <input class="form-control" type="email" placeholder="name@exmaple.com">
                  <small class="form-text text-muted mt-2">This is the main email address that we'll send notifications to. </small>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">College STD Code</label>
                  <input class="form-control" type="text" placeholder="080">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">College Phone</label>
                  <input class="form-control" type="text" placeholder="+40-777 245 549">
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
                    <input class="form-control" type="text" placeholder="Enter the College address">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label">City</label>
                    <input class="form-control" type="text" placeholder="City">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group focused">
                    <label class="form-control-label">District</label>
                    <select class="form-control select2-hidden-accessible" data-toggle="select" title="Country" data-live-search="true" data-live-search-placeholder="Country" data-select2-id="4" tabindex="-1" aria-hidden="true">
                      <option data-select2-id="6">- Select-</option>
                      <option>Bengaluru</option>
                      <option>Belgavi</option>
                      <option>Kalaburgi</option>
                      <option>Mysuru</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <!-- Save changes buttons -->
            <div class="pt-5 mt-5 delimiter-top text-center">
              <button type="button" class="btn btn-sm btn-primary">Save changes</button>
              <button type="button" class="btn btn-link text-muted">Cancel</button>
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