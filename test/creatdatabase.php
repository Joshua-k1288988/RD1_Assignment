<?php
    require("DB.php");
    $sql = "CREATE TABLE city(
        citySit varchar(20) PRIMARY KEY,
        cityName varchar(20)
        );
    ";
    mysqli_query($link , $sql);

    $sql = "CREATE TABLE nowWeather(
        weatherID int AUTO_INCREMENT PRIMARY KEY,
        citySit varchar(20) ,
        TEMP float ,
        weather varchar(20),
        upday varchar(25),
        FOREIGN KEY(citySit) REFERENCES city(citySit)
    );
    ";
    mysqli_query($link , $sql);

    $sql = "TRUNCATE `weatherDB`.`nowWeather`";
    mysqli_query($link , $sql);


    $sql = "INSERT INTO nowWeather (`citySit`) VALUES
    ('基隆'),
    ('臺北'),
    ('板橋'),
    ('新屋'),
    ('香山'),
    ('新竹'),
    ('苗栗'),
    ('臺中'),
    ('田中'),
    ('日月潭'),
    ('四湖'),
    ('嘉義'),
    ('阿里山'),
    ('臺南'),
    ('高雄'),
    ('恆春'),
    ('宜蘭'),
    ('花蓮'),
    ('臺東'),
    ('澎湖'),
    ('金門'),
    ('馬祖');
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