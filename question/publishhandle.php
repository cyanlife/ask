<?php
require 'mysql.php';
require 'include/config.php';
require 'include/tool.php';
header("Content-Type: text/html; charset='UTF-8'");
if(!isset($_COOKIE['zhidaoid'])){
    alert('weidenglu');
}
?>
<!--  <!DOCTYPE html>
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
-->
<?php
require 'mysql.php';
header("Content-Type: text/html;charset=utf-8");
$questiont=$_POST['questionTitle'];
$questiond=$_POST['questionDetails'];
$id=$_COOKIE['zhidaoid'];
//echo empty($_POST['questionTitle']);
if(isset($_POST['send'])){
    if(empty($_POST['questionTitle'])||empty($_POST['questionDetails'])){       
        alert("不能为空");
    } 
    if(strlen($questiont)>50){
        alert(strlen($questiont)."长度太长");
    }
    $sql="insert into zhidao_ask(title,details,users_id,create_time)values('$questiont','$questiond','$id',NOW()) ";
    //mysqli_query($db, $sql);
    if (mysqli_query($db, $sql)) {
        location('问题发表成功！', './');        
    } else {
        exit('非法操作');
    }
}else {    
location('wrong', 'login.php');  
}
?>