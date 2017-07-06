<?php
require 'mysql.php';
$sql="select count(*) from user";
$result=mysqli_fetch_array(mysqli_query($db, $sql))[0];
//print_r($result);
echo $result."</BR>";

echo $_SERVER['PHP_SELF']."</BR>";

echo ceil($result/4);

