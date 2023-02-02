<?php 

$host = 'localhost';
$port = '65313';
$user = 'postgres';
$pass = 'ardhan';
$dbname = 'db_campus';

$db = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");

if(!$db){
    echo "Error 0" . pg_last_error();
}