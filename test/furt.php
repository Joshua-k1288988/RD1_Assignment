<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>個人氣象站</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<br>
<form method = "post"> 
  <div class="form-group row ">
    <label for="cityname" class="col-4 col-form-label text-right">選擇縣市</label> 
    <div class="col-5">
      <select id="cityname" name="cityname" class="custom-select">
        <option <?php if($_POST["cityname"] == "基隆" && $_POST["cityname"] !=""){echo "selected";} ?> value="基隆">基隆市</option>
        <option <?php if($_POST["cityname"] == "臺北" && $_POST["cityname"] !=""){echo "selected";} ?> value="臺北">臺北市</option>
        <option <?php if($_POST["cityname"] == "板橋" && $_POST["cityname"] !=""){echo "selected";} ?> value="板橋">新北市</option>
        <option <?php if($_POST["cityname"] == "新屋" && $_POST["cityname"] !=""){echo "selected";} ?> value="新屋">桃園市</option>
        <option <?php if($_POST["cityname"] == "香山" && $_POST["cityname"] !=""){echo "selected";} ?> value="香山">新竹市</option>
        <option <?php if($_POST["cityname"] == "新竹" && $_POST["cityname"] !=""){echo "selected";} ?> value="新竹">新竹縣</option>
        <option <?php if($_POST["cityname"] == "苗栗" && $_POST["cityname"] !=""){echo "selected";} ?> value="苗栗">苗栗縣</option>
        <option <?php if($_POST["cityname"] == "臺中" && $_POST["cityname"] !=""){echo "selected";} ?> value="臺中">臺中市</option>
        <option <?php if($_POST["cityname"] == "田中" && $_POST["cityname"] !=""){echo "selected";} ?> value="田中">彰化縣</option>
        <option <?php if($_POST["cityname"] == "日月潭" && $_POST["cityname"] !=""){echo "selected";} ?> value="日月潭">南投縣</option>
        <option <?php if($_POST["cityname"] == "四湖" && $_POST["cityname"] !=""){echo "selected";} ?> value="四湖">雲林縣</option>
        <option <?php if($_POST["cityname"] == "嘉義" && $_POST["cityname"] !=""){echo "selected";} ?> value="嘉義">嘉義市</option>
        <option <?php if($_POST["cityname"] == "阿里山" && $_POST["cityname"] !=""){echo "selected";} ?> value="阿里山">嘉義縣</option>
        <option <?php if($_POST["cityname"] == "臺南" && $_POST["cityname"] !=""){echo "selected";} ?> value="臺南">臺南市</option>
        <option <?php if($_POST["cityname"] == "高雄" && $_POST["cityname"] !=""){echo "selected";} ?> value="高雄">高雄市</option>
        <option <?php if($_POST["cityname"] == "恆春" && $_POST["cityname"] !=""){echo "selected";} ?> value="恆春">屏東縣</option>
        <option <?php if($_POST["cityname"] == "宜蘭" && $_POST["cityname"] !=""){echo "selected";} ?> value="宜蘭">宜蘭縣</option>
        <option <?php if($_POST["cityname"] == "花蓮" && $_POST["cityname"] !=""){echo "selected";} ?> value="花蓮">花蓮縣</option>
        <option <?php if($_POST["cityname"] == "臺東" && $_POST["cityname"] !=""){echo "selected";} ?> value="臺東">臺東縣</option>
        <option <?php if($_POST["cityname"] == "澎湖" && $_POST["cityname"] !=""){echo "selected";} ?> value="澎湖">澎湖縣</option>
        <option <?php if($_POST["cityname"] == "金門" && $_POST["cityname"] !=""){echo "selected";} ?> value="金門">金門縣</option>
        <option <?php if($_POST["cityname"] == "馬祖" && $_POST["cityname"] !=""){echo "selected";} ?> value="馬祖">連江縣</option>
      </select>
    </div>
    <button name="btnOK" type="submit" class="btn btn-primary">確定</button>

  </div> 
</form>
<div class="bg-dark text-white">  當前天氣狀況</div>
<div class = "text-center">
<?php

if(isset($_POST["btnOK"])){
    $citynam = $_POST["cityname"] ;
    if($citynam == "香山"){$citynam = "新竹";} // 新竹市
    if($citynam == "四湖"){$citynam = "嘉義";} // 雲林沒有天氣觀測所，用比較近的嘉義觀測所
    if($citynam == "苗栗"){  $datelist = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0001-001?Authorization=CWB-343CA766-1C35-4214-AEC4-F01300ADCE59&format=JSON&locationName=$citynam&elementName=TEMP","rb");  }
    else if($citynam == "臺南"){$datelist = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0003-001?Authorization=CWB-343CA766-1C35-4214-AEC4-F01300ADCE59&limit=10&format=JSON&stationId=467410&elementName=TEMP,Weather", "rb");}
    else {$datelist = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0003-001?Authorization=CWB-343CA766-1C35-4214-AEC4-F01300ADCE59&format=JSON&locationName=$citynam&elementName=TEMP,Weather","rb");}
    
    
    $content = "";

    while(!feof($datelist)){
        $content .= fread($datelist, 100000);
    }
    fclose($datelist);

    
    $content = json_decode($content);
    // var_dump($content);

    foreach($content ->records->location[0]->weatherElement as $key => $value){

        if($value->elementName == "TEMP" && $value->elementValue != "-99")
        {echo "溫度：$value->elementValue ℃<br>";}
        if($value->elementName == "Weather" && $value->elementValue != "-99"){
            echo "天氣：$value->elementValue <br>";
            
        } else if($value->elementName == "Weather" && $value->elementValue == "-99"){
            echo "天氣：沒有當前數據 <br>";
        }
        else if($citynam == "苗栗"){echo "天氣：苗栗國是不需要天氣的！！ <br>";}
    }
    echo "資料更新日期：".date("Y年m月d日  G點i分",strtotime($content ->records->location[0]->time->obsTime) )."<br>";

}

?>
</div>
<div class="bg-dark text-white">  未來天氣預報</div>



</body>
</html>