<?php  
require 'include/tool.php';
if(!isset($_COOKIE['zhidaoid'])){  
    alert('weidenglu');
}
?>

<?php
//寮曞叆鏁版嵁搴撹繛鎺�
require 'mysql.php';

$idd=$_COOKIE['zhidaoid'];
//姣忛〉鐨勬潯鏁�
$pageSize =4;
//褰撳墠椤电爜
$page = 1;

//鎬婚〉鐮佸垵濮嬩负1
$pageAbsolute = 1;

//鍏堝垽鏂璸age 鏄惁瀛樺湪
if (isset($_GET['page'])) {
    //灏嗗緱鍒扮殑椤电爜璧嬪�肩粰鍙橀噺
    $page = $_GET['page'];

    //濡傛灉椤甸潰鍊间负绌烘垨灏忎簬闆舵垨涓嶆槸鏁板瓧锛屽垯榛樿涓�1
    if (empty($page) || $page <= 0 || !is_numeric($page)) {
        $page = 1;
    } else {
        $page = intval($page);
    }
}

//鎬昏褰曟暟鐨凷QL
$totalSql = "SELECT COUNT(*) FROM user";

//寰楀埌鎬昏褰曟暟
$total = mysqli_fetch_array(mysqli_query($db, $totalSql))[0];

//寰楀埌鎬婚〉鐮�
if ($total != 0) {
    $pageAbsolute = ceil($total / $pageSize);
}

//璁＄畻褰撳墠椤电爜鍦ㄤ粠绗嚑鏉″紑濮�
$num = ($page - 1) * $pageSize;

//缁勫悎鎴怢IMIT
$limit = "$num, $pageSize";

//鑾峰彇鐢ㄦ埛鍒楄〃鐨凷QL
$membersSql = "SELECT nickname,face,id FROM user  LIMIT $limit";

//鑾峰彇缁撴灉闆�

$result = mysqli_query($db, $membersSql);

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<title>问答系统|login</title>
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/basic.css">
<link rel="stylesheet" href="css/member.css">
</head>
<body>
<?php   
require 'header.php';
require 'mysql.php';
echo $page;
?>
<div id="container">
<!--轮询显示  -->
<?php 
while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC)):
?>

<?php 

?>
<div id="figure">
<img src="img/face/<?php  echo $rows['face'] ?>.png" >
<div class="nickname">昵称:<?php echo $rows['nickname']?></div>
<div class="info">提问量：<?php
$postSql="select count(*) from zhidao_ask where users_id='{$rows['id']}'";
$ptotal = mysqli_fetch_array(mysqli_query($db, $postSql))[0];
echo $ptotal?>|回答量：xx</div>
</div>
<?php endwhile;  ?>
</div>
<!-- 显示分页 -->
 <div id="page">
        <ul>
         
            
            <?php
                //首页、/-前页
                if ($page == 1) {
                    echo '<li class="first"><a href="javascript:void(0)">&lt;</a></li>';
                } else {
                    echo '<li class="first"><a href="members.php?page='.($page - 1).'">&lt;</a></li>';
                }


                //页数
                for ($i = 1; $i <= $pageAbsolute; $i++) {
                    if ($page == $i) {
                        echo '<li><a href="javascript:void(0)" class="active">'.$i.'</a></li>';
                    } else {
                        echo '<li><a href="members.php?page='.$i.'">'.$i.'</a></li>';
                    }
                }

                //末页 ==下页
                if ($page == $pageAbsolute) {
                    echo '<li class="last"><a href="javascript:void(0)">&gt;</a></li>';
                } else {
                    echo '<li class="last"><a href="members.php?page='.($page + 1).'">&gt;</a></li>';
                }
            ?>
        </ul>
    </div>

<?php 
require 'footer.php';
?>
</body>

</html>