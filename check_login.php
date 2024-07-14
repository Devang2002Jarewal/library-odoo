<?php
session_start();

include('pages/db.php');

// Sanitize input
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$enc_password = md5($password); // Note: MD5 is not secure, consider using stronger hashing methods

// Query to check if the user exists
$query = "SELECT * FROM user WHERE email = '$email' AND password = '$enc_password'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    // User found, set session variables
    $_SESSION['user_email'] = $email;

    $user = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role_id'] = $user['role_id'];

    // Fetch permissions
    $role_id = $user['role_id'];
    $permissions_query = "SELECT p.name FROM permissions p
    JOIN role_permissions rp ON rp.permission_id = p.id
    WHERE rp.role_id = $role_id";
    $permissions_result = mysqli_query($conn, $permissions_query);
    $permissions = [];
    while ($row = mysqli_fetch_assoc($permissions_result)) {
    $permissions[] = $row['name'];
    }
    $_SESSION['permissions'] = $permissions;

    // Redirect to a dashboard or home page
    header('Location: dashboard.php?success=' . $email . ' Login Successfully');
} else {
    // User not found or incorrect credentials
    header('Location: index.php?alert=Invalid credentials');
}

// Close connection
$conn->close();
?>