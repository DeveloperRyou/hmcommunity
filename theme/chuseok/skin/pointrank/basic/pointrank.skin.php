<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

global $is_admin;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$pointrank_skin_url.'/style.css">', 0);
?>

<!-- 포인트 랭킹 시작 { -->
<section id="pointrank">
    <h2><a href="<?php echo G5_BBS_URL ?>/pointrank.php"><p>포인트 랭킹</p></a></h2>
    <ul>
      <?php for($i=0;$i<$num_person;$i++) {?>
        <li id="rank_<?php echo $i+1?>" >
        <div class="num"><?php echo $i+1?></div>
        <div class="nick"><?php echo $mb_nick[$i]?></div>
        <div class="point_back">
          <div style="width:<?php echo 100*$mb_point[$i]/$mb_point[0]?>%;display:inline-block"><div class="point"><?php echo $mb_point[$i]?></div></div>
        </div>
        </li>
      <?php }?>
    </ul>

    <script>
      var before_rank = <?php echo $num_person?>;
      var now_rank = 1;

      function showamin(){
        var before_element = document.getElementById("rank_"+before_rank);
        before_element.style.display = "none";
        var now_element = document.getElementById("rank_"+now_rank);
        now_element.style.display = "inline-block";

        before_rank=now_rank;
        if(now_rank == <?php echo $num_person?>) now_rank = 1;
        else now_rank = now_rank+1;
      }
      showamin();
      var amin = setInterval(showamin,2500);

    </script>
</section>
<!-- 포인트 랭킹 끝 -->
