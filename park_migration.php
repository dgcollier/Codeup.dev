<?php

    define("DB_HOST", '127.0.0.1');
    define("DB_NAME", 'parks_db');
    define("DB_USER", 'parks_user');
    define("DB_PASS", '');

    require_once 'db_connect.php';

    echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

    $dropIf = "DROP TABLE IF EXISTS national_parks";

    $dbc->exec($dropIf);

    $addTable = "CREATE TABLE national_parks (
        id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        name VARCHAR(20) NOT NULL,
        location VARCHAR(30) NOT NULL,
        date_established DATE NOT NULL,
        area_in_acres DOUBLE NOT NULL,
        PRIMARY KEY (id))";

    $dbc->exec($addTable);