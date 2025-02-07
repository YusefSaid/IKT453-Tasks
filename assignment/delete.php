<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'test_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the ID of the user to delete
$id = $_POST['id'];

// Delete the user
$sql = "DELETE FROM users WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "User deleted successfully!";
    echo "<br><a href='index.php'>Go back to Home</a>";
} else {
    echo "Error deleting user: " . $conn->error;
}

// Close connection
$conn->close();
?>
