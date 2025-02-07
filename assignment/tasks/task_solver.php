<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Solver</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; background-color: #f8f9fa; margin: 0; padding: 0; }
        nav { background-color: #343a40; padding: 1rem; }
        nav a { color: white; margin: 0 15px; text-decoration: none; }
        nav a:hover { text-decoration: underline; }
        h1 { color: #333; }
        p { color: #555; }
        footer { margin-top: 20px; font-size: 14px; color: #777; }
        form { margin-top: 20px; display: inline; }
        .task-solver h2 {
    font-size: 24px;
    margin-bottom: 20px;
}

.task-solver .task {
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #fff;
    max-width: 600px;
}

.task button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

.task {
    margin: 20px auto;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #fff;
    width: 90%;
    max-width: 800px;
    text-align: center;
}

pre {
    background-color: #f4f4f4;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    text-align: left;
}
    </style>
</head>
<body>
    <nav>
        <a href="../index.php">Home</a>
        <a href="../db_test.php">Database</a>
        <a href="task_solver.php">Task Solver</a>
    </nav>
    <div class="task-solver">
        <h2>Task Solver</h2>
        <div class="task" id="task1">
            <h3>Task 1</h3>
            <h5>Find names of instructors in Biology</h5>
            <button onclick="runTask(1)">Run Query</button>
            <div id="task1-result"></div>
        </div>
        <div class="task" id="task2">
            <h3>Task 2</h3>
            <h5>Find Computer Science courses with 3 credits</h5>
            <button onclick="runTask(2)">Run Query</button>
            <div id="task2-result"></div>
        </div>
        <div class="task" id="task3">
            <h3>Task 3</h3>
            <h5>Show all course_id and title of courses taken by student with ID 12345</h5>
            <button onclick="runTask(3)">Run Query</button>
            <div id="task3-result"></div>
        </div>
        <div class="task" id="task4">
            <h3>Task 4</h3>
            <h5>Show total number of credits for courses taken by the student with ID 12345</h5>
            <button onclick="runTask(4)">Run Query</button>
            <div id="task4-result"></div>
        </div>
        <div class="task" id="task5">
            <h3>Task 5</h3>
            <h5>Show total credits for each student</h5>
            <button onclick="runTask(5)">Run Query</button>
            <div id="task5-result"></div>
        </div>
    </div>
    <script>
        function runTask(taskId) {
            const resultDiv = document.getElementById(`task${taskId}-result`);
            resultDiv.innerHTML = 'Loading...';

            fetch(`task${taskId}.php`)
                .then(response => response.text())
                .then(data => {
                    resultDiv.innerHTML = `<pre>${data}</pre>`;
                })
                .catch(error => {
                    resultDiv.innerHTML = 'Error: ' + error;
                });
        }
    </script>
</body>
</html>
