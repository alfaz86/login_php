<?php
include "connection.php";

$data = isset($_POST) ? $_POST : null;
if ($data != null) {
    $query = mysqli_query(
        $connection, 
        "insert into users set
        username    = '$data[username]',
        password    = '$data[password]'"
    );
}