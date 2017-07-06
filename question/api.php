<?php

$now_url="localhost";

$success = '';

$output = array();

$url = @$_GET['localhost'] ? $_GET['localhost'] : '';//根据需要自行设置

$con = mysql_connect("localhost","root","");

if (!$con)

{

    die('Could not connect: ' . mysql_error());

}

mysql_select_db("zhidao", $con);

//SQL语句可忽略，按自己需求随意发挥，开心就好

$sql="SELECT id,face FROM user where username='13641056686'";

$result = mysql_query($sql);

if(!$result)

{

    die("Valid result!");

}

while($row = mysql_fetch_array($result,MYSQL_ASSOC))

{

    if (!empty($row)) {

        $success = '1';

    }

    else{

        $success='0';

    }

    // 返回json数据，或者字符串，数字。

    $json = array('success' =>$success);

    echo json_encode($json);

    //echo "
    //var_dump($row);

    //mysql_free_result($rs);

}

mysql_close($con);
