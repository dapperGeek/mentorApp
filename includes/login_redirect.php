<?php
if (isset($_SESSION['id']))
{
    $url = $_SESSION['level'] == 1 ? 'profile.php' : 'mProfile.php';
    header("Location: $url");
}