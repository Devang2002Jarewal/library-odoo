<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('pages/head.php'); ?>
</head>

<body>
  <?php
include 'auth.php';
?>


  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include('pages/navbar.php'); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <?php include('pages/sidebar.php'); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <?php $welcome_message = generateWelcomeMessage($user_type, $user_name); ?>
                  <h3 class="font-weight-bold"><?php echo $welcome_message; ?></h3>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021. Premium <a
                href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.
              All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
                class="ti-heart text-danger ml-1"></i></span>
          </div>
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a
                href="https://www.themewagon.com/" target="_blank">Themewagon</a></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <?php include('pages/end.php'); ?>
</body>

</html>