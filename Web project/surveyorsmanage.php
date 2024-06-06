<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surveyor Management</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 0;
    padding: 20px;
}

h1 {
    margin: auto;
    margin-bottom: 20px;
}

form {
    width: 50%;
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-bottom: 20px;
}

form input, form button {
    padding: 10px;
    font-size: 16px;
}

table {
    width: 100%;
    max-width: 600px;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table, th, td {
    border: 1px solid #ccc;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #3a69b4;
    color: white;
}

td button {
    padding: 5px 10px;
    margin: 0 5px;
    cursor: pointer;
}

td button.editBtn {
    background-color: #4CAF50;
    color: white;
}

td button.deleteBtn {
    background-color: #f44336;
    color: white;
}

    </style>
    <link rel="icon" href="Images\logo.png" type="image/png">
</head>
<body>
    <?php include 'connection.php'; ?>
    <button onclick="window.location.href='Dashboard.php'">Go to Dashboard</button>

    <h1>Surveyor Management</h1>
    <form id="surveyorForm" method="POST" action="manage_surveyors.php">
        <input type="hidden" id="sl_no" name="sl_no">
        <input type="text" id="servName" name="servName" placeholder="Service Name" required>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <input type="text" id="phone" name="phone" placeholder="Phone Number" required>
        <button type="submit" id="submitButton">Add</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Sl. No</th>
                <th>Service Name</th>
                <th>Password</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM surveior";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr data-id='{$row['sl.no']}'>
                            <td>{$row['sl.no']}</td>
                            <td>{$row['ServName']}</td>
                            <td>{$row['Password']}</td>
                            <td>{$row['phone']}</td>
                            <td>
                                <button class='editBtn'>Edit</button>
                                <button class='deleteBtn'>Delete</button>
                            </td>
                          </tr>";
                }
            }
            ?>
        </tbody>
    </table>

    <script >
        document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('surveyorForm');
    const submitButton = document.getElementById('submitButton');
    const slNoField = document.getElementById('sl_no');
    const servNameField = document.getElementById('servName');
    const passwordField = document.getElementById('password');
    const phoneField = document.getElementById('phone');

    document.querySelectorAll('.editBtn').forEach(button => {
        button.addEventListener('click', event => {
            const row = event.target.closest('tr');
            const sl_no = row.dataset.id;
            const servName = row.children[1].textContent;
            const password = row.children[2].textContent;
            const phone = row.children[3].textContent;

            slNoField.value = sl_no;
            servNameField.value = servName;
            passwordField.value = password;
            phoneField.value = phone;
            submitButton.textContent = 'Update';
        });
    });

    document.querySelectorAll('.deleteBtn').forEach(button => {
        button.addEventListener('click', event => {
            const row = event.target.closest('tr');
            const sl_no = row.dataset.id;

            if (confirm('Are you sure you want to delete this record?')) {
                fetch('delete_surveyor.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({ sl_no })
                })
                .then(response => response.text())
                .then(data => {
                    location.reload();
                });
            }
        });
    });

    form.addEventListener('reset', () => {
        slNoField.value = '';
        submitButton.textContent = 'Add';
    });
});

    </script>
</body>
</html>
