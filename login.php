<?php
session_start();
include("includes/header.php");
?>
<main>
    <div class="container" style="margin-top:2%">
        <div class="row">
            <div class="col l8 offset-l2">
                <div class="card-panel">
                    <h5 class="center-align">Log In</h5>
                    <?php
                        include_once("conn/conn.php");

                        $email = $password = false;

                        if($_SERVER['REQUEST_METHOD'] == 'POST'){

                            if(!empty($_POST['email'])){

                                $email = $_POST['email'];
                            }
                            else{

                                echo "<p>Please Input Your Email Address</p>";
                            }
                            if(!empty($_POST['password'])){

                                $password = $_POST['password'];
                            }
                            else{

                                echo "<p>Please Input Your Password</p>";
                            }
                            if($email && $password){

                                $query = "SELECT * FROM Users WHERE UserEmail = '$email' AND userPassword = sha1('$password')";

                                $result = mysqli_query($conn, $query);

                                if(mysqli_num_rows($result) == 1){

                                    $_SESSION['login_email'] = $email;

                                    echo"<script>location.href = 'http://localhost:8080/consult/dashboard.php'</script>";

                                   
                                }
                                else{

                                	echo "<script>alert('Wrong Email Address Or Password')</script>";
                                  
                                }
                            }
                        }
                    ?>
                    <form action="" method="POST">
                        <div class="input-field">
                            <label for="Email">Email Address</label>
                            <input type="email" name="email" required>
                        </div>
                        <div class="input-field">
                            <label for="password">Password</label>
                            <input type="password" name="password" required>
                        </div>
                        <button type="submit" class="btn red darken-2">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include("includes/footer.php")
?>