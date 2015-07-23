<?php  

    session_start();
    $sessionId = session_id();

    if (empty($_SESSION['LOGGED_IN_USER'])) {
        header("location: /login.php");
        exit();
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Authorized</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <style type="text/css">
        body {
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <h1>Authorized</h1>
    <h3><?= $_SESSION['LOGGED_IN_USER']; ?></h3>
    <p><?= $sessionId; ?></p>

    <a href="http://codeup.dev/logout.php">
        <button>Log Out</button>
    </a>



</body>
</html>