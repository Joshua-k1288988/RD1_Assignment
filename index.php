<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>個人氣象站</title>
</head>
<body>


<?php
$datelist = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-C0032-001?Authorization=CWB-343CA766-1C35-4214-AEC4-F01300ADCE59&limit=1&offset=0&format=JSON&locationName=%E9%80%A3%E6%B1%9F%E7%B8%A3","rb");
$content = "";
// $doc = json_decode("", true);

while(!feof($datelist)){
    $content .= fread($datelist, 100000);
}
fclose($datelist);

$content = json_decode($content);
// var_dump($content);
// echo $content ->result->fields["id"];
foreach($content as $key ){
    // echo $key-> ."<br>";
    echo $content ->records->location[0]->weatherElement[0]->elementName . "<br>";
}


?>

</body>
</html>