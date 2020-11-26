<?php
session_start();
session_destroy();

//$host= "http://localhost/TenauiCRM/";
unset($_SESSION);
header('location: index.php');
