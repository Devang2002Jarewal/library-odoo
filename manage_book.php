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
                    <h4 class="card-title">Manage Books</h4>
                    <a class="btn btn-outline-primary float-right" href="add_book.php" role="button">Add Book</a>
                    <div class="table-responsive">
                      <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>ISBN</th>
                            <th>Title</th>
                            <th>Author(s)</th>
                            <th>Publisher</th>
                            <th>Year</th>
                            <th>Genre</th>
                            <th>Quantity</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          // Fetch books from your database
                          $query = "SELECT * FROM book ORDER BY id DESC"; // Adjust as per your database schema
                          $result = mysqli_query($conn, $query);

                          if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                          ?>
                          <tr id="book_<?php echo $row['id']; ?>">
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['isbn']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['author']; ?></td>
                            <td><?php echo $row['publisher']; ?></td>
                            <td><?php echo $row['year']; ?></td>
                            <td><?php echo $row['genre']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                          </tr>
                          <?php
                            }
                          } else {
                            echo "<tr><td colspan='8' class='text-center'>No Data Available</td></tr>";
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