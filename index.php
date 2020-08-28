<?php session_start();
  if(@$_POST["cityname"] != ""){
    $_SESSION["cityname"] = $_POST["cityname"];
  }
  else{
    $_SESSION["cityname"] = "";
  }
  if(! @mysqli_connect("localhost", "root", "",  "weatherDB", 3306)){ // 前三個分別是：IP地址, 使用者, 密碼
    $frist = mysqli_connect("localhost", "root", "" );
    $sql = "CREATE DATABASE weatherDB DEFAULT CHARACTER SET utf8;";
    mysqli_query($frist , $sql);
    mysqli_close($frist);
    require("creatdatabase.php");
    require("madecity.php");
    require("raindatatable.php");
    require("madenowweather.php");
    require("madefuturetable.php");
  }
?>
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
        <option <?php if($_SESSION["cityname"] !="" && $_SESSION["cityname"] == "基隆"){echo "selected";} ?> value="基隆">基隆市</option>   <?php $bigcity["基隆"] = "基隆市"; ?>
        <option <?php if($_SESSION["cityname"] !="" && $_SESSION["cityname"] == "臺北"){echo "selected";} ?> value="臺北">臺北市</option>   <?php $bigcity["臺北"] = "臺北市"; ?>
        <option <?php if($_SESSION["cityname"] !="" && $_SESSION["cityname"] == "板橋"){echo "selected";} ?> value="板橋">新北市</option>   <?php $bigcity["板橋"] = "新北市"; ?>
        <option <?php if($_SESSION["cityname"] !="" && $_SESSION["cityname"] == "新屋"){echo "selected";} ?> value="新屋">桃園市</option>   <?php $bigcity["新屋"] = "桃園市"; ?>
        <option <?php if($_SESSION["cityname"] !="" && $_SESSION["cityname"] == "香山"){echo "selected";} ?> value="香山">新竹市</option>   <?php $bigcity["香山"] = "新竹市"; ?>
        <option <?php if($_SESSION["cityname"] !="" && $_SESSION["cityname"] == "新竹"){echo "selected";} ?> value="新竹">新竹縣</option>   <?php $bigcity["新竹"] = "新竹縣"; ?>
        <option <?php if($_SESSION["cityname"] !="" && $_SESSION["cityname"] == "苗栗"){echo "selected";} ?> value="苗栗">苗栗縣</option>   <?php $bigcity["苗栗"] = "苗栗縣"; ?>
        <option <?php if($_SESSION["cityname"] !="" && $_SESSION["cityname"] == "臺中"){echo "selected";} ?> value="臺中">臺中市</option>   <?php $bigcity["臺中"] = "臺中市"; ?>
        <option <?php if($_SESSION["cityname"] !="" && $_SESSION["cityname"] == "田中"){echo "selected";} ?> value="田中">彰化縣</option>   <?php $bigcity["田中"] = "彰化縣"; ?>
        <option <?php if($_SESSION["cityname"] !="" && $_SESSION["cityname"] == "日月潭"){echo "selected";} ?> value="日月潭">南投縣(日月潭)</option><?php $bigcity["日月潭"] = "南投縣"; ?>
        <option <?php if($_SESSION["cityname"] !="" && $_SESSION["cityname"] == "四湖"){echo "selected";} ?> value="四湖">雲林縣</option>   <?php $bigcity["四湖"] = "雲林縣"; ?>
        <option <?php if($_SESSION["cityname"] !="" && $_SESSION["cityname"] == "嘉義"){echo "selected";} ?> value="嘉義">嘉義市</option>   <?php $bigcity["嘉義"] = "嘉義市"; ?>
        <option <?php if($_SESSION["cityname"] !="" && $_SESSION["cityname"] == "阿里山"){echo "selected";} ?> value="阿里山">嘉義縣</option><?php $bigcity["阿里山"] = "嘉義縣"; ?>
        <option <?php if($_SESSION["cityname"] !="" && $_SESSION["cityname"] == "臺南"){echo "selected";} ?> value="臺南">臺南市</option>   <?php $bigcity["臺南"] = "臺南市"; ?>
        <option <?php if($_SESSION["cityname"] !="" && $_SESSION["cityname"] == "高雄"){echo "selected";} ?> value="高雄">高雄市</option>   <?php $bigcity["高雄"] = "高雄市"; ?>
        <option <?php if($_SESSION["cityname"] !="" && $_SESSION["cityname"] == "恆春"){echo "selected";} ?> value="恆春">屏東縣</option>   <?php $bigcity["恆春"] = "屏東縣"; ?>
        <option <?php if($_SESSION["cityname"] !="" && $_SESSION["cityname"] == "宜蘭"){echo "selected";} ?> value="宜蘭">宜蘭縣</option>   <?php $bigcity["宜蘭"] = "宜蘭縣"; ?>
        <option <?php if($_SESSION["cityname"] !="" && $_SESSION["cityname"] == "花蓮"){echo "selected";} ?> value="花蓮">花蓮縣</option>   <?php $bigcity["花蓮"] = "花蓮縣"; ?>
        <option <?php if($_SESSION["cityname"] !="" && $_SESSION["cityname"] == "臺東"){echo "selected";} ?> value="臺東">臺東縣</option>   <?php $bigcity["臺東"] = "臺東縣"; ?>
        <option <?php if($_SESSION["cityname"] !="" && $_SESSION["cityname"] == "澎湖"){echo "selected";} ?> value="澎湖">澎湖縣</option>   <?php $bigcity["澎湖"] = "澎湖縣"; ?>
        <option <?php if($_SESSION["cityname"] !="" && $_SESSION["cityname"] == "金門"){echo "selected";} ?> value="金門">金門縣</option>  <?php $bigcity["金門"] = "金門縣"; ?>
        <option <?php if($_SESSION["cityname"] !="" && $_SESSION["cityname"] == "馬祖"){echo "selected";} ?> value="馬祖">連江縣</option>  <?php $bigcity["馬祖"] = "連江縣"; ?>
      </select>
    </div>
    <button name="btnOK" type="submit" class="btn btn-primary">現在天氣</button>

  </div> 
  <div align="center">
    <button name = "twodays" type="submit" class="btn btn-info">未來兩天天氣預報</button>
    <button name = "week" type="submit" class="btn btn-info">未來一週天氣預報</button>
    <button name = "raining" type="submit" class="btn btn-success">累積雨量</button>
    <button name = "reset" type="submit" class="btn btn-danger">重置資料庫</button>
  </div>
