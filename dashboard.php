<?php
session_start();
include("includes/login_header.php");
include_once('conn/conn.php');

$email = $_SESSION['login_email'];

$query = "SELECT * FROM Request WHERE userEmail = '$email'";

$result = mysqli_query($conn, $query);

?>
<div class="container">
    <div class="row">
    <h5 class="center-align">Your Consultations</h5>
        <table>
            <tr>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Description</th>
            </tr>
            <?php

                while($rows = mysqli_fetch_object($result)){

                    echo "<tr>";
                    echo "<td>$rows->address</td>";
                    echo "<td>$rows->phone_number</td>";
                    echo "<td>$rows->description</td>";
                    echo "<td><a href='http://localhost:8080/consult/edit.php?id=$rows->requestID'><i class='material-icons'>mode_edit</i></a></td>";
                    echo "<td><a href='http://localhost:8080/consult/delete.php?id=$rows->requestID'><i class='material-icons'>delete</i></a></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</div>