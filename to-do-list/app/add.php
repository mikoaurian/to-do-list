<?php

if (isset($_POST['title'])) {
    require '../db_con.php';

    $title = $_POST['title'];

    if (empty($title)) {
        header("Location: ../index.php?mess=error");
    } else {
        $stmt = $con->prepare("INSERT INTO todos(title) VALUE(?)");
        $res = $stmt->execute([$title]);

        if ($res) {
            header("Location: ../index.php?mess=success");
        } else {
            header("Location: ../index.php");
        }
        $con = null;
        exit();
    }
} else {
    header("Location: ../index.php?mess=error");
}
