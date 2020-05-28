<?php
session_start();
include("includes/login_header.php");
include_once("conn/conn.php");

$address = $phone_number = $description = false;

if(isset($_GET['id']) && is_numeric($_GET['id'])){

    $id = $_GET['id'];

    $query = "SELECT * FROM Request WHERE requestID = $id";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){

        while($rows = mysqli_fetch_object($result)){

            $address = $rows->address;
            $phone_number = $rows->phone_number;
            $description = $rows->description;
        }
    }
    
}
?>
<div class="container">
    <div class="row">
        <div class="col m8 offset-m2 s12">
            <div class="card-panel">
            <h5>Update Information</h5>
                <form action="" method="POST">
                <div class="input-field">
                        <label for="">Address</label>
                        <input type="text" name="address" required value="<?php echo $address; ?>">
                    </div>
                    <div class="input-field">
                        <label for="">Phone Number</label>
                        <input type="text" name="phone_number" required value="<?php echo $phone_number; ?>">
                    </div>
                    <div class="input-field">

                       <textarea name="description" class="materialize-textarea" value="<?php echo $description; ?>"></textarea>
                    </div>
                    <button type="submit" class="btn red darken-2">Submit Request</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php

$email = $_SESSION['login_email'];

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

        $query = "UPDATE Request SET userEmail = '$email', address = '$address', phone_number = '$phone_number',description = '$description' WHERE requestID = '$id'";

        $result = mysqli_query($conn, $query);

        if(mysqli_affected_rows($conn) == 1){

            echo "<h5 class='center-align'>Request Submitted Successful</h5>";
        }
        else{

            echo "<h5 class='center-align'>Request Submission Failed</h5>";
        }

    }
}


?>        
                
