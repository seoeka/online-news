<?php
require('../include/functions.php');
require('../include/database.php');
session_start();

if(isset($_SESSION['USER_LOGGED_IN']) && $_SESSION['USER_LOGGED_IN'] == "YES") {
    redirect('./index.php');
}

if(isset($_POST['login-submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = md5($password);

    $authorQuery = "SELECT * FROM author WHERE email = '$email'";
    $authorResult = $con->query($authorQuery);

    $adminQuery = "SELECT * FROM admin WHERE email = '$email'";
    $adminResult = $con->query($adminQuery);

    if ($authorResult->num_rows > 0) {
        $authorRow = $authorResult->fetch_assoc();
        if (($authorRow['password']) === $hashedPassword) {
            $_SESSION['USER_LOGGED_IN'] = true;
            $_SESSION['USER_ROLE'] = 'author';
            $_SESSION['USER_NAME'] = $authorRow['username'];
            $_SESSION['USER_ID'] = $authorRow['author_id'];
            $_SESSION['USER_EMAIL'] = $author['email'];
            redirect("./index.php");
        } else {
            alert("Password Anda salah!");
        }
    } 
    else if ($adminResult->num_rows > 0) {
            $adminRow = $adminResult->fetch_assoc();
            if (($adminRow['password']) === $hashedPassword) {
                $_SESSION['USER_LOGGED_IN'] = true;
                $_SESSION['USER_ROLE'] = 'admin';
                $_SESSION['USER_NAME'] = $adminRow['username'];
                $_SESSION['USER_ID'] = $adminRow['admin_id'];
                $_SESSION['USER_EMAIL'] = $adminRow['email'];
                redirect("./index.php");
            } else {
                alert("Password Anda salah!");
            }
    }
    else {
            alert("Email tidak terdaftar!");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>TMNews Control Panel - Login </title>

  <link href="../assets/css/partials/4-component.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="icon" href="../images/TMNews.ico" type="image/x-icon">
  <link href="../assets/css/admin/style.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="slide navbar style.css">
    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #080710;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .main{
            width: 380px;
            height: 500px;
            overflow: hidden;
            background-color: rgba(255,255,255,0.13);
            border-radius: 10px;
            border: 2px solid rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
        }
        #chk{
            display: none;
        }
        .login{
            position: relative;
            width:100%;
            height: 100%;
        }
        label{
            display: flex;
            color: #fff;
            font-size: 2.3em;
            justify-content: center;
        }
        .login label {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 60px;
            font-weight: bold;
        }
        .login input{
            width: 65%;
            height: 40px;
            justify-content: center;
            display: flex;
            margin: 20px auto;
            padding: 0 20px;
            background: #e0dede;
            border-radius: 5px;
            border: none;
            outline: none;
            font-family: 'Poppins', sans-serif;
        }
        button.submit{
            width: 65%;
            height: 40px;
            margin: 10px auto;
            justify-content: center;
            display: block;
            color: #fff;
            background: #454839;
            font-size: 1em;
            font-weight: bold;
            margin-top: 20px;
            outline: none;
            border: none;
            border-radius: 5px;
            transition: .2s ease-in;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
        }
        button.submit:hover{
            background: #5F6F52;
        }
        .note{
            height: 300px;
            background: #eee;
            border-radius: 60% / 10%;
            transform: translateY(-130px);
        }
        .note label{
            color: #000;
            transform: scale(.5);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="main">  	
            <input type="checkbox" id="chk" aria-hidden="true">
            <div class="login">
                <form action="login.php" method="post">
                    <label>Login</label>
                    <input type="email" name="email" placeholder="Email" required="">
                    <input type="password" name="password" placeholder="Password" required="">
                    <button class="submit" name="login-submit">Login</button>
                </form>
            </div>
            <div class="note">
                <label>Welcome Back!</label>
            </div>
	    </div>
    </div>
</body>
<?php
  require('./include/footer.php');
?>