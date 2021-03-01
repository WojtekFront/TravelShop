<?php
include_once 'conn.php';

if (isset($_POST['usun']) && is_numeric($_POST['deleteI'])) {
    $deleteValue = $_POST['deleteI'];

    $cos = "UPDATE new_order SET active='0' WHERE id=" . $deleteValue . ";";
    mysqli_query($conn, $cos);
    header("Location: ../index.php?signup=delete");
    exit;
} else {
    header("Location: ../index.php?signup=" . $deleteValue . ";");
    exit;
}
