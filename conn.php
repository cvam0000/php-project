<?php
$dbServername="localhost";
$dbUsername="root";
$dbPassword="";
$dbname="project1";
//connection to the server and select hte database
$conn=mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
