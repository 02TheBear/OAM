<?php

require 'db_info-inc.php';

$conn = mysqli_connect(
    $db_servername,
    $db_username,
    $db_password,
    $db_name
);

if (!$conn) {
    die('connection failed:' .mysqli_connect_error());
}