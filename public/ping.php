<?php

    function pageController()
    {
        $data = [];
 
        if (empty($_GET['score'])) {
            $score = 0;
            $hitBtn = 'START';
        } else {
            $score =  $_GET['score'];
        }

        if (empty($_GET['hit'])) {
            $score = 0;
            $hitBtn = 'START';
            $text = "Let's play!";
        } else {
            $score++;
            $hitBtn = 'HIT';
            $text = 'Hit it again!';
        }    

        $data['score'] = $score;
        $data['hitBtn'] = $hitBtn;
        $data['text'] = $text;  

        return $data;
    }

    extract(pageController());
    // var_dump($_GET['hit']);
?>

<!DOCTYPE>
<html>
<head>
    <title>PING</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <style type="text/css">
        body {
            text-align: center;
        }

        button {
            width: 150px;

        }

        #quit {
            position: fixed;
            top: 400px;
            left: 640px;
        }

        #score {
            position: fixed;
            top: 475px;
            left: 640px;   
        }

        #ping {
            background-color: #FFFF00;
            border-radius: 100%;
            width: 75px;
            height: 75px;
            margin-left: 200px;
            margin-top: 50px;
            float: left;
            border: solid #A09D8E 2px;
        }

    </style>
</head>
<body>
    <h1>PING</h1>
    <a href="/pong.php?hit=<?=true?>&score=<?= $score; ?>">
        <button id="hitBtn" class="btn btn-lg"><?= $hitBtn; ?></button>
    </a>

    <a href="/pong.php?hit=<?=false?>&score=<?= $score; ?>">
        <button id="miss" class="btn btn-lg">MISS</button>  
    </a>
    <h4><?= $text ?></h4>

    <div id="ping"></div>

    <a href="/ping.php">
        <button id="quit" class="btn btn-lg">Quit</button>  
    </a>

    <button id="score" class="btn btn-lg">Score: <?= $score; ?></button>

</body>
</html>