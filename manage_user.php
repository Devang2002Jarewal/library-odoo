<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'pages/head.php'; ?>
</head>
<?php
include 'auth.php';
include 'pages/db.php';
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
                    <h4 class="card-title">Manage Users</h4>
                    <a class="btn btn-outline-primary float-right" href="add_user.php" role="button">Add User</a>
                    <div class="table-responsive">
                      <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>E-Mail</th>
                            <th>Mob No.</th>
                            <th>Gender</th>
                            <th>Create at</th>
                          </tr>
                        </thead>
                        <?php
                        // Fetch users where user_type is 'user' (assuming 'user_type' = 3)
                        $query = "SELECT * FROM user WHERE type = 'user' order by id desc"; // Adjust 'user_type' value as per your database schema
                        $result = mysqli_query($conn, $query);
                        $fetch = mysqli_fetch_all($result, MYSQLI_ASSOC);
                          if(empty($fetch)){
                            echo "<div id='message' class='alert alert-danger text-center'>No Data are there </div> ";
                          }else{
                            foreach($fetch as $row){
                              // $handle->formate($row);
                          ?>
                        <tbody>
                          <tr id="reg_<?php echo $row['id']; ?>">
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['mobile']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                          </tr>
                        </tbody>
                        <?php
                            }
                          }
                        ?>
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