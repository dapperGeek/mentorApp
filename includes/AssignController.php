<?php
if (file_exists('models/Mentor.php'))
{
    include 'models/Mentor.php';
    include 'models/Mentee.php';
    include 'models/Assignment.php';
}
else
{
    include '../models/Mentor.php';
    include '../models/Mentee.php';
    include '../models/Assignment.php';
}

if (!isset($dataOps))
{
    include '../includes/db_config.php';
}


if (isset($_POST['assignMentor']))
{
    $mentorID = $_POST['mentorID'];
    $menteeID = $_POST['menteeID'];

    $assignment = new Assignment($mentorID, $menteeID);

    $result = false;
    $data = [];

    print_r(json_encode($dataOps->assignMentor($assignment)));
}



