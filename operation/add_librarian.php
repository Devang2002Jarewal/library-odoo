<?php
session_start();

include('../pages/db.php'); // Ensure this includes your database connection

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $librarian_name = $_POST['librarian_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $password = md5($_POST['password']); // Example: Using MD5 for hashing (not recommended for production, use bcrypt or similar)

    // Prepare SQL query to insert data
    $query = "INSERT INTO user (name, email, mobile, gender, password, type, role_id) 
              VALUES ('$librarian_name', '$email', '$mobile', '$gender', '$password', 'librarian', 2)"; // Assuming 'type' = 'librarian'

    if (mysqli_query($conn, $query)) {
        // Redirect to a success page or display success message
        header('Location: ../manage_librarian.php');
        exit();
    } else {
        // Display an error message if query fails
        header('Location: ../manage_librarian.php');
        exit();
    }
}

// Close connection
mysqli_close($conn);
?>
