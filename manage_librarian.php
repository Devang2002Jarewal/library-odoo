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
                    <h4 class="card-title">Manage Librarians</h4>
                    <a class="btn btn-outline-primary float-right" href="add_librarian.php" role="button">Add Librarian</a>
                    <div class="table-responsive">
                      <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>E-Mail</th>
                            <th>Mob No.</th>
                            <th>Gender</th>
                            <th>Created at</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          // Fetch librarians where type is 'librarian' (assuming 'type' = 'librarian')
                          $query = "SELECT * FROM user WHERE type = 'librarian' ORDER BY id DESC"; // Adjust as per your database schema
                          $result = mysqli_query($conn, $query);

                          if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                          ?>
                              <tr id="librarian_<?php echo $row['id']; ?>">
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['mobile']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td><?php echo $row['created_at']; ?></td>
                              </tr>
                          <?php
                            }
                          } else {
                            echo "<tr><td colspan='6' class='text-center'>No Data Available</td></tr>";
                          }
                          ?>
                        </tbody>
                      </table>
                      <div class="row my-2"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <?php include 'pages/end.php'; ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
    </div>
    <!-- page-body-wrapper ends -->
  </div>
</body>

</html>
