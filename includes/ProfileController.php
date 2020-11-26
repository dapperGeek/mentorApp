<?php

include 'models/Mentor.php';
include 'models/Mentee.php';
include 'models/Assignment.php';

$myMentees = $dataOps->getMyMentees($_SESSION['id']);