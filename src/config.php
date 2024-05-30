<?php
    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'gymdb';

    $connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    // validation if database connection with successfully

    // if ($connection -> connect_errno) {
    //     echo "error connection server";
    // } else {
    //     echo "connection made successfully";
    // }
?>