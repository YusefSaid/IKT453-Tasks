<?php
require '../db_test.php';
$start_time = microtime(true);

ob_clean();
$query = "
SELECT SUM(course.credits) AS total_credits
FROM takes
INNER JOIN course ON takes.course_id = course.course_id
WHERE takes.ID = 12345
";

$result = $conn->query($query);

$execution_time = microtime(true) - $start_time;

echo "<div style='text-align: center;'>";
echo "<h3>SQL Query:</h3>";
echo "<pre style='background-color: #f4f4f4; padding: 10px; border-radius: 5px; border: 1px solid #ccc;'>$query</pre>";

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h3>Results:</h3>";
    echo "<p>Total Credits: <strong>" . ($row['total_credits'] ?? 0) . "</strong></p>";
} else {
    echo "<p>No results found.</p>";
}

echo "<p style='margin-top: 10px;'>Query Execution Time: " . number_format($execution_time, 5) . " seconds</p>";
echo "</div>";
?>
