<?php
session_start();
if(isset($_SESSION["user"])){
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="form-container">
        <h2>Company Name</h2>
<?php
    if(isset($_POST["login"])){
            $email = $_POST["email"];
            $password = $_POST["password"];
            require_once "db.php";
            $sql = "SELECT * FROM users WHERE email =  '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

            if($user){
                    if(password_verify($password, $user["password"])){
                        session_start();
                        $_SESSION["user"] = "yes";
                        header("Location: home.php");
                            die();
                    }else{
                        echo "<div class= 'alert alert-danger'>Password does not match</div>";
                    }
            }else{
                echo "<div class= 'alert alert-danger'>Email does not match</div>";
            }
    }
?>
    <h2>Login</h2>
    <form action="login.php"method="POST">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit" name="login">Login</button>
    </form> <br>
    <div><p>Not Register Yet ? &nbsp;
        <a href="register.php">Register Here</a></p>
    </div>
</div>
</body>
</html>



