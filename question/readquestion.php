<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<title>问答系统|login</title>
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/basic.css">
<link rel="stylesheet" href="css/member.css">
</head>
<body>
<?php   
require 'header.php';
require 'mysql.php';
$currentid=$_COOKIE['zhidaoid'];
$sql="select count(*) from zhidao_ask where users_id=$currentid";
//$result=mysqli_query($db, $sql);
$total = mysqli_fetch_array(mysqli_query($db, $sql))[0];
//$row=mysqli_fetch_array($result);
?>
<div id="container" style="margin-top:100px;">
<?php  
echo $total;

?>
</div>