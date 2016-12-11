<?php
$hostname = "49.168.88.23";
$username = "root";
$password = "jhkwon";
$dbname = "ssm_project";

$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다");
$result = mysql_select_db($dbname,$connect);

if($result) {
     echo("MySQL Server Connect 성공");
}
else {
     echo("MySQL Server Connect 실패");
}

mysql_close($connect);
 
?>