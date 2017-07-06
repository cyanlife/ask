<?php
    //寮曞叆宸ュ叿鍑芥暟
    require 'include/tool.php';

    if (isset($_COOKIE['zhidaoid'])) {
        alert('the user has login');
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

<?php   

require 'header.php';
?>
<body>
<div id="container">
<form class="form" action="loginhandle.php" method="post">
<label><input type="text" name="username"  class="text"   placeholder="输入账号"></input></label>
<label><input type="password" name="password" placeholder="输入密码" class="text"></input></label>
<label><input type="checkbox" name="state" class="text" value="记住登录状态"></input></label>
<lable><input name="lsubmit" type="submit" value="submit" class="text"></input></lable>
</form>
</div>
</body>
<footer id="footer">
<div class="bottom">bottom</div>

</footer>
</html>