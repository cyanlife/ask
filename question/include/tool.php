<?php
//JavaScript弹窗提示返回
function alert($info)
{
    echo "<script>alert('$info');history.back();</script>";
    exit();
}
function location($info, $url)
{
    echo "<script>alert('$info');location.href='$url'</script>";
    exit();
}
function location_none($url){
    echo "<script>location.href='$url'</script>";
}