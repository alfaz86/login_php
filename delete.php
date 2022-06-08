<?php
include "connection.php";

$data = isset($_POST) ? $_POST : null;
if ($data != null) {
    $query = mysqli_query(
        $connection, 
        "delete from users where id = '$data[id]'"
    );
}