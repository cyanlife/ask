<?php
error_reporting(0);
//先判断是否是register.php 提交过来的
header("Content-Type: text/html; charset='UTF-8'");
if (isset($_POST['send'])) {
    //接收提交的数据

    //引入工具函数
    require 'include/tool.php';

    //标题，不得为空
    $re_details        =    trim($_POST['comment']);

    if (empty($re_details)) {
        alert('BUNENG WEIKONG');
    }

    //re_id
    $re_id             =    $_POST['re_id'];

    //re_title
    $re_title          =    $_POST['re_title'];
    //face
   $face              =     $_POST['face'];
    //引入数据库连接
    require 'mysql.php';


    //SQL语句
    $addSql =  "INSERT INTO reid (details, user_id, re_id,face,create_time)
                           VALUES ('$re_details', '{$_COOKIE['zhidaoid']}', '$re_id', '$face', NOW())";

    //执行SQL，成功后并跳转
    if (mysqli_query($db, $addSql)) {
        location_none('details.php?id='.$re_id);       
    }


} else {
    exit('waring exit!!!');
}
