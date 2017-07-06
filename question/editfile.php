<?php  
require 'include/tool.php';
if(!isset($_COOKIE['zhidaoid'])){
  location('未登录','login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<title>问答系统|login</title>
<link rel="stylesheet" href="css/index.css">
</head>
<?php require 'header.php';?>
<body>
<div id="container">
<form action="editfilehandle.php" method="post" class="form">
<lable><input type="text" name="username" placeholder="帐号" class="text"></lable>
<lable><input type="text" name="password" placeholder="密码" class="text"></lable>
<lable><input type="text" name="nickname" placeholder="昵称" class="text"></lable>
<lable><input type="submit" name="submit" value="提交修改" class="text"></lable>
</form>
</div>
</body>
<?php require 'footer.php'; ?>