<?php
$img = imagecreatetruecolor(100, 40);
$black = imagecolorallocate($img, 0x00, 0x00, 0x00);
$green = imagecolorallocate($img, 0x00, 0xFF, 0x00);
$white = imagecolorallocate($img, 0xFF, 0xFF, 0xFF);
imagefill($img,0,0,$green);
//生成随机的验证码
$code = '';
for($i = 0; $i < 5; $i++) {
    $code .= rand(0, 9);
}
//echo $code ;
imagestring($img, 5, 10, 10, $code, $black);
//加入噪点干扰
for($i=0;$i<500;$i++) {
  imagesetpixel($img, rand(0, 100) , rand(0, 100) , $black); 
  imagesetpixel($img, rand(0, 100) , rand(0, 100) , $white);
}
//输出验证码
header("content-type: image/png");
imagepng($img);
imagedestroy($img);