<?php

session_start();
$sessionId = session_id();

require_once "../../Input.php";

$_SESSION = [];

header("location: /movies/index.php");
exit(); 

?>