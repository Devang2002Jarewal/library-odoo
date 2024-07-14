<?php
session_start();

if(!isset($_SESSION['user_email'])){?>
<script>
    $(document).ready(function () {
        window.location = 'index.php?error=Access Denied !';
    });
</script>
<?php }
include('pages/db.php');
// Fetch user details from database
$user_email = $_SESSION['user_email'];

// Query to fetch user details including user type
$query = "SELECT * FROM user WHERE email = '$user_email'";
$result = mysqli_query($conn, $query);

if ($result) {
    $user_data = mysqli_fetch_assoc($result); // Fetch user data as associative array

    // Retrieve user type from fetched data
    $user_type = $user_data['type'];
    $user_name = $user_data['name'];
}
    // Function to generate welcome message based on user type
    function generateWelcomeMessage($user_type, $user_name) {
        switch ($user_type) {
            case 'admin':
                return "<h3 class='font-weight-bold'>Welcome Admin = $user_name</h3>";
                break;
            case 'librarian':
                return "<h3 class='font-weight-bold'>Welcome Librarian = $user_name</h3>";
                break;
            case 'user':
                return "<h3 class='font-weight-bold'>Welcome User = $user_name</h3>";
                break;
            default:
                return "<h3 class='font-weight-bold'>Welcome $user_name</h3>";
        }
    }
?>