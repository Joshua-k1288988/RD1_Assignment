<?php
$net = "localhost"; // 網址
$userName = "root"; // 使用者
$password = ""; // 密碼

$link = mysqli_connect($net, $userName, $password ); // , "data0818test" , 3306
if(!$link){
    die("連接失敗：" . mysqli_connect_error());
}
mysqli_query($link, "set names utf8");

$sql="CREATE DATABASE weatherDB DEFAULT CHARACTER SET utf8;";
if(mysqli_query($link, $sql)){
    echo "success!";
}else{
    echo mysqli_error($link);
}
mysqli_close($link);


?>