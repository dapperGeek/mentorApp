<?php
//include '../models/Mentor.php';
//include '../models/Mentee.php';

//user registration
if (isset($_POST['registerUser']))
{
    $name = $_POST['name'];
    $level = $_POST['level'];
    $password = $_POST['password'];

    echo $password;
}