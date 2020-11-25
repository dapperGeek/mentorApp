<?php
include 'db_config.php';
include '../models/Mentor.php';
include '../models/Mentee.php';

//user registration
if (isset($_POST['registerUser']))
{
    $level = addslashes($_POST['level']);
    $name = addslashes($_POST['name']);
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);

    $user = null;
    $result = false;

    switch ($level){
        case 1:
            $user = new Mentor($name, $username, $password);
            break;
        case 2:
            $user = new Mentee($name, $username, $password);
            break;
        default:
            return $user;
    }

    if ($user !== null)
    {
        $result = $dataOps->registerUser($level, $user->getName(), $user->getUsername(), $user->getPassword());
    }

    echo $result;
}