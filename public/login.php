<?php  
    session_start();
    $sessionId = session_id();

    var_dump($_POST);
    var_dump($sessionId);

    $user = isset($_POST['username']) ? $_POST['username'] : '';
    $pass = isset($_POST['password']) ? $_POST['password'] : '';

    if (!empty($_POST)) {
        
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

    <style type="text/css">
        body { 
            text-align: center;
        }
    </style>
</head>
<body>

    <form method="POST">
        <h1>Codeup.dev Login</h1>
        <p><?= $message; ?></p>
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Pasword">
        <input type="submit">

    </form>

</body>
</html>