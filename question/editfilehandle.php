<?php  
require_once 'include/tool.php';
if(!isset($_COOKIE['zhidaoid'])){
  location('尚未登录','login.php');
}
?>
<?php
require 'include/config.php';
require 'mysql.php';
$euser=$_POST['nickname'];
$eid=$_COOKIE['zhidaoid'];
if(empty($euser)){
    alert('buneng weikong');
}
$sql="update user set nickname='$euser' where id='$eid'";
mysqli_query($db, $sql);