<?php
include('db.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars(trim($_POST['name']));
    $price = htmlspecialchars(trim($_POST['price']));

    // Handle the image upload
    $target_dir = "images/"; // Directory to save images
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $uploadOk = 1;

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        echo "<script>alert('File is not an image.');</script>";
        $uploadOk = 0;
    }

    // Check file size (e.g., limit to 5MB)
    if ($_FILES["image"]["size"] > 5000000) {
        echo "<script>alert('Sorry, your file is too large.');</script>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.');</script>";
    } else {
        // Try to upload file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Insert the new menu item into the database with image path
            $sql_insert = "INSERT INTO menu (name, price, image_path) VALUES ('$name', '$price', '$target_file')";

            if (mysqli_query($conn, $sql_insert)) {
                echo "<script>alert('Menu item added successfully!');</script>";
            } else {
                echo "<script>alert('Error adding menu item: " . mysqli_error($conn) . "');</script>";
            }
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Menu</title>

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
            margin-top: 60px;
            margin-left: 80px;
        }
        .form-container {
            max-width: 600px;
            margin: auto;
            margin-top: 30px;
            margin-right: 390px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
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
            margin-left: 20px; /
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

    <h1>Add Menu Item</h1>
    <div class="form-container">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Menu Item Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Menu Item</button>
        </form>
    </div>
</body>
</html>
