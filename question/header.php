<header id="header">
<div class="center" >
<h1 class="logo">问答系统</h1>
<nav class="link" >
<ul>
<li><a href="index.php">首页</a></li>
<li><a href="user.php">用户</a></li>
<li><a href="">搜索</a></li>

  <?php if (isset($_COOKIE['zhidaoid'])):?>
                <li><a href="members.php">个人<span class="sm-hidden">中心</span></a></li>
                <li><a href="logout.php">退出</a></li>
                <?php else:?>
               <li><a href="login.php">登录</a></li>
               <li><a href="reg.php">注册</a></li>
                <?php endif;?>
</ul>
</nav>
</div>
</header>