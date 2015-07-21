<?php  
    var_dump($_GET);
    $name = 'Bob';
    $date = date('Y-m-d');
?>

<!DOCTYPE html>
<html>
<head>
    <title>GET Requests</title>
</head>
<body>
    <h1>GET Sandbox</h1>
    <div>
        <a href="?name=<?= $name; ?>">My Name</a>
    </div>
    <div>
        <a href="?name=<?= $name; ?>&date=<?= $date; ?>">Name & Date</a>
    </div>

    <form method="GET" action="https://duckduckgo.com/">
        <input type="text" name="q" value="" placeholder="Search DuckDuckGo">
        <button type="submit">Go!</button>
    </form>
</body>
</html>