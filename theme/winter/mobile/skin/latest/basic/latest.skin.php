<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
?>

<div class="lt list_01">
    <div class="lt_title">
      <div class="lt_title_name">
        <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>" ><?php echo $bo_subject ?></a>
      </div>
      <div class="lt_more">
        <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><i class="fa fa-plus" aria-hidden="true"></i><span class="sound_only"> 더보기</span></a>
      </div>
    </div>

    <div class="lt_content">
      <ul class="lt_list">
      <?php for ($i=0; $i<count($list); $i++) { ?>
          <li>
              <span class="lt_tit">
              <?php
              if ($list[$i]['icon_secret']) echo "<i class=\"fa fa-lock\" aria-hidden=\"true\"></i> ";
              //echo $list[$i]['icon_reply']." ";
              echo "<a href=\"".$list[$i]['href']."\" >";
              if ($list[$i]['is_notice'])
                  echo "<strong>".$list[$i]['subject']."</strong>";
              else
                  echo $list[$i]['subject'];

                  // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
                  // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

               //if ($list[$i]['icon_file']) echo " <i class=\"fa fa-download\" aria-hidden=\"true\"></i>" ;
               //if ($list[$i]['icon_link']) echo " <i class=\"fa fa-link\" aria-hidden=\"true\"></i>" ;
              if ($list[$i]['icon_hot']) echo " <i class=\"fa fa-heart\" aria-hidden=\"true\"></i>";
              else if ($list[$i]['icon_new']) echo " <span class=\"new_icon\">NEW</span>";

              echo "</a>";
              ?>
              </span>

              <span class="lt_info">
                <?php if ($list[$i]['comment_cnt']) { ?>
                  <span class="lt_cmt">
                  <?php echo "+".$list[$i]['comment_cnt']; ?>
                  </span>
                <?php } ?>
                  <span class="lt_date">
                  <?php echo $list[$i]['datetime2'] ?>
                  </span>
              </span>
          </li>
      <?php } ?>
      <?php if (count($list) == 0) { //게시물이 없을 때 ?>
      <li class="empty_li">게시물이 없습니다.</li>
      <?php } ?>
      </ul>
    </div>
</div>
