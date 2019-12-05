<?php
//if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

global $is_admin;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$weather_skin_url.'/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="'.$weather_skin_url.'/weather-icons.css">', 0);

$icon['Thunderstorm'] ='wi wi-lightning';
$icon['Drizzle'] ='wi wi-fog';
$icon['Snow'] ='wi wi-snow';
$icon['Clear'] ='wi wi-day-sunny';
$icon['Clouds'] ='wi wi-cloudy';
$icon['Rain'] ='wi wi-rain';

$date[1] = '오늘';
$date[2] = '내일';
$date[3] = '모레';

?>

<!-- 포인트 랭킹 시작 { -->
<section id="weather">
      <div>
        <!-- 개발 시 https://erikflowers.github.io/weather-icons/ 참고하기-->
        <div class="">
          <?php
          for($i=1;$i<=3;$i++){?>
            <div class="" style="width:32%; display:inline-block;">
              <p><?php echo $date[$i];?>의 날씨</p>
              <div class="">
                <i class="<?php echo $icon[$main[$i]]; ?>"></i>
                <?php echo $main[$i];?>
              </div>
              <p><?php echo $description[$i]; ?><p>
            </div>
          <?php }?>
        </div>

        <button type="button" name="button"><p>기우제 지내기</p></button> <!--포인트를 써서 기우제를 지내보자!-->
      </div>

</section>
<!-- 포인트 랭킹 끝 -->
