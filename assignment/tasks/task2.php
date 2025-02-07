<?php
require '../db/connection.php'; // Adjust this path if necessary

// SQL Query
$query = "SELECT title FROM course WHERE dept_name = 'Computer Science' AND credits = 3";

// Execute Query
$result = $conn->query($query);

// Display Results
echo "<div style='text-align: center;'>";
echo "<h3>SQL Query:</h3>";
echo "<pre style='background-color: #f4f4f4; padding: 10px; border-radius: 5px; border: 1px solid #ccc;'>$query</pre>";

if ($result->num_rows > 0) {
    echo "<table border='1' style='margin: auto;'><tr><th>Title</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["title"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p>No results found.</p>";
}

// Close the connection
//$conn->close();
?>
