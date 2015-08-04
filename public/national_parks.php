<?php 
    session_start();
    $sessionId = session_id();

    require_once "../Input.php";
    require_once "../parks_config.php";
    require_once "../db_connect.php";


    // Pagination control
    $parksPerPage = 4;
    $stmt = $dbc->query('SELECT COUNT(*) FROM national_parks');
    $totalParks = $stmt->fetchColumn();
    $lastPage = ceil($totalParks / $parksPerPage);


    // Default page value
    if (Input::has('page')) {
        $page = Input::get('page');
    } else {
        $page = 1;
    }


    // Dynamic 'ORDER BY' query
    $order = Input::get('order');

    if(Input::has('order')) {
        if ($order == 'name' || $order == 'location' || $order == 'date_established' || $order == 'area_in_acres') {
            $orderBy = $order;
        }
    } else {
        $orderBy = 'name';
    }


    // Page # control
    $page = intval($page);

    if ($page > $lastPage) {
        $page = $lastPage;
    }

    if ($page < 1) {
        $page = 1;
    }


    // Prepare DB query
    $stmt = $dbc->prepare(
        "SELECT name, location, date_established, area_in_acres, description 
        FROM national_parks 
        ORDER BY " . $orderBy .
        ' LIMIT '. ($page - 1) * $parksPerPage . ', ' . $parksPerPage
    );

    // Execute DB query, store array in $parks
    $stmt->execute();
    $parks = $stmt->fetchAll(PDO::FETCH_ASSOC);


    // Change $_GET with button click
    $pageUp = $page + 1;
    $pageDown = $page - 1;


    // Add & remove classes from buttons based on page location
    $prev = 'btn btn-lg';
    $next = 'btn btn-lg';

    if (!Input::has('page') || $page == 1) {
        $prev = 'invisible';
    }

    if ($page == $lastPage) {
        $next = 'invisible';
    }


    // POST request variables
    $nameInput =     (Input::has('nameInput')     ? Input::get('nameInput')     : null);
    $locationInput = (Input::has('locationInput') ? Input::get('locationInput') : null);
    $dateInput =     (Input::has('dateInput')     ? Input::get('dateInput')     : null);
    $areaInput =     (Input::has('areaInput')     ? Input::get('areaInput')     : null);
    $descrInput =    (Input::has('descrInput')    ? Input::get('descrInput')    : null);

    if ($nameInput && $locationInput && $dateInput && $areaInput && $descrInput) {
        $stmt = $dbc->prepare(
            "INSERT INTO national_parks (name, location, date_established, area_in_acres, description)
            VALUES (:name, :location, :dateEst, :area, :descr)"
        );

        $stmt->bindValue(':name'     ,$nameInput     ,PDO::PARAM_STR);
        $stmt->bindValue(':location' ,$locationInput ,PDO::PARAM_STR);
        $stmt->bindValue(':dateEst'  ,$dateInput     ,PDO::PARAM_STR);
        $stmt->bindValue(':area'     ,$areaInput     ,PDO::PARAM_STR);
        $stmt->bindValue(':descr'    ,$descrInput    ,PDO::PARAM_STR);

        $stmt->execute();
    }
?>

<html>
<head>
    <title>National Parks</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <style type="text/css">
        .body {
            text-align: center;
        }

        .table {
            margin-bottom: 25px;
        }

        th {
            font-size: 22px;
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

        #descrInput {
            margin: 25px auto       ;
            width: 50%; 
        }
    </style>
</head>
<body>
    <div class="body">
        <h1>National Parks</h1>

        <table class="table table-striped">
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Established</th>
                <th>Area (acres)</th>
                <th>Description</th>
            </tr>

            <? foreach ($parks as $park): ?>
            <tr>
                <td><?= $park['name'] ?></td>
                <td><?= $park['location'] ?></td>
                <td><?= $park['date_established'] ?></td>
                <td><?= $park['area_in_acres'] ?></td>
                <td><?= $park['description'] ?></td>
            </tr>
            <? endforeach; ?>
        </table>

        <div id="paginators">
            <a class="pager" href="?page=<?= $pageDown ?>&order=<?= $orderBy ?>">
                <button class="<?= $prev ?>">Prev.</button>
            </a>
            <a class="pager" href="?page=<?= $pageUp ?>&order=<?= $orderBy ?>">
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

        <form id="addPark" class="form-horizontal" method="POST">
            <div id="parkForm" class="form-group">
                <h2>Add a Park:</h2>
                <input type="text"   id="nameInput"       class="input"     name="nameInput"        placeholder="Park Name" autofocus>
                <input type="text"   id="locationInput"   class="input"     name="locationInput"    placeholder="Location (i.e., 'TX')">
                <input type="text"   id="dateInput"       class="input"     name="dateInput"        placeholder="Date ('YYYY-MM-DD')">
                <input type="text"   id="areaInput"       class="input"     name="areaInput"        placeholder="Area (in acres)">
                
                <textarea id="descrInput" class="input form-control" name="descrInput" placeholder="Description" rows="3"></textarea>

                <button type="submit" class="btn btn-sm">Add</button>
            </div>
        </form>

        <!-- <div>
            <h4>Results per page:</h4>
            <form type="POST">
                <select>
                    <option name="show" value="1">1</option>
                    <option name="show" value="2">2</option>
                    <option name="show" value="4">4</option>
                    <option name="show" value="5">5</option>
                    <option name="show" value="10">10</option>
                </select>
                <input type="hidden" value="?page=<?= $page ?>&order=<?= $orderBy ?>">
            </form>
        </div> -->
    </div>



</body>
</html>