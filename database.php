<?php

$connect = mysqli_connect("localhost", "root", "", "jbp"); // fill out database name

if (!$connect) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}

return $connect;
