<?php
session_start();
include("includes/login_header.php");
include_once('conn/conn.php');
if(isset($_SESSION['login_email'])){

    $email = $_SESSION['login_email'];
}
?>
<div class="container">
    <div class="row">
        <div class="col s12 m8 offset-m2">
            <div class="card-panel">
                <h5 class="center-align">Submit Your Request</h5>
                <?php
                
                include_once("conn/conn.php");

                $address = $phone_number = $description = false;

                if($_SERVER['REQUEST_METHOD'] == "POST"){

                    if(!empty($_POST['address'])){

                        $address = $_POST['address'];
                    }
                    else{

                        echo "<h5>Please input your address</h5>";
                    }
                    if(!empty($_POST['phone_number'])){

                        $phone_number = $_POST['phone_number'];
                    }
                    else{

                        echo "<h5>Please input your phone number</h5>";
                    }
                    if(!empty($_POST['description'])){

                        $description = $_POST['description'];
                    }
                    else{

                        echo "<h5>Please enter a description</h5>";
                    }
                    
                    if($address && $phone_number && $description){

                        $query = "INSERT INTO Request(userEmail,address,phone_number,description) VALUES('$email','$address','$phone_number','$description')";

                        $result = mysqli_query($conn, $query);

                        if(mysqli_affected_rows($conn) == 1){

                            echo "<h5>Request Submitted Successful</h5>";
                        }
                        else{

                            echo "<h5>Request Submission Failed</h5>";
                        }
        
                    }
                }
                
                
                ?>
                <form action="" method="POST">
                    <div class="input-field">
                        <label for="">Address</label>
                        <input type="text" name="address" required>
                    </div>
                    <div class="input-field">
                        <label for="">Phone Number</label>
                        <input type="text" name="phone_number" required>
                    </div>
                    <div class="input-field">
                       <textarea name="description" class="materialize-textarea"></textarea>
                    </div>
                    <button type="submit" class="btn red darken-2">Submit Request</button>
                </form>
            </div>
        </div>
    </div>
</div>