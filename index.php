<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('pages/head.php'); ?>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="images/logo-book.png" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form action="check_login.php" method="post">
                    <div class="form-group my-3">
                        <label class="form-control-label">Email address : &nbsp; <i class="fa fa-user"
                                aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;</label><span class="text-danger" id="email"></span>
                        <input type="email" name="email" class="form-control email" aria-describedby="emailHelp"
                            placeholder="Enter Email Address" required>
                    </div>
                    <div class="form-group my-3">
                        <label class="form-control-label">Password : &nbsp; <i class="fa fa-lock"
                                aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;</label><span class="text-danger" id="password"></span>
                        <input type="password" name="password" class="form-control password" placeholder="Enter Password"
                            required>
                    </div>
                    <hr class="my-3">
                    <center>
                        <button type="submit" class="btn btn-primary btn-lg my-3 button" id="submit">Log In &nbsp; <i
                                class="fa fa-sign-in" aria-hidden="true"></i>
                        </button>
                    </center>
                </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <?php include('pages/end.php'); ?>
</body>

</html>
