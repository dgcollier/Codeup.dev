
<?php

$rows = array(1, 2, 3, 4, 5, 6, 7, 7, 8, 9);
$columns = $rows;

$possibleValues = array(1, 2, 3, 4, 5, 6, 7, 8, 9);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Sudoku Challenge</title>

    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <style type="text/css">
        .box, 
        .box > input {
            height: 50px;
            width: 50px;
            border: solid black 1px;
            float: left;
        } 

        #b1,
        #c1 {
            clear: both;
        }  
    </style>
</head>
<body>
    <div class="a box" id="a1"><input type="text"></div>
    <div class="a box" id="a2"><input type="text"></div>
    <div class="a box" id="a3"><input type="text"></div>
    <div class="a box" id="a4"><input type="text"></div>
    <div class="a box" id="a5"><input type="text"></div>
    <div class="a box" id="a6"><input type="text"></div>
    <div class="a box" id="a7"><input type="text"></div>
    <div class="a box" id="a8"><input type="text"></div>
    <div class="a box" id="a9"><input type="text"></div>
    <div class="b box" id="b1"><input type="text"></div>
    <div class="b box" id="b2"><input type="text"></div>
    <div class="b box" id="b3"><input type="text"></div>
    <div class="b box" id="b4"><input type="text"></div>
    <div class="b box" id="b5"><input type="text"></div>
    <div class="b box" id="b6"><input type="text"></div>
    <div class="b box" id="b7"><input type="text"></div>
    <div class="b box" id="b8"><input type="text"></div>
    <div class="b box" id="b9"><input type="text"></div>
    <div class="c box" id="c1"><input type="text"></div>
    <div class="c box" id="c2"><input type="text"></div>
    <div class="c box" id="c3"><input type="text"></div>
    <div class="c box" id="c4"><input type="text"></div>
    <div class="c box" id="c5"><input type="text"></div>
    <div class="c box" id="c6"><input type="text"></div>
    <div class="c box" id="c7"><input type="text"></div>
    <div class="c box" id="c8"><input type="text"></div>
    <div class="c box" id="c9"><input type="text"></div>
    <div class="d box" id="d1"><input type="text"></div>
    <div class="d box" id="d2"><input type="text"></div>
    <div class="d box" id="d3"><input type="text"></div>
    <div class="d box" id="d4"><input type="text"></div>
    <div class="d box" id="d5"><input type="text"></div>
    <div class="d box" id="d6"><input type="text"></div>
    <div class="d box" id="d7"><input type="text"></div>
    <div class="d box" id="d8"><input type="text"></div>
    <div class="d box" id="d9"><input type="text"></div>
    <div class="e box" id="e1"><input type="text"></div>
    <div class="e box" id="e2"><input type="text"></div>
    <div class="e box" id="e3"><input type="text"></div>
    <div class="e box" id="e4"><input type="text"></div>
    <div class="e box" id="e5"><input type="text"></div>
    <div class="e box" id="e6"><input type="text"></div>
    <div class="e box" id="e7"><input type="text"></div>
    <div class="e box" id="e8"><input type="text"></div>
    <div class="e box" id="e9"><input type="text"></div>
    <div class="e box" id="c1"><input type="text"></div>
    <div class="e box" id="c2"><input type="text"></div>
    <div class="e box" id="c3"><input type="text"></div>
    <div class="e box" id="c4"><input type="text"></div>
    <div class="e box" id="c5"><input type="text"></div>
    <div class="e box" id="c6"><input type="text"></div>
    <div class="e box" id="c7"><input type="text"></div>
    <div class="e box" id="c8"><input type="text"></div>
    <div class="e box" id="c9"><input type="text"></div>
        
</body>
</html>