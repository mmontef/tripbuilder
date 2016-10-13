<?php
// Opens a connection to the database

/*
Command that gives the database user the least amount of power
as is needed.
GRANT INSERT, SELECT, DELETE, UPDATE ON tripbuilder 
TO 'tripbuilder'@'localhost' 
IDENTIFIED BY 'trip';
SELECT : Select rows in tables
INSERT : Insert new rows into tables
UPDATE : Change data in rows
DELETE : Delete existing rows (Remove privilege if not required)
*/

// Defined as constants so that they can't be changed
DEFINE ('DB_USER', 'tripbuilder');
DEFINE ('DB_PASSWORD', 'trip');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'tripbuilder');

// $conn will contain a resource link to the database
// @ keeps the error from showing in the browser

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
mysqli_set_charset($mysqli,"utf8");

?>