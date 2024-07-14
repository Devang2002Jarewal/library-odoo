<?php
session_start();

include('../pages/db.php');
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $password = md5($_POST['password']); // Example: Using MD5 for hashing (not recommended for production, use bcrypt or similar)

    // Prepare SQL query to insert data
    $query = "INSERT INTO user (name, email, mobile, gender, password, type, role_id) 
              VALUES ('$user_name', '$email', '$mobile', '$gender', '$password', 'user', 3)"; // Assuming 'user_type' = 3 for 'User'

    if (mysqli_query($conn, $query)) {
        // Redirect to a success page or display success message
        header('Location: ../manage_user.php');
        exit();
    } else {
        // Display an error message if query fails
        header('Location: ../manage_user.php');
    }
}

// Close connection
mysqli_close($conn);
?>
