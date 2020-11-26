<?php
include 'models/Mentor.php';
include 'models/Mentee.php';
include 'models/Assignment.php';

$myMentors = $dataOps->getAssignedMentors($_SESSION['id']);