<?php
$servername = "localhost";
$username = "root";  // Change if needed
$password = "";      // Set password if applicable
$dbname = "wedding_db";

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $guests = $_POST['guests'];
    $diet = $_POST['diet'];

    // Insert into database
    $sql = "INSERT INTO rsvp (name, email, guests, dietary_preferences) 
            VALUES ('$name', '$email', '$guests', '$diet')";

    if ($conn->query($sql) === TRUE) {
        echo "Thank you for your RSVP!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
