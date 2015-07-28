<?php

    require_once '../Input.php';

    function pageController()
    {
        $data = [];
 
        if (Input::has('scorePing')) {
            $scorePing =  Input::get('scorePing');
            $scorePong = Input::get('scorePong');
        } else {
            $scorePing = 0;
            $scorePong = 0;
            $hitBtn = 'START';
            $text = "Let's play!";
        }

        if (Input::get('hit') == 'hit') {
            $scorePing++;
            $hitBtn = 'HIT';
            $text = 'Hit it again!';
        } else if (Input::get('hit') == 'miss') {
            $scorePing--;
            $hitBtn = 'HIT';
            $text = 'Ping missed!';
        }

        if ($scorePing == 20) {
            $scorePing = 0;
            $scorePong = 0;
            $hitBtn = 'START';
            $text = "Ping won. Play again!";
        } else if ($scorePong == 20) {
            $$scorePing = 0;
            $scorePong = 0;
            $hitBtn = 'START';
            $text = "Ping won. Play again!";
        }

        $data['scorePing'] = $scorePing;
        $data['scorePong'] = $scorePong;
        $data['hitBtn'] = $hitBtn;
        $data['text'] = $text;  

        return $data;
    }

    extract(pageController());
?>

<!DOCTYPE>
<html>
<head>
    <title>PONG</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/ping-pong.css">
</head>
<body>
    <h1>PONG</h1>
    <a href="/ping.php?hit=<?='hit'?>&scorePing=<?= $scorePing; ?>&scorePong=<?= $scorePong; ?>">
        <button id="hitBtn" class="btn btn-lg"><?= $hitBtn; ?></button>
    </a>
    <a href="/ping.php?hit=<?='miss'?>&scorePing=<?= $scorePing; ?>&scorePong=<?= $scorePong; ?>">
        <button id="miss" class="btn btn-lg">MISS</button>  
    </a>
    <button id="scorePong" class="btn btn-lg">Pong: <?= $scorePong; ?></button>
    <button id="scorePing" class="btn btn-lg">Ping: <?= $scorePing; ?></button> 
    <a href="/pong.php">
        <button id="quit" class="btn btn-lg">Quit</button>  
    </a>
    <h4 id="playText"><?= $text ?></h4>

    <div id="pong"></div>

</body>
</html>