</form>
<?php if(isset($_POST["btnOK"]) || isset($_POST["twodays"]) || isset($_POST["week"]) || isset($_POST["raining"])){ ?>
  <div>
    <img src="image/<?= $_POST["cityname"] ?>.jpg" class="img-thumbnail mx-auto d-block" >
  </div>
<?php  }  ?>

<div class = " text-center">
<?php
  if(isset($_POST["btnOK"])  ){ 
?>
<div class="bg-dark text-white text-left">  當前天氣狀況</div>
<?php
    $citynam = $_POST["cityname"] ;
    $citynam2 = $bigcity["$citynam"];
    if($citynam == "香山"){$datelist = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0003-001?Authorization=CWB-343CA766-1C35-4214-AEC4-F01300ADCE59&format=JSON&locationName=新竹&elementName=TEMP","rb");
      $dataweather = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-089?Authorization=CWB-343CA766-1C35-4214-AEC4-F01300ADCE59&format=JSON&locationName=$citynam2&elementName=Wx","rb");
    } // 新竹市
    
    else if($citynam == "四湖"){$datelist = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0003-001?Authorization=CWB-343CA766-1C35-4214-AEC4-F01300ADCE59&format=JSON&locationName=嘉義&elementName=TEMP","rb");
      $dataweather = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-089?Authorization=CWB-343CA766-1C35-4214-AEC4-F01300ADCE59&format=JSON&locationName=$citynam2&elementName=Wx","rb");
    } // 雲林沒有天氣觀測所，用比較近的嘉義觀測所
    
    else if($citynam == "苗栗"){  $datelist = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0001-001?Authorization=CWB-343CA766-1C35-4214-AEC4-F01300ADCE59&format=JSON&locationName=$citynam&elementName=TEMP","rb");
      $dataweather = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-089?Authorization=CWB-343CA766-1C35-4214-AEC4-F01300ADCE59&format=JSON&locationName=$citynam2&elementName=Wx","rb");
    }
    
    else if($citynam == "臺南"){$datelist = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0003-001?Authorization=CWB-343CA766-1C35-4214-AEC4-F01300ADCE59&limit=10&format=JSON&stationId=467410&elementName=TEMP", "rb");
      $dataweather = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-089?Authorization=CWB-343CA766-1C35-4214-AEC4-F01300ADCE59&format=JSON&locationName=$citynam2&elementName=Wx","rb");
    }
    
    else if($citynam == "阿里山"){$datelist = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0003-001?Authorization=CWB-343CA766-1C35-4214-AEC4-F01300ADCE59&format=JSON&locationName=嘉義&elementName=TEMP", "rb");
      $dataweather = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-089?Authorization=CWB-343CA766-1C35-4214-AEC4-F01300ADCE59&format=JSON&locationName=$citynam2&elementName=Wx","rb");
    }
    else {$datelist = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0003-001?Authorization=CWB-343CA766-1C35-4214-AEC4-F01300ADCE59&format=JSON&locationName=$citynam&elementName=TEMP","rb");
      $dataweather = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-089?Authorization=CWB-343CA766-1C35-4214-AEC4-F01300ADCE59&format=JSON&locationName=$citynam2&elementName=Wx","rb");
    }
    
    
    $content = "";
    $content2 = "";

    while(!feof($datelist)){
        $content .= fread($datelist, 100000);
    }
    fclose($datelist);

    while(!feof($dataweather)){
      $content2 .= fread($dataweather, 100000);
    }
    fclose($dataweather);

    
    $content = json_decode($content);
    $content2 = json_decode($content2);
    // var_dump($content2);
?>
<div class="container alert alert-info">
<?php
    foreach($content ->records->location[0]->weatherElement as $key => $value){

        if($value->elementName == "TEMP" && $value->elementValue != "-99")
        {echo "溫度：$value->elementValue ℃<br>"; $TEMP = $value->elementValue;}
    }

    // echo "天氣：" . $content2->records->location[0]->weatherElement[0]->time[0]->parameter->parameterName . "<br>";
    echo "天氣：" . $content2->records->locations[0]->location[0]->weatherElement[0]->time[0]->elementValue[0]->value . "<br>";

    echo "資料更新日期：".date("Y年m月d日  G點i分",strtotime($content ->records->location[0]->time->obsTime) )."<br>";
?>
</div>
<?php
    require("linksql.php");
    $weather = $content2->records->locations[0]->location[0]->weatherElement[0]->time[0]->elementValue[0]->value;
    $upday = date("Y年m月d日  G點i分",strtotime($content ->records->location[0]->time->obsTime));
    
    $sql = "update nowWeather set
    TEMP = $TEMP,
    weather = '$weather',
    upday = '$upday'
    where citySit = '$citynam2';
    ";
    mysqli_query($link , $sql);
    mysqli_close($link);

  }  
