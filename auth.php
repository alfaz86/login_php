<?php
session_start();
include "connection.php";

$data = isset($_POST) ? $_POST : null;
if ($data != null) {
    $query = mysqli_query(
        $connection, 
        "select * from users 
        where
        username    = '$data[username]'
        and
        password    = '$data[password]'"
    );

    if (mysqli_num_rows($query) > 0) {
        $_SESSION['username']   = $data['username'];
        $_SESSION['status']     = "login";
        
        echo "success";
    } else {
        echo "failed";
    }
}

if ($data == null) {
    session_unset();
    session_destroy();
}