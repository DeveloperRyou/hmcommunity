<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

global $is_admin;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$topsuggest_skin_url.'/style.css">', 0);
?>

<!-- 포인트 랭킹 시작 { -->
<section id="topsuggest">
    <!--<h2><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=suggest_to_hanmin"><p>청원게시판</p></a></h2>-->
    <ul>
      <?php for($i=0;$i<$num_person;$i++) {?>
        <li id="top_<?php echo $i+1?>" >
        <div class="nick"><?php echo $wr_name[$i]?></div>
        <div class="achive">
          <div style="width:<?php echo 100*$now_achivement[$i]/$max_achivement?>%;display:inline-block" class="score">
          </div>
          <div class="subject"><?php echo $wr_subject[$i]?></div>
        </div>
        <div class="percentage">
          <?php echo 100*$now_achivement[$i]/$max_achivement?>%
        </div>
        </li>
      <?php }?>
    </ul>

</section>
<!-- 포인트 랭킹 끝 -->
