<?php  

    session_start();
    $sessionId = session_id();

    require_once 'functions.php';

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
    <script src="/js/jquery.js"></script>
    <style type="text/css">
        body {
            text-align: center;
            margin-top: 50px;
        }

        h4,
        button {
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <h1 class="konami">Authorized</h1>
    <h4 class="konami">Welcome:     <?= $_SESSION['LOGGED_IN_USER']; ?></h4>

    <a class="konami" href="http://codeup.dev/logout.php">
        <button class="blue">Log Out</button>
    </a>

    <script type="text/javascript">
        "use strict";
        $(document).ready(function() {

            var konami = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65, 13];
            var keylog = [];

            $(document).keydown(function (e){
                var newContent = keylog.push(e.keyCode);
                console.log(e.keyCode);
                // console.log(keylog);

                if (keylog.length > konami.length) {
                    keylog.shift();
                }

                if (konami.toString() == keylog.toString()) {
                    $('.konami').css('font-family', 'Courier New');
                    $('body').css('background-color', 'salmon');
                    $('.blue').css('background-color', '#2c3e50');
                }
            });
        });
    </script>

</body>
</html>