?>
</div>

<?php 
  if(isset($_POST["week"])) {
?>
<div class="bg-dark text-white text-left">  未來一週天氣預報</div>
<?php
    $citynam = $_POST["cityname"] ;
    $citynam2 = $bigcity["$citynam"];
    $weekslist = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-091?Authorization=CWB-343CA766-1C35-4214-AEC4-F01300ADCE59&format=JSON&locationName=$citynam2&elementName=WeatherDescription","rb");
    $weeks = "";
    while(!feof($weekslist)){
      $weeks .= fread($weekslist, 100000);
    }
    fclose($weekslist);
    $weeks = json_decode($weeks);
    // var_dump ($weeks);
    require("linksql.php");
    $sql = "DELETE FROM `week` WHERE `week`.`CITY` = '$citynam2';";
    mysqli_query($link , $sql);
    mysqli_close($link);

    foreach($weeks->records->locations[0]->location[0]->weatherElement[0]->time as $WE =>$weaDes){
?>
    <div class="container alert-success text-left">
    <?php
      echo date("m月d日 G點~",strtotime($weaDes->startTime)) . date("m月d日 G點",strtotime($weaDes->endTime)) . " : <br>";
      echo $weaDes->elementValue[0]->value . "<br>";
      $report = $weaDes->elementValue[0]->value;
      require("linksql.php");
      $sql = "INSERT INTO week (`CITY`,	`startTime`,	`endTime`,	`report`) VALUES
      ('$citynam2', '$weaDes->startTime', '$weaDes->endTime', '$report')
      ;";
      mysqli_query($link , $sql);
      mysqli_close($link);
    ?>
    </div><br>
<?php 
    } 
  } 
?>

