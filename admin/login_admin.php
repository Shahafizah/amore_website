<?php 

session_start();

include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['admin'];
    $password = $_POST['123'];

    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['admin_logged_in'] = true;
ard
        header("Location: admin_dashboard.html");
        exit;
    } else {
        $error = "Username atau Password tidak sah!";
    }
}
?>
