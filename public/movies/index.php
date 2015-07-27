<?php 

    session_start();
    $sessionId = session_id();

    require_once "../../Input.php";

    print_r($sessionId);

    $title = Input::has('title') ? Input::get('title') : '';
    $descr = Input::has('descr') ? Input::get('descr') : '';
    // var_dump($title, $descr);

    // $_SESSION['movies'] = [];

    $qArray = array('title' => $title, 'description' => $descr);
    // var_dump($qArray);

    if (!empty($title) && !empty($descr)) {
       array_push($_SESSION['movies'], $qArray);
       // var_dump($_SESSION['movies']);        
    }

    // $remove = 
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

    <ol>
        <?foreach ($_SESSION['movies'] as $movie) :?>
                <li><a href="show.php"><?= $movie['title'] ?></a></li>
           <? endforeach;?>
    </ol>

    <h3>Remove Item:</h3>

    <form method = "POST">
        <input type="text" name="remove" placeholder="Item to Remove">
        <input type ="submit">
    </form>

</body>
</html>