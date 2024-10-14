<?php
session_start();
include 'db.php';

function authenticateUser($email, $password) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM register WHERE User_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['User_password'])) {
            $_SESSION['username'] = $row['User_name']; 
            return true;
        }
    }
    return false;
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (authenticateUser($email, $password)) {
        header("Location: homepage.html"); 
        exit();
    } else {
        echo "<script>alert('Login failed!'); window.location.href='Login_form.html';</script>";
    }
}

$conn->close();
?>
