<?php
    define('host', 'localhost');
    define('username', 'geek0');
    define('password', 'd3Vp@$$w0Rd!');
    define('database', 'faculty');

    $connection = new mysqli(host, username, password, database) or die('Cannot connect to server');

    include 'DataOps.php';
    $dataOps = new DataOps($connection);