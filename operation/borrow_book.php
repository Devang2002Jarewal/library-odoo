<?php
session_start();

include('../pages/db.php'); // Ensure this includes your database connection

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $book_id = $_POST['book_id'];
    $borrow_date = $_POST['borrow_date'];
    $due_date = $_POST['due_date'];

    // Example: Assuming user_id is stored in session after login
    $user_id = $_SESSION['user_id'];

    // Prepare SQL query to insert borrow details
    $query = "INSERT INTO borrow_records (user_id, book_id, borrow_date, due_date)
              VALUES ('$user_id', '$book_id', '$borrow_date', '$due_date')";

    if (mysqli_query($conn, $query)) {
        // Redirect to a success page or display success message
        header('Location: ../view_book.php');
        exit();
    } else {
        // Redirect to an error page or display error message
        header('Location: ../view_book.php');
        exit();
    }
}

// Close connection
mysqli_close($conn);
?>
