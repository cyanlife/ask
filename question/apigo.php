<?php
$now_url=$_SERVER['HTTP_HOST'];

$requesturl="localhost/zs/zhidao/api.php";

//curl方式获取json数组

$curl = curl_init(); //初始化

curl_setopt($curl, CURLOPT_URL, $requesturl);//设置抓取的url

curl_setopt($curl, CURLOPT_HEADER, 0);//设置头文件的信息作为数据流输出

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//设置获取的信息以文件流的形式返回，而不是直接输出。

$data = curl_exec($curl);//执行命令

curl_close($curl);//关闭URL请求

//显示获得的数据

//print_r($data);

$obj=json_decode($data);

echo $result=$obj->success;

if ($result!=1) {
    {exit('yumingshouxian');}

}