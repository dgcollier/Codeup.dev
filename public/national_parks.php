<?php 
    
    require_once "../parks_config.php";
    require_once "../db_connect.php";


    $parksPerPage = 4;
    $stmt = $dbc->query('SELECT COUNT(*) FROM national_parks');
    $totalParks = $stmt->fetchColumn();
    $lastPage = ceil($totalParks / $parksPerPage);
    // print_r($totalParks . PHP_EOL);
    // print_r($lastPage . PHP_EOL);

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    $page = intval($page);

    if ($page > $lastPage) {
        $page = $lastPage;
    }

    if ($page < 1) {
        $page = 1;
    }

    $stmt = $dbc->query('SELECT name, location, date_established, area_in_acres FROM national_parks LIMIT '. ($page - 1) * $parksPerPage . ', ' . $parksPerPage);
    $parks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($parks);

    $pageUp = $page + 1;
    $pageDown = $page - 1;

?>

<html>
<head>
    <title>National Parks</title>
</head>
<body>
    <h1>National Parks DB</h1>

    <table>
        <tr>
            <th>Name</th>
            <th>Location</th>
            <th>Established</th>
            <th>Area (acres)</th>
        </tr>

        <? foreach ($parks as $park): ?>
        <tr>
            <td><?= $park['name'] ?></td>
            <td><?= $park['location'] ?></td>
            <td><?= $park['date_established'] ?></td>
            <td><?= $park['area_in_acres'] ?></td>
        </tr>
        <? endforeach; ?>
    </table>

    <a href="?page=<?= $pageDown ?>">
        <button>Prev.</button>
    </a>
    <a href="?page=1">1</a>
    <a href="?page=2">2</a>
    <a href="?page=3">3</a>
    <a href="?page=<?= $pageUp ?>">
        <button>Next</button>
    </a>


</body>
</html>