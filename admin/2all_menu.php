<?php
include('db.php');

$sql = "SELECT * FROM menu";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: linear-gradient(to right, rgb(177, 151, 103), rgb(113, 102, 79));
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            color: #fff;
        }

        .table-container {
            max-width: 1000px;
            width: 100%;
            padding: 20px;
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            margin-left: auto;
            margin-right: auto;
            background-color: #fff; /* Set table background to white */
            border-radius: 10px;
            overflow: hidden;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
            color: #333; /* Set text color to dark for readability on white */
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <div class="table-container">
        <h1>All Menu</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['price']); ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
