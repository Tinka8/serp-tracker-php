<?php

// Database configuration
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'matejvolesini';
$dbname = 'serp-tracker-php';

// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

    return false;
}