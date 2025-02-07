<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'test_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$name = $_POST['name'];

// Insert the data into the database
$sql = "INSERT INTO users (name) VALUES ('$name')";

if ($conn->query($sql) === TRUE) {
    echo "New user added successfully!";
    echo "<br><a href='/assignment/index.php'>Go back to Home</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
