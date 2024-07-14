<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'pages/head.php'; ?>
</head>

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
                                        <h4 class="card-title">Add Book</h4>
                                        <!-- Book Addition Form -->
                                        <form class="forms-sample" action="operation/add_book.php" method="post">
                                            <!-- ISBN -->
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">ISBN</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="isbn" value="" class="form-control"
                                                        placeholder="Enter ISBN" required>
                                                </div>
                                            </div>

                                            <!-- Title -->
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Title</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="title" value="" class="form-control"
                                                        placeholder="Enter Title">
                                                </div>
                                            </div>

                                            <!-- Author -->
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Author</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="author" value="" class="form-control"
                                                        placeholder="Enter Author">
                                                </div>
                                            </div>

                                            <!-- Publisher -->
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Publisher</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="publisher" value="" class="form-control"
                                                        placeholder="Enter Publisher">
                                                </div>
                                            </div>

                                            <!-- Published Year -->
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Year</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="year" value="" class="form-control"
                                                        placeholder="Enter Year">
                                                </div>
                                            </div>

                                            <!-- Genre -->
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Genre</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="genre" value="" class="form-control"
                                                        placeholder="Enter Genre">
                                                </div>
                                            </div>

                                            <!-- Quantity -->
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Quantity</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="quantity" value="1" class="form-control"
                                                        placeholder="Enter Quantity">
                                                </div>
                                            </div>

                                            <!-- Buttons for manual entry and API fetch -->
                                            <div class="form-group row">
                                                <div class="col-sm-9 offset-sm-3">
                                                    <button type="submit" name="manual_entry"
                                                        class="btn btn-primary mr-2">Add Book (Manual Entry)</button>
                                                    <button type="submit" name="fetch_from_api"
                                                        class="btn btn-success">Fetch Book Details from API</button>
                                                </div>
                                            </div>
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
