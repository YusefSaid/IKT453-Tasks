<?php
require '../db/connection.php'; // Adjust the path if needed

// Start tracking execution time
$startTime = microtime(true);

// Define the query
$query = "SELECT name FROM instructor WHERE dept_name = 'Biology'";

// Display the SQL query
echo "<div style='text-align: center;'>";
echo "<h3>SQL Query:</h3>";
echo "<pre style='background-color: #f4f4f4; padding: 10px; border-radius: 5px; border: 1px solid #ccc;'>$query</pre>";

// Execute the query
$result = $conn->query($query);

// Calculate execution time
$executionTime = microtime(true) - $startTime;

// Display results
echo "<h3>Results:</h3>";
if ($result->num_rows > 0) {
    echo "<table style='border-collapse: collapse; margin: 0 auto;'>
            <tr style='background-color: #f2f2f2;'>
                <th style='border: 1px solid #ddd; padding: 8px;'>Name</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td style='border: 1px solid #ddd; padding: 8px;'>" . $row['name'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}

// Display query execution time
echo "<p>Query Execution Time: " . number_format($executionTime, 5) . " seconds</p>";
?>
