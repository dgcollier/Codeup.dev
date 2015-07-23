<?php

    require_once '../functions.php';

    function pageController()
    {
        $data = [];
 
        if (inputHas('score')) {
            $score =  $_GET['score'];
        } else {
            $score = 0;
            $hitBtn = 'START';
        }

        if (inputGet('hit')) {
            $score++;
            $hitBtn = 'HIT';
            $text = 'Hit it again!';
        } else {
            $score = 0;
            $hitBtn = 'START';
            $text = "Let's play!";
        }    

        $data['score'] = $score;
        $data['hitBtn'] = $hitBtn;
        $data['text'] = $text;  

        return $data;
    }

    extract(pageController());
?>

<!DOCTYPE>
<html>
<head>
    <title>PING</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/ping-pong.css">
</head>
<body>
    <h1>PING</h1>
    <a href="/pong.php?hit=<?=true?>&score=<?= $score; ?>">
        <button id="hitBtn" class="btn btn-lg"><?= $hitBtn; ?></button>
    </a>
    <a href="/pong.php?hit=<?=false?>&score=<?= $score; ?>">
        <button id="miss" class="btn btn-lg">MISS</button>  
    </a>
    <button id="scorePong" class="btn btn-lg">Pong: <?= $score; ?></button>
    <button id="scorePing" class="btn btn-lg">Ping: <?= $score; ?></button>
    <a href="/ping.php">
        <button id="quit" class="btn btn-lg">Quit</button>  
    </a>
    <h4 id="playText"><?= $text ?></h4>

    <div id="ping"></div>

</body>
</html>