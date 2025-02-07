<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'test_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data
$sql = "SELECT id, name FROM users";
$result = $conn->query($sql);

$databaseMessage = "";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $databaseMessage .= "<p>
            Hi, my name is <strong>" . $row['name'] . "</strong> 
            <form action='delete.php' method='post' style='display:inline;'>
                <input type='hidden' name='id' value='" . $row['id'] . "'>
                <button type='submit' style='background-color: red; color: white; border: none; padding: 5px 10px; cursor: pointer;'>Delete</button>
            </form>
        </p>";
    }
} else {
    $databaseMessage = "<p>No data found in the database.</p>";
}

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; background-color: #f8f9fa; margin: 0; padding: 0; }
        nav { background-color: #343a40; padding: 1rem; }
        nav a { color: white; margin: 0 15px; text-decoration: none; }
        nav a:hover { text-decoration: underline; }
        h1 { color: #333; }
        p { color: #555; }
        footer { margin-top: 20px; font-size: 14px; color: #777; }
        form { margin-top: 20px; display: inline; }
    </style>
</head>
<body>
    <nav>
        <a href="index.php">Home</a>
        <a href="db_test.php">Database</a>
        <a href="/assignment/tasks/task_solver.php">Task Solver</a>
    </nav>
    <h1>IKT453-G 25V Intelligent Data Management</h1>
    <h2>Group: The Primary Keys</h2>
    <!-- Dynamic content from database -->
    <?php echo $databaseMessage; ?>
    <!-- Form to Add New Users -->
    <form action="insert.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <input type="submit" value="Add User">
    </form>
    <footer>© 2025 My Website. All rights reserved.</footer>
</body>
</html>
