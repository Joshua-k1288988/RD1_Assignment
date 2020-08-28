<?php
    require("linksql.php");
    $sql = "CREATE TABLE twodays(
        CITY varchar(20),
        startTime varchar(25),
        endTime varchar(25),
        report varchar(200)
    );
    ";
    mysqli_query($link , $sql);

    $sql = "TRUNCATE `weatherDB`.`twodays`";
    mysqli_query($link , $sql);

    $sql = "CREATE TABLE week(
        CITY varchar(20),
        startTime varchar(25),
        endTime varchar(25),
        report varchar(200)
    );
    ";
    mysqli_query($link , $sql);

    $sql = "TRUNCATE `weatherDB`.`week`";
    mysqli_query($link , $sql);

    mysqli_close($link);
?>