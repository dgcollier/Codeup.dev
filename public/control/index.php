<?php 
    $heading = 'This is the homepage.';
    $footing = 'This is the footer.';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>HOME</title>
    <style type="text/css">
    #nav {
        width: 100%;
        height: 50px;
        position: fixed;
        top: 0px;
        left: 0px;
        background-color: salmon;
    }

    #navLinks {
        padding: 10px;
        margin-top: 10px;
    }

    body {
        margin-top: 50px;
    }

    footer {
        position: fixed;
        left: 10px;
        bottom: 10px;
    }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <?php include 'header.php'; ?>

    <h3>Available Links</h3>
        <ul>
            <li><a href="../login.php">Codeup.dev Login</a></li>
            <li><a href="http://simplesimon.dev">Simple Simon game</a></li>
            <li><a href="http://whackamole.dev">Whack-a-Mole game</a></li>
            <li><a href="../monty_python.php">Monty Python quiz</a></li>
        </ul>
    <?php include 'footer.php' ?>

</body>
</html>