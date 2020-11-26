<?php
session_start();
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
    $data = [];

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
        $data = $dataOps->registerUser($level, $user->getName(), $user->getUsername(), $user->getPassword());
        setSession($data, $level);

    }

    print_r(json_encode($data));
}

//user login
if (isset($_POST['loginUser']))
{
    $level = addslashes($_POST['level']);
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);

    $result = false;
    $data = [];

    $data = $dataOps->loginUser($level, $username, $password);

    setSession($data, $level);

    print_r(json_encode($data));
}

function setSession($data, $level){
    if ($data['success'])
    {
        $_SESSION['id'] = $data['id'];
        $_SESSION['name'] = $data['name'];
        $_SESSION['auth'] = $data['auth'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['level'] = $level;
    }
}