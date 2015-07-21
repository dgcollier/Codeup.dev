<?php  

var_dump($_GET);

function pageController()
{
    $data = [];
    
    if(empty($_GET['counter'])) {
        $counter = 0;
    } else {
        $counter = $_GET['counter'];
    }

    $data['counter'] = $counter;

    return $data;
}

extract(pageController());

?>

<!DOCTYPE html>
<html>
<head>
    <title>Counter</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <style type="text/css">
        body {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Counter:</h1>
    <h2><?= $counter; ?></h2>
 
    <a href="?counter=<?= $counter+1; ?>">
        <button id="up" class="btn btn-lg">Up</button>
    </a>
 

    <a href="?counter=<?= $counter-1; ?>">
        <button id="down" class="btn btn-lg">Down</button>  
    </a>
    
</body>
</html>