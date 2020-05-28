<?php
include("includes/header.php");
?>
<main>
    <div class="container" style="margin-top:2%">
        <div class="row">
            <div class="col m8 offset-m2 s12">
                <div class="card-panel">
                    <h5 class="center-align">Create Account</h5>
                    <?php

                        include_once("conn/conn.php");

                        $fullname = $email = $password = false;

                        if($_SERVER['REQUEST_METHOD'] == "POST"){

                            if(!empty($_POST['fullname'])){

                                $fullname = $_POST['fullname'];
                            }
                            else{

                                echo "<P>Please Input Your Fullname</p>";
                            }
                            if(!empty($_POST['email'])){

                                $email = $_POST['email'];
                            }
                            else{

                                echo "<P>Please Input Your Email Address</p>";
                            }
                            if(!empty($_POST['password'])){

                                if($_POST['password'] != $_POST['confirmPassword']){

                                    echo "<p>Password Mismatch</p>";
                                }
                                else{

                                    $password = $_POST['password'];
                                }
                            }
                            else{

                                echo "<p>Please Input Your Password</p>";
                            }
                            if($fullname && $email && $password){

                                $query = "SELECT * FROM Users WHERE UserEmail = '$email'";

                                $result = mysqli_query($conn, $query);

                                if(mysqli_num_rows($result) > 0){

                                    echo "<p>The Email Address Have Already Been Registered.</P>";
                                }
                                else{

                                    $query = "INSERT INTO Users(userFullname,userEmail,userPassword, date_added) VALUES('$fullname','$email',sha1('$password'),NOW())";

                                    $result = mysqli_query($conn, $query);

                                    if(mysqli_affected_rows($conn) == 1){

                                        echo "<p>Registration Successful</p>";
                                    }
                                    else{

                                        echo "<p>Registration Failed</p>";
                                    }
                                }
                            }
                        }
                    ?>
                    <form action="" method="POST">
                        <div class="input-field">
                            <label for="FullName">Full Name</label>
                            <input type="text" name="fullname" required>
                        </div>
                        <div class="input-field">
                            <label for="Email">Email Address</label>
                            <input type="email" name="email" required>
                        </div>
                        <div class="input-field">
                            <label for="password">Password</label>
                            <input type="password" name="password" required>
                        </div>
                        <div class="input-field">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" name="confirmPassword" required>
                        </div>
                        <button type="submit" class="btn red darken-2">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include("includes/footer.php")
?>