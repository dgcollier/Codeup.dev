<?php  
    session_start();
    $sessionId = session_id();

    require 'functions.php';

    // var_dump($_POST);
    // var_dump($sessionId);

    $user = inputHas('username') ? inputGet('username') : '';
    $pass = inputHas('password') ? inputGet('password') : '';


    if (inputHas('username') && inputHas('password')) {
        if ($user == 'guest' && $pass == 'password') {
            $_SESSION['LOGGED_IN_USER'] = $user;
            header("location: /authorized.php");
            exit();
        } else {
            $message = 'Username and password did not match.';
        }
    } else {
        $message = 'Please enter your username and password.';
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <style type="text/css">
        body { 
            text-align: center;
        }

        .input {
            height: 42px;
        }
    </style>
</head>
<body>

    <form method="POST">
        <div class="container">
            <h1>Codeup.dev Login</h1>
        </div>
        <p><?= $message; ?></p>
        <input class="input" type="text" name="username" placeholder="Username" autofocus>
        <input class="input" type="password" name="password" placeholder="Password">
        <input type="submit" class="btn">

    </form>

</body>
</html>