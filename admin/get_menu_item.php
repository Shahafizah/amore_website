<?php
include('db.php');

if (isset($_GET['id'])) {
    $id = htmlspecialchars(trim($_GET['id']));
    $sql = "SELECT * FROM menu WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $menu_item = mysqli_fetch_assoc($result);

    echo json_encode($menu_item);
}
?>
