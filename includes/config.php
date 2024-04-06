<?php

define("BASE_DIR", $_SERVER['DOCUMENT_ROOT'] . "/StayCation");
define("BASE_URL", "/StayCation");

date_default_timezone_set('Asia/Kolkata');

$connection = mysqli_connect("localhost", "root", "", "staycation");

function pathOf($path)
{
    return BASE_DIR . "/" . $path;
}

function urlOf($path)
{
    return BASE_URL . '/' . $path;
}

session_start();
