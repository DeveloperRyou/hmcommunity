<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

global $is_admin;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$weather_skin_url.'/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="'.$weather_skin_url.'/weather-icons.css">', 0);
?>

<!-- 포인트 랭킹 시작 { -->
<section id="weather">
      <div>
        <!-- 개발 시 https://erikflowers.github.io/weather-icons/ 참고하기-->
        <div>내일의 날씨</div>
        <div class="">
          <i class="wi wi-day-sunny"></i>
          <?php echo $main;?>
        </div>
        <div class="">
          <i class="wi wi-rain"></i>
          <?php echo $description ?>
        </div>
        <div class="">
          기우제 지내기
          <button type="button" name="button"></button> <!--포인트를 써서 기우제를 지내보자!-->
        </div>
      </div>

</section>
<!-- 포인트 랭킹 끝 -->
