<?php 
    
    require_once "../parks_config.php";
    require_once "../db_connect.php";

    $stmt = $dbc->query('SELECT name, location, date_established, area_in_acres FROM national_parks');
    $parks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($parks);

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
        <? endforeach; ?>
        </tr>
    </table>


</body>
</html>