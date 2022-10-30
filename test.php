<?php

    // Our Database credentials username and passwords
    $user = "a10009243_ian";
    $pw = "Toiohomai1234";
    $db = "a10009243_database";
    
    // Database connection
    $connection = new mysqli('localhost', $user, $pw, $db);
    
    // variable that returns all records in the database
    $all_records = $connection->query("select * from scp");
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    echo "Connected successfully";
    
?>
    