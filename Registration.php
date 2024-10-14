<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];

    if (strlen($password) < 8 || 
        !preg_match("/[A-Z]/", $password) || 
        !preg_match("/[a-z]/", $password) || 
        !preg_match("/[0-9]/", $password) || 
        !preg_match("/[\W_]/", $password)) {
        echo "Password must be at least 8 characters long and include an uppercase letter, a lowercase letter, a number, and a special character.";
    } else {
        $plain_password = $password;

        $stmt = $conn->prepare("INSERT INTO register (user_name, user_email, user_contact, user_password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $contact, $plain_password);

        if ($stmt->execute()) {
            header("Location: registration_success.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>
