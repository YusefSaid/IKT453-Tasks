<?php
require '../db_test.php';
$student_id = 12345;

// Clear any prior output
ob_clean();

// SQL Query
$query = "
    SELECT course.course_id, course.title
    FROM takes
    INNER JOIN course ON takes.course_id = course.course_id
    WHERE takes.ID = $student_id
";

// Execute the query
$start_time = microtime(true); // Start measuring query time
$result = $conn->query($query);
$execution_time = microtime(true) - $start_time; // Calculate query execution time

// Output SQL query
echo "<div style='text-align: center;'>";
echo "<h3>SQL Query:</h3>";
echo "<pre style='background-color: #f4f4f4; padding: 10px; border-radius: 5px; border: 1px solid #ccc;'>$query</pre>";

// Display results
echo "<div><strong>Results:</strong></div>";
if ($result && $result->num_rows > 0) {
    echo "<table border='1' style='margin: 0 auto;'><tr><th>Course ID</th><th>Title</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . htmlspecialchars($row['course_id']) . "</td><td>" . htmlspecialchars($row['title']) . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No courses found for student ID $student_id.";
}

// Show query execution time
echo "<div>Query Execution Time: " . number_format($execution_time, 5) . " seconds</div>";

$conn->close();
?>
