<?php 

    session_start();
    $sessionId = session_id();

    print_r($sessionId);

    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $descr = isset($_POST['descr']) ? $_POST['descr'] : '';
    // var_dump($title, $descr);

    // $_SESSION['movies'] = [];

    $qArray = array('title' => $title, 'description' => $descr);
    // var_dump($qArray);

    if (!empty($title) && !empty($descr)) {
       array_push($_SESSION['movies'], $qArray);
       var_dump($_SESSION['movies']);        
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>MOVIES</title>
</head>
<body>

    <form method="POST">
        <input type ="text" name="title" placeholder="Title">
        <input type ="text" name="descr" placeholder="Description">
        <input type ="submit">
    </form>

    <h2>Movie Queue:</h2>

    <ul>
        <?foreach ($_SESSION['movies'] as $movie) :?>
                <li><?= $movie['title'] ?></li>
           <? endforeach;?>
    </ul>

    <!-- <h3>Remove Item:</h3>

    <form method = "POST">
        <input type="number" name="remove" placeholder="Item #">
        <input type ="submit">
    </form> -->

</body>
</html>