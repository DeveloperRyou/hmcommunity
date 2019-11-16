<?php
if (!defined('_GNUBOARD_')) exit;

// 방문자수 출력
function weather($skin_dir='basic')
{
    date_default_timezone_set("Asia/Seoul");
    $timestamp = new DateTime();
    $today = substr($timestamp->format("Y-m-d H:i:s"), 0, 10);
    $timestamp = strtotime(today." +1 days +6 hours");
    $tomorrow = date("Y-m-d H:i:s", $timestamp);

    global $config, $g5;

    $sql = "SELECT api_txt1,api_txt2,api_txt3 FROM `g5_apis` WHERE api_id='weather' ";
    $row = sql_fetch($sql);
        $db_today = $row['api_txt1'];
        $main = $row['api_txt2'];
        $description = $row['api_txt3'];

    if(strcmp($today,$db_today)==1){
      $jsonfile = file_get_contents("http://api.openweathermap.org/data/2.5/forecast?q=Munemi,KR&units=metric&appid=5c331b6c10405ea2b5c6c670a1814c62");
      $jsondata = json_decode($jsonfile,true);

      foreach ($jsondata['list'] as $day => $value) {
        $date = $value['dt_txt'];
        if(strcmp($date,$tomorrow)==0){
          $main = $value['weather'][0]['main'];
          $description = $value['weather'][0]['description'];
          $sql = " update g5_apis
                      set api_txt1 = '{$today}', api_txt2 = '{$main}', api_txt3 = '{$description}'
                    where api_id   = 'weather' ";
          sql_fetch($sql);
          break;
        }
      }
    }


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
