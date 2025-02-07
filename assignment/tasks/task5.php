<?php
require '../db_test.php'; // Ensure the correct path to db_test.php

// Start execution time tracking
$start_time = microtime(true);

ob_clean();
$query = "
SELECT takes.ID, SUM(course.credits) AS total_credits
FROM takes
INNER JOIN course ON takes.course_id = course.course_id
GROUP BY takes.ID
";

$result = $conn->query($query);

$end_time = microtime(true);
$execution_time = $end_time - $start_time;


echo "<div style='text-align: center;'>";
echo "<h3>SQL Query:</h3>";
echo "<pre style='background-color: #f4f4f4; padding: 10px; border-radius: 5px; border: 1px solid #ccc;'>$query</pre>";

if ($result->num_rows > 0) {
  echo "<table>";
  echo "<thead><tr><th>Student ID</th><th>Total Credits</th></tr></thead>";
  echo "<tbody>";
  while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . htmlspecialchars($row['ID']) . "</td>";
      echo "<td>" . htmlspecialchars($row['total_credits']) . "</td>";
      echo "</tr>";
  }
  echo "</tbody></table>";
} else {
  echo "<p>No results found.</p>";
}


echo "<p>Query Execution Time: " . number_format($execution_time, 5) . " seconds</p>";
echo "</div>";

$conn->close();
?>
