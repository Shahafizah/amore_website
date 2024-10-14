<?php
include('db.php');

if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']); 
    $sql_delete = "DELETE FROM menu WHERE id = $delete_id";

    if (mysqli_query($conn, $sql_delete)) {
        echo "<script>alert('Menu item deleted successfully!');</script>";
    } else {
        echo "<script>alert('Error deleting menu item: " . mysqli_error($conn) . "');</script>";
    }
}

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
    <title>Delete Menu</title>

    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Include Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Bootstrap JS for collapse functionality -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: linear-gradient(to right, rgb(177, 151, 103), rgb(113, 102, 79));
        }
        h1 {
            text-align: center;
            color: #fff;            
            margin-left: 80px;
        }
        table {
            width: 100%;
            max-width: 1000px;   
            margin: 20px 350px; 
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            border-collapse: collapse;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); 
        }
        th, td {
            padding: 8px; 
            text-align: left;
            color: #333;
            font-size: 14px; 
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        .btn-danger {
            margin-left: 10px;
        }
        
        .sidebar {
            height: 300vh;
            width: 250px;
            position: fixed;
            top: 0px; 
            left: 0;
            background-color: #343a40;
            padding-top: 20px;
            border-right: 1px solid #dee2e6;
        }

        .sidebar .nav-link {
            color: #d3d3d3;
            font-weight: 500;
            margin: 5px 15px;
        }

        .sidebar .nav-link:hover {
            background-color: #495057;
            color: white;
            border-radius: 5px;
        }

        .sidebar .text-center h4 {
            color: #adb5bd;
            margin-top: 10px;
        }

        .sidebar h5 {
            color: #adb5bd;
            margin-left: 30px;
            font-weight: 900;
            margin-top: 35px; 
            margin-bottom: 5px; 
        }
        .collapse .nav-link {
            font-size: 14px;
            color: #d3d3d3;
        }

        .collapse .nav-link:hover {
            color: white;
        }
        .ms-4 {
            margin-left: 20px; 
        }
    </style>
</head>
<body>

     <!-- Sidebar -->
     <div class="sidebar">
        <div class="text-center mb-4">
            <img src="images/admin_icon.jpg" alt="Admin Profile" class="img-thumbnail rounded-circle" style="width: 100px; height: 100px;">
            <h4>Admin Panel</h4>
        </div>
        <h5>HOME</h5>
        <a href="admin_dashboard.html" class="nav-link"><i class="bi bi-house-door"></i> Dashboard</a>

        <!-- LOG Menu -->
        <h5>LOG</h5>
        <a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#menuCollapse" aria-expanded="false" aria-controls="menuCollapse">
            <i class="bi bi-list"></i> Menu <i class="bi bi-chevron-right"></i>
        </a>
        <!-- Collapsible submenu -->
        <div class="collapse" id="menuCollapse">
            <a href="all_menu.php" class="nav-link ms-4">All Menu</a>
            <a href="add_menu.php" class="nav-link ms-4">Add Menu</a>
            <a href="delete_menu.php" class="nav-link ms-4">Delete Menu</a>
            <a href="update_menu.php" class="nav-link ms-4">Update Menu</a>
        </div>

        <a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#userCollapse" aria-expanded="false" aria-controls="userCollapse">
            <i class="bi bi-people"></i> Users <i class="bi bi-chevron-right"></i>
        </a>
        <div class="collapse" id="userCollapse">
            <a href="#" class="nav-link ms-4">All Users</a>
            <a href="#" class="nav-link ms-4">Delete User</a>
        </div>

        <a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#orderCollapse" aria-expanded="false" aria-controls="orderCollapse">
            <i class="bi bi-cart"></i> Orders <i class="bi bi-chevron-right"></i>
        </a>
        <div class="collapse" id="orderCollapse">
            <a href="#" class="nav-link ms-4">All Orders</a>
            <a href="#" class="nav-link ms-4">Delete Order</a>
        </div>
        
        <a href="location.html" class="nav-link"><i class="bi bi-building"></i> Restaurant</a>

        <!-- Logout link with margin -->
        <a href="logout.html" class="nav-link mt-5" style="color: rgb(198, 49, 49);"><i class="bi bi-box-arrow-right"></i> <strong>Logout</strong></a>
    </div>

    <h1>Delete Menu</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['price']); ?></td>
                <td>
                    <a href="delete_menu.php?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