<?php 
  if(isset($_POST["twodays"])) {
?>
<div class="bg-dark text-white text-left">  未來２天天氣預報</div>
<?php
    $citynam = $_POST["cityname"] ;
    $citynam2 = $bigcity["$citynam"];
    $twodaylist = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-089?Authorization=CWB-343CA766-1C35-4214-AEC4-F01300ADCE59&format=JSON&locationName=$citynam2&elementName=WeatherDescription","rb");
    $twodays = "";
    while(!feof($twodaylist)){
      $twodays .= fread($twodaylist, 100000);
    }
    fclose($twodaylist);
    $twodays = json_decode($twodays);
    // var_dump ($twodays);

    require("linksql.php");
      $sql = "DELETE FROM `twodays` WHERE `twodays`.`CITY` = '$citynam2';";
      mysqli_query($link , $sql);
      mysqli_close($link);
    
    foreach($twodays->records->locations[0]->location[0]->weatherElement[0]->time as $WE =>$weaDes){
?>
    <div class="container alert-success text-left">
    <?php
      echo date("m月d日 G點~",strtotime($weaDes->startTime)) . date("m月d日 G點",strtotime($weaDes->endTime)) . " : <br>";
      echo $weaDes->elementValue[0]->value . "<br>";
      $report = $weaDes->elementValue[0]->value;
      require("linksql.php");
      $sql = "INSERT INTO twodays (`CITY`,	`startTime`,	`endTime`,	`report`) VALUES
      ('$citynam2', '$weaDes->startTime', '$weaDes->endTime', '$report')
      ;";
      mysqli_query($link , $sql);
      mysqli_close($link);
    ?>
    </div><br>
<?php 
    }    
  } 
?>

<?php 
  if(isset($_POST["raining"])){
?>
<div class="bg-info text-white text-left">累積雨量</div>
<?php
    $cityname = $_POST["cityname"];
    $rainList = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0002-001?Authorization=CWB-343CA766-1C35-4214-AEC4-F01300ADCE59&format=JSON&elementName=RAIN,HOUR_24,NOW", "rb");
  
    $rain = "";
    while(!feof($rainList)){
      $rain .= fread($rainList, 100000);
    }
    fclose($rainList);
    $rain = json_decode($rain);
    // var_dump($rain);

    $ahour = "";
    $hour24 = "";
    foreach($rain->records->location as $hexi => $swa){?>
    <div class="container alert-primary text-left">
    <?php
      if($swa->parameter[0]->parameterName == "CITY" && $swa->parameter[0]->parameterValue == $bigcity["$cityname"]){
        echo "地區：" . $swa->parameter[2]->parameterValue . "<br>";
        echo "觀測站：" . $swa->locationName . "<br>";
        if($swa->weatherElement[0]->elementValue == "-998.00"){$ahour = "0"; $hour24 = $swa->weatherElement[1]->elementValue;
          echo "過去1小時累積雨量 : $ahour<br>";
          echo "過去24小時累積雨量 : $hour24<br>";
        }else{
          if($swa->weatherElement[0]->elementValue == "-999.00"){$ahour = "該時刻因故無資料"; echo "過去1小時累積雨量 : $ahour<br>";}
          else {$ahour = $swa->weatherElement[0]->elementValue; echo "過去1小時累積雨量 : $ahour<br>";}
          if($swa->weatherElement[1]->elementValue == "-999.00"){$hour24 = "該時刻因故無資料"; echo "過去24小時累積雨量 : $hour24<br>";}
          else {$hour24 = $swa->weatherElement[1]->elementValue; echo "過去24小時累積雨量 : $hour24<br>";}
        }    
        echo "資料更新日期：".date("Y年m月d日  G點i分",strtotime($rain->records->location[0]->time->obsTime) )."<hr>";
        $upday = date("Y年m月d日  G點i分",strtotime($swa->time->obsTime));
        require("linksql.php");
        $sql = "update rain set
        hour1 = '$ahour',
        hour24 = '$hour24',
        upday = '$upday'
        where citySit = '$swa->locationName';
        ";
        mysqli_query($link , $sql);
        mysqli_close($link);
      }?>
    </div>
    <?php
    }
  } 
?>


<?php
  if(isset($_POST["reset"])){
    require("creatdatabase.php");
    require("madecity.php");
    require("raindatatable.php");
    require("madenowweather.php");
    require("madefuturetable.php");
  }
?>
</body>
</html>