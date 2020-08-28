<?php
    $citylist1 = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/C-B0074-001?Authorization=CWB-343CA766-1C35-4214-AEC4-F01300ADCE59&format=JSON&status=%E7%8F%BE%E5%AD%98%E6%B8%AC%E7%AB%99", "rb");
    $cityList2 = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/C-B0074-002?Authorization=CWB-343CA766-1C35-4214-AEC4-F01300ADCE59&format=JSON&status=%E7%8F%BE%E5%AD%98%E6%B8%AC%E7%AB%99", "rb");
  
    $city1 = "";
    $city2 = "";

    while(!feof($citylist1)){
        $city1 .= fread($citylist1, 500000);
      }
    fclose($citylist1);

    while(!feof($cityList2)){
        $city2 .= fread($cityList2, 500000);
    }
    fclose($cityList2);

    $city1 = json_decode($city1);
    $city2 = json_decode($city2);

    require("linksql.php");

    $sql = "TRUNCATE `weatherDB`.`city`;";
    mysqli_query($link , $sql);
    foreach($city1->records->data->stationStatus->station as $key => $value){
        // echo $value->countyName . "<br>" . $value->stationName . "<hr>";
        $sql = "INSERT INTO city VALUES
        ('$value->stationName', '$value->countyName')
        ;
        ";
        mysqli_query($link , $sql);
    }

    foreach($city2->records->data->stationStatus->station as $key => $value){
        // echo $value->countyName . "<br>" . $value->stationName . "<hr>";
        $sql = "INSERT INTO city VALUES
        ('$value->stationName', '$value->countyName')
        ;
        ";
        mysqli_query($link , $sql);
    }


    // require("DB.php");
    // $sql = "update rain set
    
    // ;
    // ";
    // mysqli_query($link , $sql);
    mysqli_close($link);


?>