<?php
//先判断是否是register.php 提交过来的
if (isset($_POST['send'])) {
    //接收提交的数据

    //引入工具函数
    require 'include/tool.php';

    //标题，不得为空
    $re_details        =    trim($_POST['re_details']);

    if (empty($re_details)) {
        alert('回答不得为空！');
    }

    //re_id
    $re_id             =    $_POST['re_id'];

    //re_title
    $re_title          =    $_POST['re_title'];


    //引入数据库连接
    require 'include/mysql.php';


    //SQL语句
    $addSql =  "INSERT INTO zhidao_ask (title, details, users_id, re_id, create_time)
    VALUES ('$re_title', '$re_details', '{$_COOKIE['id']}', '$re_id', NOW())";

    //执行SQL，成功后并跳转
    if (mysqli_query($db, $addSql)) {
        location('回答发表成功！', 'details.php?id='.$re_id);
    }


} else {
    exit('非法操作');
}
