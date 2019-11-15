<?php
//if (!defined('_GNUBOARD_')) exit;

if(true){
  $jsonfile = file_get_contents("http://api.openweathermap.org/data/2.5/forecast?q=Munemi,KR&units=metric&appid=5c331b6c10405ea2b5c6c670a1814c62");
  $jsondata = json_decode($jsonfile,true);

  date_default_timezone_set("Asia/Seoul");
  $timestamp = new DateTime();
  $today = substr($timestamp->format("Y-m-d H:i:s"), 0, 10);
  $timestamp = strtotime(today." +1 days +6 hours");
  $tomorrow = date("Y-m-d H:i:s", $timestamp);
  foreach ($jsondata['list'] as $day => $value) {
    $date = $value['dt_txt'];
    if(strcmp($date,$tomorrow)==0){
      //데이터 베이스 입력




      break;
    }
  }

  echo "</br>DONE";
}/*
// 방문자수 출력
function weather($skin_dir='basic',$days=1)
{
    global $config, $g5;

    $sql = "SELECT mb_nick, mb_point FROM `g5_member` WHERE mb_level < 10 ORDER BY `mb_point` DESC LIMIT {$num_person}";
    $result = sql_query($sql);
    for ($i=0; $row=sql_fetch_array($result); $i++) {
        $mb_nick[$i] = $row['mb_nick'];
        $mb_point[$i] = $row['mb_point'];
    }


    if(preg_match('#^theme/(.+)$#', $skin_dir, $match)) {
        if (G5_IS_MOBILE) {
            $pointrank_skin_path = G5_THEME_MOBILE_PATH.'/'.G5_SKIN_DIR.'/pointrank/'.$match[1];
            if(!is_dir($pointrank_skin_path))
                $pointrank_skin_path = G5_THEME_PATH.'/'.G5_SKIN_DIR.'/pointrank/'.$match[1];
            $pointrank_skin_url = str_replace(G5_PATH, G5_URL, $pointrank_skin_path);
        } else {
            $pointrank_skin_path = G5_THEME_PATH.'/'.G5_SKIN_DIR.'/pointrank/'.$match[1];
            $pointrank_skin_url = str_replace(G5_PATH, G5_URL, $pointrank_skin_path);
        }
        $skin_dir = $match[1];
    } else {
        if(G5_IS_MOBILE) {
            $pointrank_skin_path = G5_MOBILE_PATH.'/'.G5_SKIN_DIR.'/pointrank/'.$skin_dir;
            $pointrank_skin_url = G5_MOBILE_URL.'/'.G5_SKIN_DIR.'/pointrank/'.$skin_dir;
        } else {
            $pointrank_skin_path = G5_SKIN_PATH.'/pointrank/'.$skin_dir;
            $pointrank_skin_url = G5_SKIN_URL.'/pointrank/'.$skin_dir;
        }
    }

    ob_start();
    include_once ($pointrank_skin_path.'/pointrank.skin.php');
    $content = ob_get_contents();
    ob_end_clean();

    return $content;
}*/
?>
