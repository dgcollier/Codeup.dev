<?php
    var_dump($_GET);
    var_dump($_POST);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Quest</title>
    </head>
    <body>
        <form>
            <fieldset>
                <legend>Monty Python Quiz</legend>

                <p>What is your name?</p>
                <legend for="name"></legend>
                <input type="name" id="" name="name" placeholder="Enter your name">

                <p>What is your quest?</p>
                <legend for="quest"></legend>
                <input type="quest" id="" name="quest" placeholder="Enter your quest">

                <p>What is the capital of Assyria?</p>
                <legend for="capital"></legend>
                <input type="capital" id="" name="capital" placeholder="Enter the capital of Assyria">

                <p>What is your favorite colour?</p>
                <legend for="swallow"></legend>
                <input type="swallow" id="" name="swallow" placeholder="Enter your favorite colour">

                <p>What is the air speed of an unladen swallow?</p>
                <legend for="swallow"></legend>
                <input type="swallow" id="" name="swallow" placeholder="Enter the air speed of an unladen swallow">

                <p><button type="submit" name="continue">Continue your Quest</button></p>
            </fieldset> 
        </form>

    </body>
</html>