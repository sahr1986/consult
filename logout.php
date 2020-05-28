<?php
session_start();

if(isset($_SESSION['login_email'])){

    unset($_SESSION['login_email']);
    
    header('location:http://localhost:8080/consult');
}
else{

    echo "<h3>You are not logged in.</h3>";
}
?>