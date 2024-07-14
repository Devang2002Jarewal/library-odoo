<?php
session_start();

include('../pages/db.php'); // Ensure this includes your database connection

// Initialize variables
$errorMsg = '';

// Function to fetch book details from Google Books API
function fetchBookDetails($isbn, $conn) {
    // Replace with your actual API key
    $api_key = 'AIzaSyCCBG1sUA4PHdqrX1CG1gqJV1IRraAstU0';
    $url = "https://www.googleapis.com/books/v1/volumes?q=isbn:$isbn&key=$api_key";

    // Initialize cURL session
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);

    if ($response === false) {
        echo "cURL Error: " . curl_error($ch);
        curl_close($ch);
        return null;
    }

    curl_close($ch);

    // Decode JSON response
    $data = json_decode($response, true);

    // Check if data is returned and process
    if (isset($data['items'][0])) {
        $book = $data['items'][0]['volumeInfo'];

        // Extract relevant book details
        $isbn = mysqli_real_escape_string($conn, $isbn);
        $title = mysqli_real_escape_string($conn, isset($book['title']) ? $book['title'] : '');
        $author = mysqli_real_escape_string($conn, isset($book['authors']) ? implode(', ', $book['authors']) : '');
        $publisher = mysqli_real_escape_string($conn, isset($book['publisher']) ? $book['publisher'] : '');
        $year = mysqli_real_escape_string($conn, isset($book['publishedDate']) ? date('Y', strtotime($book['publishedDate'])) : null);
        $genre = mysqli_real_escape_string($conn, ''); // Adjust based on your application's genre handling
        $quantity = mysqli_real_escape_string($conn, $_POST['quantity']); // Assuming quantity is set to 1 when fetching from API

        // SQL query to insert book details into database
        $query = "INSERT INTO book (isbn, title, author, publisher, year, genre, quantity)
                  VALUES ('$isbn', '$title', '$author', '$publisher', '$year', '$genre', '$quantity')";

        // Execute query and handle success or failure
        if (mysqli_query($conn, $query)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['manual_entry'])) {
        // Collect manual form data and sanitize inputs
        $isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $author = mysqli_real_escape_string($conn, $_POST['author']);
        $publisher = mysqli_real_escape_string($conn, $_POST['publisher']);
        $year = mysqli_real_escape_string($conn, $_POST['year']);
        $genre = mysqli_real_escape_string($conn, $_POST['genre']);
        $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);

        // SQL query to insert book details into database
        $query = "INSERT INTO books (isbn, title, author, publisher, year, genre, quantity)
                  VALUES ('$isbn', '$title', '$author', '$publisher', '$year', '$genre', '$quantity')";

        // Execute query and handle success or failure
        if (mysqli_query($conn, $query)) {
            header('Location: ../manage_book.php');
            exit();
        } else {
            $errorMsg = "Error: " . mysqli_error($conn);
        }

    } elseif (isset($_POST['fetch_from_api'])) {
        // Fetch book details from API if ISBN is provided
        $isbn = mysqli_real_escape_string($conn, $_POST['isbn']);

        // Call function to fetch book details and insert into database
        if (fetchBookDetails($isbn, $conn)) {
            header('Location: ../manage_book.php');
            exit();
        } else {
            $errorMsg = "Book details not found for ISBN: $isbn.";
        }
    }
}

// Close database connection
mysqli_close($conn);
?>
