<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO contact_us (name, email, contact, comment) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("ssss", $name, $email, $contact, $comment);
        
        if ($stmt->execute()) {
           header("Location: contact_success.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
