<?php

$conn = mysqli_connect("localhost", "root", "");

if($conn){

    mysqli_select_db($conn, 'consult');
}
else {

    echo "connection fail";
}

?>