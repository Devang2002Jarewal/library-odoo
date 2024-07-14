<?php
include 'pages/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['borrow_id'])) {
    $borrow_id = $_POST['borrow_id'];

    // Update borrow_details table to mark book as returned
    $query = "UPDATE borrow_records SET return_date = NOW() WHERE id = $borrow_id";

    if (mysqli_query($conn, $query)) {
        header('Location: manage_issue.php'); // Redirect to manage_borrows.php after update
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}

mysqli_close($conn);
?>
