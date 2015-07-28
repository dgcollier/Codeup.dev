<?php 

    session_start();
    $sessionId = session_id();

    require_once "../../Input.php";

    if(isset($_SESSION['view'])) {
        $_SESSION['view']=$_SESSION['view']+1;
    } else {
        $_SESSION['movies'] = array();
        $_SESSION['view']=1;
    }

    $title = Input::has('title') ? Input::get('title') : '';
    $descr = Input::has('descr') ? Input::get('descr') : '';

    $qArray = array('title' => $title, 'description' => $descr);

    if (!empty($title) && !empty($descr)) {
       array_push($_SESSION['movies'], $qArray);      
    }

    $remove = Input::has('remove') ? (intval(Input::get('remove'))-1) : null;

    if ($remove < count($_SESSION['movies'])) {
        unset($_SESSION['movies'][$remove]);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>MOVIES</title>

    <script src="../js/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/movies.css">
</head>
<body>

    <form method="POST">
        <span>Add Item:</span>
        <input type ="text" name="title" placeholder="Title">
        <input type ="text" name="descr" placeholder="Description">
        <input type ="submit" value="Add">
    </form>

    <h1 class="well">Movie Queue:</h1>

    <ol>
        <?foreach ($_SESSION['movies'] as $movie) :?>
                <li><a href="/movies/show.php?title=<?= $movie['title'] ?>&descr=<?= $movie['description'] ?>"><?= $movie['title'] ?></a></li>
           <? endforeach;?>
    </ol>

    <footer>
        <form method = "POST">
            <span>Remove Item:</span>
            <input type="text" name="remove" placeholder="Item #">
            <input type ="submit" value="Remove">
        </form>

        <span><input id="clear" type="submit" value="CLEAR"></span>
    </footer>

    <script type="text/javascript">
    "use strict";
        $("#clear").click(function() {

            if (confirm('Are you sure you want to clear your queue? This action cannot be undone.')) {
                location.replace('clear.php');
            } else {
                location.reload(true);
            }
        });
    </script>

</body>
</html>