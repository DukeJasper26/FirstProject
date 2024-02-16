<?php
session_start();

if (!isset($_SESSION['computers'])) {
    // Initialize the computer array if it's not set
    $_SESSION['computers'] = [];
}

// Function to add a computer to the system
function addComputer($name, $type, $status) {
    $computer = [
        'name' => $name,
        'type' => $type,
        'status' => $status,
    ];

    $_SESSION['computers'][] = $computer;
}

// Check if the form is submitted to add a computer
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $status = $_POST['status'];

    // Validate input (you can add more validation)
    if (!empty($name) && !empty($type) && !empty($status)) {
        addComputer($name, $type, $status);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Laboratory Inventory System</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            margin: 50px;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #EC5A5A;
            color: white;
        }

        form {
            margin-top: 20px;
        }

        input, select {
            padding: 5px;
        }

        button {
            padding: 5px 10px;
            background-color: #5A73EC;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Computer Laboratory Inventory System</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Equipment: </label>
        <input type="text" name="name" id="name" required>
        <label for="type">Qauntity: </label>
        <input type="text" name="type" id="type" required>
        <label for="status">Laboratory No. </label>
        <select name="status" id="status" required>
            <option value="Laboratory 1">Laboratory 1</option>
            <option value="Laboratory 2">Laboratory 2</option>
            <option value="Laboratory 3">Laboratory 3</option>
            <option value="Laboratory 4">Laboratory 4</option>
            <option value="Laboratory 5">Laboratory 5</option>
            <option value="Laboratory 6">Laboratory 6</option>
        </select>
        <button type="submit" name="submit">Submit</button>
    </form>

    <table>
        <tr>
            <th>Equipment</th>
            <th>Quantity</th>
            <th>Laboratory No.</th>
        </tr>
        <?php foreach ($_SESSION['computers'] as $computer) : ?>
            <tr>
                <td><?php echo $computer['name']; ?></td>
                <td><?php echo $computer['type']; ?></td>
                <td><?php echo $computer['status']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>