<?php
if(isset($_POST['lsubmit'])){
require 'mysql.php';
require 'include/config.php';
require 'include/tool.php';
$username=trim($_POST["username"]);
$password=sha1(SALT.$_POST["password"]);
$sql="select id,nickname from user where username='$username' and password='$password' LIMIT 1";
$result=mysqli_query($db, $sql);
if($rows=mysqli_fetch_array($result,MYSQLI_ASSOC)){
    echo "welcome admin".$username;
    echo $password;
    if(isset($_POST['state'])){
        setcookie('zhidaoid',$rows['id'],time()+60*60*24);
        setcookie('zhidaoname',$rows['nickname'],time()+60*60*24);
    }else{
        setcookie('zhidaoid',$rows['id']);
        setcookie('zhidaoname',$rows['nickname']);
    }
   location('login success','./');
}else{
    
   alert('input the wrong username');
}
}else{
    require 'include/tool.php';
    alert('please login');
}