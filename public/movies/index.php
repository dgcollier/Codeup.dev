<?php 

    session_start();
    $sessionId = session_id();

    var_dump($_POST);

    function pageController()
    {
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $descr = isset($_POST['descr']) ? $_POST['descr'] : '';

        $_SESSION['movies'] = array();

        $_SESSION['title'] = $title;

        $_SESSION['description'] = $descr;

        $qArray = array('title' => $_SESSION['title'], 'description' => $_SESSION['description']);

        if (!empty($title)) {
           array_push($_SESSION['movies'], $qArray);
           var_dump($_SESSION['movies']);        
        } else {
            var_dump($_SESSION);
        }

        $data = [];
        $data['movies'] = $_SESSION['movies'];
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
        <input type = "submit">
    </form>

    <h2>Movies!</h2>

    <ul>
        <!-- // foreach ($movies as $movie) {
        //     foreach ($movie as $title) {
                
        //     }
        // } -->
        <li></li>
    </ul>

</body>
</html>