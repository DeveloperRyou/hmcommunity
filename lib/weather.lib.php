<?php
//if (!defined('_GNUBOARD_')) exit;

// 방문자수 출력
function weather($skin_dir='basic')
{
    global $config, $g5;

    //init
    for($i=1;$i<=3;$i++){
      $sql = "SELECT api_id FROM `g5_apis` WHERE api_id='weather_{$i}' ";
      $row = sql_fetch($sql);
      if($row['api_id']==False) {
        $sql = "INSERT INTO `g5_apis` SET api_id = 'weather_{$i}', api_txt1='None' ";
        $row = sql_fetch($sql);
      }
    }

    date_default_timezone_set("Asia/Seoul");
    $timestamp = new DateTime();
    $today = substr($timestamp->format("Y-m-d H:i:s"), 0, 10);
    $day1 = date("Y-m-d H:i:s", strtotime($today." +6 hours"));
    $day2 = date("Y-m-d H:i:s", strtotime($day1." +1 days"));
    $day3 = date("Y-m-d H:i:s", strtotime($day2." +1 days"));

    $sql = "SELECT api_txt1 FROM `g5_apis` WHERE api_id='weather_1' ";
    $row = sql_fetch($sql);
        $db_today = $row['api_txt1'];

    if(strcmp($day1,$db_today)!=0){
      $jsonfile = file_get_contents("http://api.openweathermap.org/data/2.5/forecast?q=Munemi,KR&units=metric&appid=5c331b6c10405ea2b5c6c670a1814c62");
      $jsondata = json_decode($jsonfile,true);

      foreach ($jsondata['list'] as $day => $value) {
        $date = $value['dt_txt'];
        $main = $value['weather'][0]['main'];
        $description = $value['weather'][0]['description'];

        if(strcmp($date,$day1)==0){
          $sql = " update g5_apis
                      set api_txt1 = '{$day1}', api_txt2 = '{$main}', api_txt3 = '{$description}'
                    where api_id   = 'weather_1' ";
          sql_fetch($sql);
        }

        if(strcmp($date,$day2)==0){
          $sql = " update g5_apis
                      set api_txt1 = '{$day2}', api_txt2 = '{$main}', api_txt3 = '{$description}'
                    where api_id   = 'weather_2' ";
          sql_fetch($sql);
        }

        if(strcmp($date,$day3)==0){
          $sql = " update g5_apis
                      set api_txt1 = '{$day3}', api_txt2 = '{$main}', api_txt3 = '{$description}'
                    where api_id   = 'weather_3' ";
          sql_fetch($sql);
        }
      }

    }

    $sql = "SELECT * FROM `g5_apis` WHERE api_id='weather_1' ";
    $row = sql_fetch($sql);
    $main[1] = $row['api_txt2'];
    $description[1] = $row['api_txt3'];

    $sql = "SELECT * FROM `g5_apis` WHERE api_id='weather_2' ";
    $row = sql_fetch($sql);
    $main[2] = $row['api_txt2'];
    $description[2] = $row['api_txt3'];

    $sql = "SELECT * FROM `g5_apis` WHERE api_id='weather_3' ";
    $row = sql_fetch($sql);
    $main[3] = $row['api_txt2'];
    $description[3] = $row['api_txt3'];

    if(preg_match('#^theme/(.+)$#', $skin_dir, $match)) {
        if (G5_IS_MOBILE) {
            $weather_skin_path = G5_THEME_MOBILE_PATH.'/'.G5_SKIN_DIR.'/weather/'.$match[1];
            if(!is_dir($weather_skin_path))
                $weather_skin_path = G5_THEME_PATH.'/'.G5_SKIN_DIR.'/weather/'.$match[1];
            $weather_skin_url = str_replace(G5_PATH, G5_URL, $weather_skin_path);
        } else {
            $weather_skin_path = G5_THEME_PATH.'/'.G5_SKIN_DIR.'/weather/'.$match[1];
            $weather_skin_url = str_replace(G5_PATH, G5_URL, $weather_skin_path);
        }
        $skin_dir = $match[1];
    } else {
        if(G5_IS_MOBILE) {
            $weather_skin_path = G5_MOBILE_PATH.'/'.G5_SKIN_DIR.'/weather/'.$skin_dir;
            $weather_skin_url = G5_MOBILE_URL.'/'.G5_SKIN_DIR.'/weather/'.$skin_dir;
        } else {
            $weather_skin_path = G5_SKIN_PATH.'/weather/'.$skin_dir;
            $weather_skin_url = G5_SKIN_URL.'/weather/'.$skin_dir;
        }
    }

    ob_start();
    include_once ($weather_skin_path.'/weather.skin.php');
    $content = ob_get_contents();
    ob_end_clean();

    return $content;
}
?>
