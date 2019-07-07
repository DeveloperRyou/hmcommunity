<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

global $is_admin;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$pointrank_skin_url.'/style.css">', 0);
?>

<!-- 접속자집계 시작 { -->
<section id="pointrank">
    <h2><p>포인트 랭킹</p></h2>
    <ul>
      <?php for($i=0;$i<$num_person;$i++) {?>
        <li>
        <div class="num"><?php echo $i+1?></div>
        <div class="nick"><?php echo $mb_nick[$i]?></div>
        <div class="point_back">
          <div class="point" style="width:<?php echo 100*$mb_point[$i]/$mb_point[0]?>%"><?php echo $mb_point[$i]?></div>
         </div>
        </li>
      <?php }?>
    </ul>
</section>
<!-- } 접속자집계 끝 -->
