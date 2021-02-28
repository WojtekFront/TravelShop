<?php
include_once 'conn.php';
$deleteValue = $_POST['deleteI'];

if (true) {


    $cos = "UPDATE new_order SET active='0' WHERE id=" . $deleteValue . ";";
    mysqli_query($conn, $cos);
    header("Location: ../index.php?signup=delete");
    exit;
} else {
    header("Location: ../index.php?signup=" . $deleteValue . ";");
    exit;
}
