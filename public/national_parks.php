<?php 
    
    require_once "../Input.php";
    require_once "../parks_config.php";
    require_once "../db_connect.php";


    $parksPerPage = 4;
    $stmt = $dbc->query('SELECT COUNT(*) FROM national_parks');
    $totalParks = $stmt->fetchColumn();
    $lastPage = ceil($totalParks / $parksPerPage);
    // print_r($totalParks . PHP_EOL);
    // print_r($lastPage . PHP_EOL);

    if (Input::has('page')) {
        $page = Input::get('page');
    } else {
        $page = 1;
    }

    $order = Input::get('order');

    if(Input::has('order')) {
        if ($order == 'name' || $order == 'location' || $order == 'date_established' || $order == 'area_in_acres') {
            $orderBy = $order;
        }
    } else {
        $orderBy = 'name';
    }

    $page = intval($page);

    if ($page > $lastPage) {
        $page = $lastPage;
    }

    if ($page < 1) {
        $page = 1;
    }

    $stmt = $dbc->query(
        'SELECT name, location, date_established, area_in_acres 
        FROM national_parks 
        ORDER BY ' . $orderBy .
        ' LIMIT '. ($page - 1) * $parksPerPage . ', ' . $parksPerPage
    );
    $parks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($parks);

    $pageUp = $page + 1;
    $pageDown = $page - 1;

    $prev = 'btn btn-lg';
    $next = 'btn btn-lg';

    if (!Input::has('page') || $page == 1) {
        $prev = 'invisible';
    }

    if ($page == $lastPage) {
        $next = 'invisible';
    }


?>

<html>
<head>
    <title>National Parks</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <style type="text/css">
        .body,
        table {
            text-align: center;
        }

        table {
            margin: auto;
            margin-bottom: 25px;
        }

        th {
            font-size: 22px;
            padding-left: 5px;
            padding-right: 5px;
        }

        td {
            font-size: 20px;
        }

        .pager {
            display: inline-block;
        }

        #paginators {
            margin-left: 5px auto;
            margin-right: 5px auto;
        }

        #orders > a {
            margin-left: 10px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="body">
        <h1>National Parks</h1>

        <table class="table-striped">
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

        <div id="paginators">
            <a class="pager" href="?page=<?= $pageDown ?>">
                <button class="<?= $prev ?>">Prev.</button>
            </a>
            <a class="pager" href="?page=<?= $pageUp ?>">
                <button class="<?= $next ?>">Next</button>
            </a>
        </div>

        <div id="orders">
            <h3>Re-order by:</h3>
            <a href="?page=<?= $page ?>&order=name">Name</a>
            <a href="?page=<?= $page ?>&order=location">Location</a>
            <a href="?page=<?= $page ?>&order=date_established">Date Est.</a>
            <a href="?page=<?= $page ?>&order=area_in_acres">Area</a>
        </div>
    </div>



</body>
</html>