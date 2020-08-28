<?php
    require("linksql.php");
    $sql = "CREATE TABLE city(
        citySit varchar(20) ,
        cityName varchar(20)
        );
    ";
    mysqli_query($link , $sql);

    $sql = "CREATE TABLE nowWeather(
        weatherID int AUTO_INCREMENT PRIMARY KEY,
        citySit varchar(20) ,
        TEMP float ,
        weather varchar(20),
        upday varchar(25)
    );
    ";
    mysqli_query($link , $sql);


    $sql = "CREATE TABLE rain(
        rainID int AUTO_INCREMENT PRIMARY KEY,
        city varchar(20),
        town varchar(20),
        citySit varchar(20) ,
        hour1 varchar(20) ,
        hour24 varchar(20),
        upday varchar(25)
    );
    ";
    mysqli_query($link , $sql);


    mysqli_close($link);
?>