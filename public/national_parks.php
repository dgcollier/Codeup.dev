<?php 
    session_start();
    $sessionId = session_id();

    require_once "../Input.php";
    require_once "../parks_config.php";
    require_once "../db_connect.php";


    // POST request variables
    $nameInput =     (Input::has('nameInput')     ? Input::get('nameInput')     : null);
    $locationInput = (Input::has('locationInput') ? Input::get('locationInput') : null);
    $dateInput =     (Input::has('dateInput')     ? Input::get('dateInput')     : null);
    $areaInput =     (Input::has('areaInput')     ? Input::get('areaInput')     : null);
    $descrInput =    (Input::has('descrInput')    ? Input::get('descrInput')    : null);

    if ($nameInput && $locationInput && $dateInput && $areaInput) {
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


    // Pagination control & calculation
    $parksPerPage = 4; // fix this ???
    $stmt = $dbc->prepare('SELECT COUNT(*) FROM national_parks');
    $stmt->execute();
    $totalParks = $stmt->fetchColumn();
    $lastPage = ceil($totalParks / $parksPerPage);


    // Default page value
    if (Input::has('page')) {
        $page = Input::get('page');
    } else {
        $page = 1;
    }

        // stopped working after inserted prepare() methods
    // Dynamic 'ORDER BY' query
    // if(Input::has('order')) {
    //     $order = Input::get('order');
    //     if ($order == 'name' || $order == 'location' || $order == 'date_established' || $order == 'area_in_acres') {
    //         $orderBy = $order;
    //     }
    // } else {
    //     $order = 'name';
    //     $orderBy = $order;
    // }


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
        'SELECT name, location, date_established, area_in_acres, description 
        FROM national_parks 
        LIMIT :myLimit, :myOffset'
    );

    $stmt->bindValue(':myLimit', ($page - 1) * $parksPerPage, PDO::PARAM_INT);
    $stmt->bindValue(':myOffset', $parksPerPage, PDO::PARAM_INT);
        // $stmt->bindValue(':myOrder', $orderBy, PDO::PARAM_STR);
        // -- ORDER BY :myOrder 


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
        $prev = 'disabled invisible';
    }

    if ($page == $lastPage) {
        $next = 'disabled invisible';
    }
?>

<html>
<head>
    <title>National Parks</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <style type="text/css">

        a,
        form {
            text-align: center;
        }

        body {
            background-image: url("../img/yosemite.jpg");
        }

        td {
            font-size: 16px;
            min-width: 10%;
        }

        th {
            font-size: 18px;
        }

        .input {
            width: 35%;
            min-width: 374px;
        }

        .table {
            margin: 25px auto;
            margin-bottom: 25px;
            max-width: 75%;     
        }

        #add {
            width: 50%;
        }

        #addPark {
            clear: both;
        }

        #descrInput {
            width: 50%;
        }

        #descrInput,
        .input {
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 5px;
        }

        #natParks {
            font-size: 3em;
            margin: 25px;
            margin-left: 12.5%;
        }

        #next {
            float: right;
            margin-right: 12.5%;
        }

        /*#orders > a {
            margin-left: 10px;
            margin-right: 10px;
        }*/

        #parkForm > h2 {
            color: #f5f5f5;
        }

        #prev {
            float: left;
            margin-left: 12.5%;
        }
    </style>
</head>
<body>
    <div class="body">
        <h1 id="natParks">National Parks</h1>

        <table class="table">
            <tr class="active">
                <th>Name</th>
                <th>Location</th>
                <th>Established</th>
                <th>Acres</th>
                <th>Description</th>
            </tr>

            <? foreach ($parks as $park): ?>
            <tr class="success">
                <td><?= $park['name'] ?></td>
                <td><?= $park['location'] ?></td>

                <td><? $date = DateTime::createFromFormat('Y-m-d', $park['date_established']); echo $date->format('M j, Y'); ?></td>

                <td><?= number_format(ceil($park['area_in_acres'])) ?></td>
                <td><?= $park['description'] ?></td>
            </tr>
            <? endforeach; ?>
        </table>

        <div id="paginators">
            <a id="prev" class="pager" href="?page=<?= $pageDown ?>">
                <!-- &order=<?= $orderBy ?> -->
                <button class="<?= $prev ?> btn btn-success">Prev.</button>
            </a>
            <a id="next" class="pager" href="?page=<?= $pageUp ?>">
                <!-- &order=<?= $orderBy ?> -->
                <button class="<?= $next ?> btn btn-success">Next</button>
            </a>
        </div>

        <!-- <div id="orders">
            <h3>Re-order by:</h3>
            <a href="?page=<?= $page ?>&order=name">Name</a>
            <a href="?page=<?= $page ?>&order=location">Location</a>
            <a href="?page=<?= $page ?>&order=date_established">Date Est.</a>
            <a href="?page=<?= $page ?>&order=area_in_acres">Area</a>
        </div> -->

        <form id="addPark" class="form-horizontal" method="POST">
            <div id="parkForm" class="form-group">
                <h2>Add a Park:</h2>
                <div><input type="text"   id="nameInput"       class="input"     name="nameInput"        placeholder="Park Name" autofocus></div>
                <div><input type="text"   id="locationInput"   class="input"     name="locationInput"    placeholder="Location (i.e., 'TX')"></div>
                <div><input type="text"   id="dateInput"       class="input"     name="dateInput"        placeholder="Date ('YYYY-MM-DD')"></div>
                <div><input type="text"   id="areaInput"       class="input"     name="areaInput"        placeholder="Area (in acres)"></div>
                
                <textarea id="descrInput" class="input form-control" name="descrInput" placeholder="Description" rows="3"></textarea>

                <button id="add" type="submit" class="btn btn-md btn-success">Add</button>
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