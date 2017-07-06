<?php
echo date('Y-m-d H:i:s', strtotime('now'))."<br>";

echo date('Y-m-d H:i:s', strtotime('-1 day'))."<br>";


$current_timezone = date_default_timezone_get();
echo $current_timezone."<br>";

echo(strtotime("now") . "<br>");
echo(strtotime("15 October 1980") . "<br>");
echo(strtotime("+5 hours") . "<br>");
echo(strtotime("+1 week") . "<br>");
echo(strtotime("+1 week 3 days 7 hours 5 seconds") . "<br>");
echo(strtotime("next Monday") . "<br>");
echo(strtotime("last Sunday"));
?>