<?php
require 'include/tool.php';
require 'mysql.php';
require 'include/config.php';
if(isset($_POST["send"])){
    $accounts  =    trim($_POST['username']);   
    if (!preg_match('/^([\w\.-]+)@([a-z0-9-]+)\.([a-z]{2,4})|1[34578]{1}\d{9}$/i', $accounts)) {
        alert('type is wrong');
    }
$name=$_POST["username"];
$password=$_POST["password"];
$pass=sha1(SALT.$password);
$repassword=$_POST["repassword"];
$nicname=$_POST["nicname"];
$photo=$_POST["photo"];
$accountsql="select id from user where username='$name' LIMIT 1";
$result=mysqli_query($db, $accountsql);
if (mysqli_fetch_array($result)){
    alert("账号已存在");
}
$sql= "insert into user(username, password, nickname, face, create_time) VALUES ('$name', '$pass', '$nicname', '$photo', NOW())";//插入数据
mysqli_query($db, $sql);
}else{
    echo "<script >alert('wrong');</script>";
    
}
/**if(mysqli_query($db,$sql)){
    echo "<script>alert('success!');window.location.href='reg.php';</script>";
}else{
    echo "<script>alert('false!');window.location.href='reg.php';</script>";
}**/