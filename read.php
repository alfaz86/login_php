<?php
include "connection.php";

$no     = 1;
$query  = mysqli_query($connection, "select * from users");

$elements   = "";
if (mysqli_num_rows($query) > 0) {
    while($row  = mysqli_fetch_array($query)){
        $elements .= "
            <tr data-user=".json_encode($row)." data-id=".json_encode($row["id"])." onclick='setdata(this, ".json_encode($row).")'>
                <td>".$no++."</td>
                <td>".$row["username"]."</td>
                <td>".$row["password"]."</td>
            </tr>
        ";
    }
} else {
    $elements .= "
            <tr>
                <td colspan='3' class='text-center'>data kosong.</td>
            </tr>
        ";
}

echo $elements;