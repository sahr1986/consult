<?php
session_start();
include("includes/login_header.php");
include_once("conn/conn.php");

if(isset($_SESSION['login_email'])){

    $login_email = $_SESSION['login_email'];

    if(isset($_GET['id']) && is_numeric($_GET['id'])){

        $id = $_GET['id'];

        $query = "DELETE FROM Request where requestID = '$id' and userEmail = '$login_email'";

        $result = mysqli_query($conn, $query);

        if(mysqli_affected_rows($conn) == 1){

            echo "<h3 class='center-align'>Record Delete Successful</h3>";
        }
        else{

            echo "<h3 class='center-align'>Fail To Delete Record</h3>".mysqli_error();
        }
    }
    else{

        echo "<h3>Invalid ID</h3>";
    }
}

?>