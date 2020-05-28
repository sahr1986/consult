<?php
session_start();
include("includes/header.php");
include_once("conn/conn.php");
?>
<main>
    <div class="container" style="margin-top:2%">
        <div class="row">
        <div class="col m6 s12">
            <img src="images/contact_2.jpg" style="width:100%;height:500px">          
        </div>
            <div class="col m6 s12">
                <div class="card-panel">
                    <h5 class="center-align">Contact Us</h5>
                    <?php

                        $fullname = $email = $subject = $message = false;

                        if($_SERVER['REQUEST_METHOD'] == 'POST'){

                            if(!empty($_POST['fullname'])){

                                $fullname = $_POST['fullname'];
                            }
                            else{

                                echo "<h5>No Fullname entered</h5>";
                            }
                            if(!empty($_POST['email'])){

                                $email = $_POST['email'];
                            }
                            else{

                                echo "<h5>No email entered</h5>";
                            }
                            if(!empty($_POST['subject'])){

                                $subject = $_POST['subject'];
                            }
                            else{

                                echo "<h5>No subject entered</h5>";
                            }
                            if(!empty($_POST['message'])){

                                $message = $_POST['message'];
                            }
                            else{

                                echo "<h5>No message entered</h5>";
                            }

                            if($fullname && $email && $subject && $message){

                                $query = "INSERT INTO Contact(contact_fullname,contact_email,contact_subject,contact_message) VALUES('$fullname','$email','$subject','$message')";

                                $result = mysqli_query($conn, $query);

                                if(mysqli_affected_rows($conn)){

                                    echo "<h5>Sending Successful</h5>";
                                }
                                else {

                                    echo "<h5>Sending Fail</h5>";
                                }
                            }
                        }

                    ?>
                    <form action="" method="POST">
                        <div class="input-field">
                            <label for="">Fullname</label>
                            <input type="text" name="fullname" required>
                        </div>
                        <div class="input-field">
                            <label for="">Email Address</label>
                            <input type="email" name="email" required>
                        </div>
                        <div class="input-field">
                            <label for="">Subject</label>
                            <input type="text" name="subject" required>
                        </div>
                        <div class="input-field">
                            <label for="">Message</label>
                            <textarea name="message" class="materialize-textarea" required></textarea>
                        </div>
                        <button type="submit" class="btn red darken-2">Contact Us</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include("includes/footer.php")
?>