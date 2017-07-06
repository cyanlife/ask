<?php
//引入工具函数
session_start();
require 'include/tool.php';
header("Content-Type: text/html; charset=UTF-8");
//先判断是否有id 传递过来
if (!isset($_GET['id']) || empty($_GET['id'])) {
    alert('非法操作！');
}

$_SESSION['cartt'][$_GET['id']]['num']='num'.$_GET['id'];
$_SESSION['cartt'][$_GET['id']]['price'.$_GET['id']]=10000+$_GET['id'];

//引入数据库函数
require 'mysql.php';

//验证问题SQL
$askSql = "SELECT title,details,users_id,reading,comment,create_time FROM zhidao_ask WHERE id='{$_GET['id']}'";

$result = mysqli_query($db, $askSql);

if ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    //查找到数据，就累计+1

    //累加SQL
    $updateSql = "UPDATE zhidao_ask SET reading=reading+1 WHERE id='{$_GET['id']}'";

    //执行累加
    mysqli_query($db, $updateSql);
} else {
    //没数据，就返回报错
    alert('不存在的问题！');
}

//获取用户数据

//获取用户信息的SQL
$usersSql = "SELECT nickname,face FROM user WHERE id='{$rows['users_id']}'";
$reusersSql = "SELECT nickname,face FROM user WHERE id='{$_COOKIE['zhidaoid']}'";
//获取数据数组
$usersArray = mysqli_fetch_array(mysqli_query($db, $usersSql), MYSQLI_ASSOC);
$reusersArray = mysqli_fetch_array(mysqli_query($db, $reusersSql), MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<title>问答系统</title>
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/basic.css">
</head>
<?php include_once 'header.php';?>
<body>

<div id="container">

    <div class="list">
        <dl class="question">
            <dt class="question_img">
                <img src="img/face/<?=$usersArray['face']?>.png" alt="<?=$usersArray['nickname']?>" class="question_face">
            </dt>
            <dd class="question_title">
                <h1><?=$rows['title']?></h1>
            </dd>
            <dd class="question_info"><em>阅:<?=$rows['reading']?> | 评:<?=$rows['comment']?></em><?=$usersArray['nickname']?> | <?=$rows['create_time']?></dd>
        </dl>
        <div class="content">
            <?=nl2br($rows['details'])?>
        </div>


        <div class="re">
        <form action="comment.php" method="post" class="form">
        <input type="hidden" name="re_id" value="<?=$_GET['id']?>">
          <input type="hidden" name="face" value="<?=$reusersArray['face']?>">
            <input type="hidden" name="re_title" value="RE:<?=$rows['title']?>">
       <textarea class="textarea" name="comment"></textarea>
        <input type="submit" name="send" value="回复" class="text"></input>
        </form>
        </div>
<?php 
$re_sql="select * from reid where re_id='{$_GET['id']}' order by create_time";
$re_result=mysqli_query($db, $re_sql);
while($re_rows=mysqli_fetch_array($re_result,MYSQLI_ASSOC)):
?>
<dl class="question">
         <dt class="question_img">
                <img src="img/face/<?=$re_rows['face']?>.png" alt="<?=$re_rows['user_id']?>" class="question_face">
            </dt>
            <dd class="question_title">
                <a " target="_blank"><?php  echo $re_rows['details']?></a>
            </dd>
       <dd class="question_time">
                <a " target="_blank"><?php  echo $re_rows['create_time']?></a>
            </dd>
        </dl>


<?php 

endwhile;

?>

    </div>
    <aside class="sidebar">
        <h2>热门问题</h2>
           <?php
$hsql="select * from zhidao_ask order by reading desc limit 10";
$result=mysqli_query($db, $hsql);
while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC)):
error_reporting(0);
?>
<dl class="question">
            <dt class="question_img">
                <img src="img/face/<?php  echo $rowss['face'] ?>.png" alt="" class="question_face">
            </dt>
            <dd class="question_title">
                <a href="details.php?id=<?php echo $rows['id']?>" target="_blank"><?php  echo $rows['title']?></a>
            </dd>
            <dd class="question_info"><em>阅读<?php echo $rows['reading']?> | 回复<?php echo $rows['comment']?></em>发表时间| <?php echo $rows['create_time']?></dd>
        </dl>

<?php endwhile;?>
    </aside>
</div>

</body>
<?php include_once 'footer.php';?>
</html>