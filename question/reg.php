<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<title>问答系统</title>
<link rel="stylesheet" href="css/index.css">
</head>

<header id="header">
<div class="center" >
<h1 class="logo">问答系统</h1>
<nav class="link" >
<ul>
<li><a href="index.php">首页</a></li>
<li><a href="">用户</a></li>
<li><a href="">搜索</a></li>
<li><a href="login.php">登录</a></li>
<li><a href="reg.php">注册</a></li>
</ul>
</nav>
</div>
</header>
<body>
<div id="container">
<form action="reghandle.php" method="post" class="form">
<label><input type="text" name="username"  class="text" placeholder="input the username"></input></label>
<label><input type="text" name="password" placeholder="input the password" class="text"></input></label>
<label><input type="text" name="repassword" placeholder="confirm the repassword" class="text"></input></label>
<label><input type="text" name="nicname" placeholder="your name" class="text"></input></label>
<label>
<select name="photo" class="text">
<option >请选择</option>
<option value="1">头像1</option>
<option value="2">头像2</option>
<option value="3">头像3</option>
<option value="4">头像4</option>
<option value="5">头像5</option>
</select>
</label><!--  -->
<label><input type="submit" value="submit" class="text" name="send"></input></label>
</form>
</div>
</body>
<footer id="footer">
<div class="bottom">bottom</div>

</footer>
</html>