<?php  
    session_start();
    $sessionId = session_id();

    require_once '../Input.php';
    require_once '../Auth.php';

    // var_dump($_POST);
    // var_dump($sessionId);

    if (Input::has('username') && Input::has('password')) {
        Auth::attempt(Input::get('username'), Input::get('password'));
        if (!Auth::check()) {
            $message = 'Username and password did not match.';
        } else if (Auth::check()) {
            Auth::login();
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