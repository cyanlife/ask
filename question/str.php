<?php
header("Content-Type: text/html; charset='UTF-8'");
/**Function test($str){
    $arr1=explode('_',$str);
    //$arr2=array_walk($arr1,ucwords( ));
    $str = implode('111',$arr1);
    return ucwords($str);
}
$aa='open_door_honey';
$arr1=explode('_',$aa);
print_r($arr1) ;
echo test($aa);

echo"<script>for (var i=0; i <4; i++) {
    setTimeout(function() {
        console.log('i: ' + i)
    }, 0)
}</script>";**/
/**
 * this is  函数中最好不使用echo 
 */
// function  a($c,$d){
//    $a=$c+$d;
//   return $a;  
    
// }

// $e=a(1,2);
// echo $e;
/**
 * 递归
 */
 
// function f1(){
//     function f2(){
//         function f3(){
//            return 'f3';
//         }
//         echo f3();
//         echo'f2';  
       
//     }
//     f2();
//     echo 'f1';
// }
// f1();

/**
 * i++不能作为左值
 */
// function a($i){
//     $i++;
//    echo $i;
// }

//  a(1);
//  $a=1;
// echo  $a++;
//  echo $a;
/**
 * 递归计算
 */
header('Content-Type:text/html;charset=utf-8');
// function recurtion($i){
//     $i++;  
//   echo ("'开始'.$i");
//     if($i<5){
//         recurtion($i);
//         echo "if 内的".$i;
//     }
// //  echo'最后输出'. $i;   

// }
// recurtion(2);
// function traverse($path) {
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


/*
 单例设计模式 (单态)
定义: 一个类 只能允许有 一个对象存在.
1.不让进: 使类不能被实例化
2.留后门: 设置静态方法
3.给对象: 在静态方法里实例化该类
4.判初夜: 判断是否是 第一次产生该类的对象
5.设静态: 静态方法里 要使用静态属性
*/

/*//1.不让进: 使类不能被实例化-----------------
 class Test
{
// 设置 一个封装的构造方法
private function __construct()
{
//占位, 我就是不让你NEW我~~~
}
}*/

/*//2.留后门: 设置静态方法--------------------
 class Test
{
// 设置 一个封装的构造方法
private function __construct()
{
//占位, 我就是不让你NEW我~~~
}
//后门
public static function getObject()
{
echo "啊,我是后门,进吧!<br>";
}
}*/

/*//3.给对象: 在静态方法里实例化该类------------------
 class Test
{
// 设置 一个封装的构造方法
private function __construct()
{
//占位, 我就是不让你NEW我~~~
}
//后门
public static function getObject()
{
echo "啊,我是后门,进吧!<br>";
return new self();//实例化一个对象给你
}
}*/

/*//4.判初夜: 判断是否是 第一次产生该类的对象------------------
 class Test
{
private $obj = null;//属性值为对象,默认为null
// 设置 一个封装的构造方法
private function __construct()
{
//占位, 我就是不让你NEW我~~~
}
//后门
public static function getObject()
{
echo "啊,我是后门,进吧!<br>";
if ($this->obj === null) {
$this->obj = new self();//实例化一个对象
}
//返回的属性 其实就是本对象
return $this->obj;
}
}*/

//5.设静态: 静态方法里 要使用静态属性------------------
class Test
{
    private static $obj = null;//属性值为对象,默认为null
    // 设置 一个封装的构造方法
    private function __construct()
    {
        //占位, 我就是不让你NEW我~~~
    }
    //后门
    public static function getObject()
    {
        echo "啊,我是后门,进吧!<br>";
        if (self::$obj === null) {
            self::$obj = new self();//实例化一个对象
        }
        //返回的属性 其实就是本对象
        return self::$obj;
    }
}

/*Test::getObject();//使用静态方法访问该类里的方法
 exit;*/

$t1 = Test::getObject();
$t2 = Test::getObject();
$t3 = Test::getObject();
$t4 = Test::getObject();
$t5 = Test::getObject();
$t6 = Test::getObject();
$t7 = Test::getObject();
$t8 = Test::getObject();

//判断 两个对象 是否是同一个对象
if ($t1 === $t6) {
    echo "哦, Yes! 是同一个实例<br>";
} else {
    echo "哦, No! 不是同一个实例<br>";
}
?>