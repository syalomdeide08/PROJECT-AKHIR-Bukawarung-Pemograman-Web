<?php
$hostname = 'sql310.epizy.com';
$username = 'epiz_28828713';
$password = '25yXXxl2e9s';
$dbname = 'epiz_28828713_db_bukawarung';

$conn = mysqli_connect($hostname, $username, $password, $dbname);
 if (!$conn){
     echo "Gagal terhubung ke database";
 }