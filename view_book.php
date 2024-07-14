<?php
include('pages/db.php');

$filter = '';
$search = '';
$order = '';

// Handle filter, search, and sort
if (isset($_GET['filter'])) {
    $filter = $_GET['filter'];
}
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}
if (isset($_GET['order'])) {
    $order = $_GET['order'];
}

// SQL query to fetch books
$query = "SELECT * FROM book WHERE 1";
if (!empty($filter)) {
    $query .= " AND genre='$filter'";
}
if (!empty($search)) {
    $query .= " AND (title LIKE '%$search%' OR author LIKE '%$search%' OR isbn LIKE '%$search%')";
}
if (!empty($order)) {
    $query .= " ORDER BY $order";
} else {
    $query .= " ORDER BY title";
}

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'pages/head.php'; ?>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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
                                    <h4 class="card-title">Books</h4>
                                    <!-- Filters, Search, and Sort -->
                                    <form method="get" action="view_book.php">
                                        <div class="form-row">
                                            <div class="col">
                                                <input type="text" class="form-control" name="search"
                                                    placeholder="Search by title, author, or ISBN"
                                                    value="<?php echo $search; ?>">
                                            </div>
                                            <div class="col">
                                                <select class="form-control" name="filter">
                                                    <option value="">Filter by genre</option>
                                                    <!-- Add your genres here -->
                                                    <option value="Fiction"
                                                        <?php if ($filter == 'Fiction') echo 'selected'; ?>>Fiction
                                                    </option>
                                                    <option value="Non-Fiction"
                                                        <?php if ($filter == 'Non-Fiction') echo 'selected'; ?>>
                                                        Non-Fiction</option>
                                                    <option value="Science"
                                                        <?php if ($filter == 'Science') echo 'selected'; ?>>Science
                                                    </option>
                                                    <option value="Biography"
                                                        <?php if ($filter == 'Biography') echo 'selected'; ?>>Biography
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <select class="form-control" name="order">
                                                    <option value="">Sort by</option>
                                                    <option value="title"
                                                        <?php if ($order == 'title') echo 'selected'; ?>>Title</option>
                                                    <option value="author"
                                                        <?php if ($order == 'author') echo 'selected'; ?>>Author
                                                    </option>
                                                    <option value="year"
                                                        <?php if ($order == 'year') echo 'selected'; ?>>Year</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <button type="submit" class="btn btn-primary">Apply</button>
                                                <a href="view_book.php" class="btn btn-secondary">Cancel</a>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- Books Table -->
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ISBN</th>
                                                    <th>Title</th>
                                                    <th>Author</th>
                                                    <th>Publisher</th>
                                                    <th>Year</th>
                                                    <th>Action</th>
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
                                                        <button class="btn btn-success borrow-btn" data-toggle="modal"
                                                            data-target="#borrowModal"
                                                            data-id="<?php echo $row['id']; ?>"
                                                            data-title="<?php echo $row['title']; ?>">Borrow</button>
                                                    </td>
                                                    <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Borrow Modal -->
                            <div class="modal fade" id="borrowModal" tabindex="-1" role="dialog"
                                aria-labelledby="borrowModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="borrowModalLabel">Borrow Book</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="operation/borrow_book.php" method="post">
                                                <input type="hidden" name="book_id" id="book_id" value="">
                                                <p id="bookDetails"></p>
                                                <div class="form-group">
                                                    <label for="borrow_date">Borrow Date</label>
                                                    <input type="text" class="form-control" id="borrow_date"
                                                        name="borrow_date" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="due_date">Due Date</label>
                                                    <input type="text" class="form-control" id="due_date"
                                                        name="due_date" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="penalty">Penalty (per day after due date)</label>
                                                    <input type="text" class="form-control" id="penalty" name="penalty"
                                                        value="50 ₹" readonly>
                                                </div>
                                                <button type="submit" class="btn btn-success">Confirm</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Borrow Modal -->
                        </div>
                    </div>
                </div>
                <!-- main-panel ends -->
            </div>
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <script>
        $(document).ready(function () {
            $('.borrow-btn').on('click', function () {
                var bookId = $(this).data('id');
                var bookTitle = $(this).data('title');
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0');
                var yyyy = today.getFullYear();

                var borrowDate = yyyy + '-' + mm + '-' + dd;

                var dueDate = new Date(today);
                dueDate.setDate(dueDate.getDate() + 15);
                var ddDue = String(dueDate.getDate()).padStart(2, '0');
                var mmDue = String(dueDate.getMonth() + 1).padStart(2, '0');
                var yyyyDue = dueDate.getFullYear();

                var formattedDueDate = yyyyDue + '-' + mmDue + '-' + ddDue;

                $('#book_id').val(bookId);
                $('#bookDetails').text('You are borrowing "' + bookTitle + '"');
                $('#borrow_date').val(borrowDate);
                $('#due_date').val(formattedDueDate);
            });
        });
    </script>
</body>

</html>

<?php
mysqli_close($conn);
?>