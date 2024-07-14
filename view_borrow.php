<?php
session_start();
include('pages/db.php');

// Assuming user_id is stored in session after login
$user_id = $_SESSION['user_id'];

// Fetch borrowed books query
$query = "SELECT b.*, bd.borrow_date, bd.due_date, bd.return_date
          FROM book b
          JOIN borrow_records bd ON b.id = bd.book_id
          WHERE bd.user_id = $user_id
          ORDER BY id desc";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'pages/head.php'; ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php include 'pages/navbar.php'; ?>
        <!-- partial -->
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
                                    <h4 class="card-title">Your Borrowed Books</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ISBN</th>
                                                    <th>Title</th>
                                                    <th>Author</th>
                                                    <th>Publisher</th>
                                                    <th>Year</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                                <tr>
                                                    <td><?php echo $row['isbn']; ?></td>
                                                    <td><?php echo $row['title']; ?></td>
                                                    <td><?php echo $row['author']; ?></td>
                                                    <td><?php echo $row['publisher']; ?></td>
                                                    <td><?php echo $row['year']; ?></td>
                                                    <td>
                                                        <?php if ($row['return_date'] == null): ?>
                                                        <span class="badge badge-warning">Borrowed</span>
                                                        <?php else: ?>
                                                        <span class="badge badge-success">Returned</span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
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

<?php
mysqli_close($conn);
?>