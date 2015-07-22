<?php  
var_dump($_GET);
var_dump($_POST);



?>

<!DOCTYPE html?>
<html>
<head>
    <title>Codeup Search</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style type="text/css">
        body {
            text-align: center;
            margin-top: 50px;
        }

        button {
            margin-top: 25px;
            width: 250px;
        }
    </style>
</head>
<body>

    <h1>Codeup Search Engine</h1>

    <form method="POST">
        <input type="text" placeholder="Search for..." name="search">
        <input type="submit"><br>
    </form>

    <a href="">
        <button class="btn btn-md">Go</button>
    </a>

</body>
</html>