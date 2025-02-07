<?php
// Include the connection file
require 'db/connection.php'; // Adjust the path if needed

echo "Connected successfully to the database!<br>";

// Example query to test the connection and fetch data from the `users` table
$sql = "SELECT id, name FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Name</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}

// Optionally, you can include a footer or a navigation link here
echo "<br><a href='index.php'>Back to Home</a>";

?>
