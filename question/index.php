<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>问答系统</title>
    <link rel="stylesheet" href="css/basic.css">
    <link rel="stylesheet" href="css/index.css">
      <link rel="stylesheet" href="css/member.css">
</head>
<body>
<?php
//寮曞叆鏁版嵁搴撹繛鎺�
require 'mysql.php';
require 'include/config.php';
require 'include/tool.php';
if(!isset($_COOKIE['zhidaoid'])){
    location('尚未登录','login.php');
}
error_reporting(0);

//姣忛〉鐨勬潯鏁�
$pageSize =5;
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
$totalSql = "SELECT COUNT(*) FROM zhidao_ask";

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
$membersSql = "SELECT * FROM zhidao_ask  LIMIT $limit";

//鑾峰彇缁撴灉闆�
$result = mysqli_query($db, $membersSql);
$uid=$_COOKIE['zhidaoid'];

?>

<?php 
require 'header.php';
require 'mysql.php';
error_reporting(0);
$currentid=$_COOKIE['zhidaoid'];
?>

<div id="container">
    <div class="list">
        <div class="button">
            <a href="publish.php" class="ask">问题</a>
        </div>
        
        <?php
while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC)):
error_reporting(0);
?>
<?php 
$usql="select face from user where id='{$rows['users_id']}' LIMIT 1";
$uresult=mysqli_query($db, $usql);
$rowss=mysqli_fetch_array($uresult);
?>
        <dl class="question">
            <dt class="question_img">
                <img src="img/face/<?php  echo $rowss['face'] ?>.png" alt="" class="question_face">
            </dt>
            <dd class="question_title">
                <a href="details.php?id=<?php echo $rows['id']?>"><?php  echo $rows['title']?></a>
            </dd>
            <dd class="question_info"><em>阅读<?php echo $rows['reading']?> | 回复<?php echo $rows['comment']?></em>发表时间| <?php echo $rows['create_time']?></dd>
        </dl>
        <?php 
endwhile;
?>
    </div>
 <aside class="sidebar">
        <h2>总量：<?php echo $total?>问答汇总</h2>
        <div class="adver">
            <img src="adver.png" alt="广告">
        </div>
    </aside>
    
    
    <!-- 显示分页 -->
 <div id="page">
        <ul>
         
            
            <?php
                //首页、/-前页
                if ($page == 1) {
                    echo '<li class="first"><a href="javascript:void(0)">&lt;</a></li>';
                } else {
                    echo '<li class="first"><a href="index.php?page='.($page - 1).'">&lt;</a></li>';
                }


                //页数
                for ($i = 1; $i <= $pageAbsolute; $i++) {
                    if ($page == $i) {
                        echo '<li><a href="javascript:void(0)" class="active">'.$i.'</a></li>';
                    } else {
                        echo '<li><a href="index.php?page='.$i.'">'.$i.'</a></li>';
                    }
                }

                //末页 ==下页
                if ($page == $pageAbsolute) {
                    echo '<li class="last"><a href="javascript:void(0)">&gt;</a></li>';
                } else {
                    echo '<li class="last"><a href="index.php?page='.($page + 1).'">&gt;</a></li>';
                }
            ?>
        </ul>
    </div>
    
     
</div>
<?php require 'footer.php';?>
</body>
</html>