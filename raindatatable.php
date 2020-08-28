<?php
    $citylist1 = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0002-001?Authorization=CWB-343CA766-1C35-4214-AEC4-F01300ADCE59&format=JSON&elementName=RAIN,HOUR_24", "rb");
  
    $city1 = "";

    while(!feof($citylist1)){
        $city1 .= fread($citylist1, 500000);
      }
    fclose($citylist1);

    $city1 = json_decode($city1);
    // var_dump($city1);
    require("linksql.php");
    $sql = "TRUNCATE `weatherDB`.`rain`;";
    mysqli_query($link , $sql);
    
    foreach($city1->records->location as $key => $value){
        $CITY = $value->parameter[0]->parameterValue;
        $TOWN = $value->parameter[2]->parameterValue;
        $CITYSIT = $value->locationName;
        // echo $value->countyName . "<br>" . $value->stationName . "<hr>";
        $sql = "INSERT INTO rain (city, town, citySit) VALUES
        ('$CITY', '$TOWN', '$CITYSIT')
        ;
        ";
        mysqli_query($link , $sql);
    }

    mysqli_close($link);


?>