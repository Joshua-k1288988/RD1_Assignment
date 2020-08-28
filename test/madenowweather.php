<?php
    require("DB.php");

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

    mysqli_close($link);
?>