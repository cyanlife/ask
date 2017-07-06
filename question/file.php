<!-- <html> -->
<!--     <body> -->
        <?php
//             function traverse($path) {
//                 $current_dir = opendir($path);    //opendir()返回一个目录句柄,失败返回false
//                 while(($file = readdir($current_dir)) !== false) {    //readdir()返回打开目录句柄中的一个条目
//                     $sub_dir = $path . DIRECTORY_SEPARATOR . $file;    //构建子目录路径
//                     if($file == '.' || $file == '..') {
//                         continue;
//                     } else if(is_dir($sub_dir)) {    //如果是目录,进行递归
//                         echo 'Directory ' . $file . ':<br>';
//                         traverse($sub_dir);
//                     } else {    //如果是文件,直接输出
//                         echo 'File in Directory ' . $path . ': ' . $file . '<br>';
//                     }
//                 }
//             }

//             traverse('D:/wamp/www/zs/zhidao');
//         ?>
<!--     </body> -->
<!-- </html> -->
        <?php  
header('Content-Type:text/html;charset=utf-8');
        ?>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bgcolor="#ABCEDF">
<tr>
<td>编号</td><td>文件名</td><td>类型</td><td>文件大小</td><td>创建时间</td><td>修改时间</td><td>操作</td>
</tr>
<?php 
global $PH;
$PH='./';
if(!empty($_REQUEST['act'])&&$_REQUEST['act']=='indir'){
	$path = $_REQUEST['inin'];
	$path = dirname($_SERVER['PHP_SELF']).$path;
	$path = '.'.$path;
	$PH = $path;
	$dataz = cycledir($path);
}else{
 $dataz = cycledir();
 }
/*
 *把二位数组合并成一位数组
 * */
$data1=!empty($dataz['file'])?$dataz['file']:'';
$data2=!empty($dataz['dir'])?$dataz['dir']:'';
if(empty($dataz['file'])){
$data = array_values($data2);	
}
elseif (empty($dataz['dir'])) {
$data = array_values($data1);
}else{
$data = array_merge_recursive($data1,$data2);
$data = array_values($data);
}
if(!empty($_REQUEST['act'])&&$_REQUEST['act']=='look'){
	$id = $_REQUEST['id'];
	$path = $data[$id];
	$text =	viewtext($path);
	$text2 = <<<EOF
<textarea disabled="disabled" cols="100" rows="7" style="background:pink">{$text}</textarea>
EOF;
	echo $text2;
}elseif(!empty($_REQUEST['act'])&&$_REQUEST['act']=='modify'){
	$id = $_REQUEST['id'];
	$path = $data[$id];
	$text =	viewtext($path);
	$text2 = <<<EOF
	<form action="index.php" method="post">
	<input type="hidden" name="id" value="{$id}">
<textarea cols="100" rows="7" style="background:pink" name="modify">{$text}</textarea><br />

<input type="submit" value="修改" style="width:200px;height:40px;line-height:40px;font-size:27px;">
</form>
EOF;
echo $text2;
	}elseif(!empty($_REQUEST['act'])&&$_REQUEST['act']=='rename'){
		$id = $_REQUEST['id'];
		 $text = $data[$id];
		var_dump($data);
		$text2 = <<<EOF
<form action="index.php" method="post">
<input type="text" value="{$text}" name="newname"/></br>
<input type="hidden" name="id" value="{$id}" />
<input type="submit" value="修改"/>|<input type="reset"/>
</form>
EOF;
echo $text2;
}elseif(!empty($_REQUEST['act'])&&$_REQUEST['act']=='unlink'){
	$id = $_REQUEST['id'];
	$path =	$data[$id];
	if(unlink($path)){
		promp("删除成功",'index.php');
	}else{
		promp("删除失败",'index.php');
	}
}
	if(!empty($_REQUEST['modify'])){
		$id = $_REQUEST['id'];
	if(file_put_contents($data[$id],$_REQUEST['modify'])){
	promp('修改成功','index.php');
	}else{
		promp('修改失败','index.php');
	}
	}
	if(!empty($_REQUEST['newname'])){
	$id = $_REQUEST['id'];
		echo $oldname =	$data[$id];
		echo $nowname = $_REQUEST['newname'];
		renme($oldname,$nowname);
}
		
$i=1;
foreach( $data as $values ){
?>
<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $values ?></td>
		<td><?php if(in_array($values,$dataz['file'])){
			echo '文件';
		}else{
			echo '文件夹';
		} ?></td>
		<td><?php 
		if(in_array($values,$dataz['file'])){
			$path = $PH.''.$values;
			echo changesize(filesize($path));
		}else{
			echo '文件夹没大小';
		} ?></td>
		<td><?php echo date("Y-m-d H:i:s",filectime($path)) ?></td>
		<td><?php echo date("Y-m-d H:i:s",filemtime($path)) ?></td>
		<td><?php 
		if(in_array($values,$dataz['file'])){
			?>
			<a href="<?php echo $path ?>" >查看</a>
			<a href="index.php?act=modify&id=<?php echo $i-1 ?>" >修改</a>
			<a href="index.php?act=rename&id=<?php echo $i-1 ?>">重命名</a>
			<a href="index.php?act=unlink&id=<?php echo $i-1 ?>">删除</a>
			复制 下载
			<?php
		}else{?>
         <a href="index.php?act=indir&inin=<?php $id=$i-1; echo $data[$id] ?>">进入文件夹</a> 
		<a href="index.php?act=rename&id=<?php echo $i-1 ?>">重命名</a> 
		<a href="index.php?act=unlink&id=<?php echo $i-1 ?>">删除</a>
		 复制
		<?php } ?>
		</td>
</tr>
<?php 
	$i++;
}  ?>
</table>
<?php
/*
 *输入路径
  输出遍历文件和目录
 * */
function cycledir($path='./'){
$dir = opendir($path);
while(($rdir=readdir($dir))!==false){
	if(is_file($path.'/'.$rdir)){
		$dataz['file'][]=$rdir;}
	if(is_dir($path.'/'.$rdir)&&$rdir!='.'&&$rdir!='..'){
		$dataz['dir'][]=$rdir;}
}
return $dataz;
}
/*
加上适当的单位
*/
function changesize($size){
 $unit = array('B','KB','MB','GB','TB','PB','EB');
 $i=0;
 while($size>1024){
	 $size/=1024;
	 $i++;
 }
 if($i==0){
	 $ssize = $size.$unit[$i]; 
 }else{
 $size = numtwo($size);
 $ssize = $size.$unit[$i];
 }
echo $ssize;
}
/*
取小数点后两位
*/
function numtwo($num){
	$afnum = strstr($num,'.');
	$afnum = substr($afnum,1,2);
	$bfnum = strstr($num,'.',true);
	$bnum = $bfnum.'.'.$afnum;
	return $bnum;
}
/*
传入路径，查看文件内容
*/
function viewtext($path){
	$data = file_get_contents($path);
	return $data;
}
/*
提示操作的成功或者失败
*/
function promp($txt,$path){
echo <<<EOF
<script type="text/javascript">
alert('{$txt}');location.href="{$path}";
</script>
EOF;
}
/*
重命名
*/
function renme($oldname,$newname){
	if(rename($oldname,$newname)){
	promp("重命名成功",'index.php');
	}else{
		promp("重命名失败",'index.php');
	}
	
}