<?php

if (isset($_POST['id'])) {
    require '../db_con.php';

    $id = $_POST['id'];

    if (empty($id)) {
        echo 'error';
    } else {
        $todos = $con->prepare("SELECT id, checked FROM todos WHERE id=?");
        $todos->execute([$id]);

        $todo = $todos->fetch();
        $uId = $todo['id'];
        $checked = $todo['checked'];

        $uChecked = $checked ? 0 : 1;

        $res = $con->query("UPDATE todos SET checked=$uChecked WHERE id=$uId");

        if ($res) {
            echo $checked;
        } else {
            echo "error";
        }
        $con = null;
        exit();
    }
} else {
    header("Location: ../index.php?mess=error");
}
