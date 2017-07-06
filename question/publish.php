<?php  
require 'include/tool.php';
if(!isset($_COOKIE['zhidaoid'])){  
    alert('weidenglu');
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
<body>
<?php require 'header.php';?>
<div id="container">
<form action="publishhandle.php" method="Post" class="form"> 
<label><input type="text" name="questionTitle"  class="text"  placeholder="input the question title"></input></label>
<!--  <label><input type="text" name="questionDetails"  class="textarea" placeholder="input the question details"><textarea name="questionDetails"></textarea></input></label>-->
<label><textarea name="questionDetails" class="textarea"></textarea></label>
<label><input type="submit" value="提交问题" class="text" name="send"></input></label>
</form>
</div>
</body>
<?php require 'footer.php';?>