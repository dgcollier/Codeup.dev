<?php

    require_once 'parks_config.php'; //configs for db
    require_once 'db_connect.php'; //db connection

    echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . PHP_EOL;

    $truncate = 'TRUNCATE national_parks';

    $dbc->exec($truncate);

    $parks = [
        ['name' => 'Acadia', 'location' => 'ME', 'date_established' => '1919-02-26', 'area_in_acres' => 47389.67],
        ['name' => 'Arches', 'location' => 'UT', 'date_established' => '1988-10-31', 'area_in_acres' => 9000.00],
        ['name' => 'Badlands', 'location' => 'SD', 'date_established' => '1978-11-10', 'area_in_acres' => 242755.94],
        ['name' => 'Big Bend', 'location' => 'TX', 'date_established' => '1944-06-12', 'area_in_acres' => 801163.21],
        ['name' => 'Carlsbad Caverns', 'location' => 'NM', 'date_established' => '1930-05-14', 'area_in_acres' => 46766.45],
        ['name' => 'Crater Lake', 'location' => 'OR', 'date_established' => '1902-05-22', 'area_in_acres' => 183224.05],
        ['name' => 'Denali', 'location' => 'AL', 'date_established' => '1917-02-26', 'area_in_acres' => 4740911.72],
        ['name' => 'Everglades', 'location' => 'FL', 'date_established' => '1934-05-30', 'area_in_acres' => 1508537.90],
        ['name' => 'Glacier', 'location' => 'MT', 'date_established' => '1910-05-11', 'area_in_acres' => 1013572.41],
        ['name' => 'Olympic', 'location' => 'WA', 'date_established' => '1938-06-29', 'area_in_acres' => 922650.86]
    ];

    foreach ($parks as $park) {
        $query = "INSERT INTO national_parks(name, location, date_established, area_in_acres) VALUES (
            '{$park['name']}', '{$park['location']}', '{$park['date_established']}', '{$park['area_in_acres']}')";

        $dbc->exec($query);

        echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
        
    }