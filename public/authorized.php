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
</head>
<body>
    <p>Authorized</p>
    <p>
        <?= $sessionId; ?>
    </p>

    <a href="http://codeup.dev/logout.php">
        <button>Log Out</button>
    </a>

    <p>
        <?= $_SESSION['LOGGED_IN_USER']; ?>
    </p>


</body>
</html>