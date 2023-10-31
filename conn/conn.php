<?php
$conn=mysqli_connect("127.0.0.1", "root", "", "xuyuanchi")
or die("连接数据库服务器失败！".mysqli_error());
mysqli_query($conn, "set names utf8");
?>