<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage FAQs</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    padding: 20px;
}

h1 {
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #4CAF50;
    color: white;
}

button {
    padding: 5px 10px;
    margin: 0 5px;
    cursor: pointer;
}

button.approveBtn {
    background-color: #4CAF50;
    color: white;
}

button.deleteBtn {
    background-color: #f44336;
    color: white;
}

input.answer-input {
    width: 100%;
    padding: 5px;
    box-sizing: border-box;
}

    </style>
    <link rel="icon" href="Images\logo.png" type="image/png">
</head>
<body>
<button onclick="window.location.href='Dashboard.php'" style="width: fit-content;">Go back to Dashboard</button>
    <?php include 'connection.php'; ?>

    <h1>Admin - Manage FAQs</h1>
    <table>
        <thead>
            <tr>
                <th>Sl. No</th>
                <th>Question</th>
                <th>Answer</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM faq WHERE `status`='NA' and approval!='not-approved'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr data-id='{$row['sl.no']}'>
                            <td>{$row['sl.no']}</td>
                            <td>{$row['question']}</td>
                            <td><input type='text' class='answer-input' value='{$row['answer']}'></td>
                            <td>
                                <button class='approveBtn'>Approve</button>
                                <button class='deleteBtn'>Delete</button>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No pending questions</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>

    <script >
        document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.approveBtn').forEach(button => {
        button.addEventListener('click', event => {
            const row = event.target.closest('tr');
            const sl_no = row.dataset.id;
            const answer = row.querySelector('.answer-input').value;

            fetch('approve_faq.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({ sl_no, answer })
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
                location.reload();
            });
        });
    });

    document.querySelectorAll('.deleteBtn').forEach(button => {
        button.addEventListener('click', event => {
            const row = event.target.closest('tr');
            const sl_no = row.dataset.id;

            if (confirm('Are you sure you want to delete this question?')) {
                fetch('delete_faq.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({ sl_no })
                })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    location.reload();
                });
            }
        });
    });
});

    </script>
</body>
</html>
