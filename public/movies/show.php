<?php 

require_once "../../Input.php";

if (!Input::has('title') || !Input::has('descr')) {
    header("location: /movies/index.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Movie Description</title>

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/movies.css">
</head>
<body>

    <h1 id="details" class="well">Movie Details</h1>

    <h2 id="showTitle"><?= Input::get('title') ?></h2>

    <h3 id="showDescr"><?= Input::get('descr') ?></h3>

    <a href="/movies/index.php">
    <button id="backToIndex" class="btn btn-sm">Return</button>
    </a>

</body>
</html>