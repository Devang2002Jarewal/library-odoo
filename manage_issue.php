<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'pages/head.php'; ?>
</head>
<?php
include 'auth.php';
include 'pages/db.php';

// Fetch borrowed books with user details
$query = "SELECT bd.*, u.name AS user_name, u.email, b.title AS book_title
          FROM borrow_records bd
          JOIN user u ON bd.user_id = u.id
          JOIN book b ON bd.book_id = b.id
          ORDER BY bd.borrow_date DESC"; // Adjust query as per your database schema

$result = mysqli_query($conn, $query);
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
                    <h4 class="card-title">Manage Borrows</h4>
                    <div class="table-responsive">
                      <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>E-Mail</th>
                            <th>Book Title</th>
                            <th>Borrow Date</th>
                            <th>Due Date</th>
                            <th>Return Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php while ($row = mysqli_fetch_assoc($result)): ?>
                          <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['user_name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['book_title']; ?></td>
                            <td><?php echo $row['borrow_date']; ?></td>
                            <td><?php echo $row['due_date']; ?></td>
                            <td><?php echo $row['return_date']; ?></td>
                            <td>
                              <?php if ($row['return_date'] === null): ?>
                              <form action="mark_returned.php" method="post">
                                <input type="hidden" name="borrow_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn btn-success btn-sm">Mark as
                                  Returned</button>
                              </form>
                              <?php else: ?>
                              <span class="badge badge-success">Returned</span>
                              <?php endif; ?>
                            </td>
                          </tr>
                          <?php endwhile; ?>
                        </tbody>
                      </table>
                      <?php if (mysqli_num_rows($result) == 0): ?>
                      <div id="message" class="alert alert-danger text-center">No Borrow Records
                        Found</div>
                      <?php endif; ?>
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