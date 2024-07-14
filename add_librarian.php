<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'pages/head.php'; ?>
</head>
<?php
include 'auth.php';
include 'pages/db.php'; // Ensure this includes your database connection
?>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include 'pages/navbar.php'; ?>
    <!-- partial -->
    <div id="pagination">
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include 'pages/sidebar.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Librarian</h4>
                    <form class="forms-sample" action="operation/add_librarian.php" method="post">
                      <!-- Librarian Name -->
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Librarian Name</label>
                        <div class="col-sm-9">
                          <input type="text" name="librarian_name" value="" class="form-control"
                            placeholder="Enter Librarian Name">
                        </div>
                      </div>

                      <!-- Email -->
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <input type="email" name="email" value="" class="form-control" placeholder="Enter Email">
                        </div>
                      </div>

                      <!-- Mobile -->
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Mobile</label>
                        <div class="col-sm-9">
                          <input type="text" name="mobile" value="" class="form-control" placeholder="Enter Mobile">
                        </div>
                      </div>

                      <!-- Type (Librarian) - Read-only -->
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Type (Librarian)</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value="Librarian" readonly>
                        </div>
                      </div>

                      <!-- Gender -->
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Gender</label>
                        <div class="col-sm-9">
                          <select name="gender" class="form-control">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                          </select>
                        </div>
                      </div>

                      <!-- Password -->
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                          <input type="password" name="password" value="" class="form-control"
                            placeholder="Enter Password">
                        </div>
                      </div>

                      <!-- Role (Librarian) - Read-only -->
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Role (Librarian)</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value="Librarian" readonly>
                        </div>
                      </div>
                      <button type="submit" name="Add Librarian" class="btn btn-primary mr-2">Add Librarian</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- main-panel ends -->
      </div>
    </div>
    <!-- page-body-wrapper ends -->
  </div>
</body>

</html>
