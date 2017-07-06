<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<title>问答系统|login</title>
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/member.css">
</head>
<body>
<?php   
require 'include/tool.php';
require 'include/config.php';
if(!isset($_COOKIE['zhidaoid'])){
  location('尚未登录','login.php');
}
require 'header.php';

require 'mysql.php';

$uid=$_COOKIE['zhidaoid'];
echo $uid;
$sql="select username, nickname,face from user where id=$uid";
$result=mysqli_query($db, $sql);?>
<div id="container">
<?php while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC)):?>  
    <div id="figure">
    <img src="img/face/<?php  echo $rows['face'] ?>.png" >
        <div class="nickname">welcome:<?php echo $rows['nickname']?></div>
    <!--  <div class="info">提问量：xx|回答量：xx</div>-->
    </div>
<?php endwhile;?>
<div ><a href="editfile.php">修改资料</a></div>
<div ><a href="publish.php">发表问题</a></div>
<?php require 'footer.php';?>