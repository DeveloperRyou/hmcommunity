<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<!-- 스크랩 목록 시작 { -->
<div id="scrap" class="new_win">
    <h1 id="win_title">
        <i class="fa fa-thumb-tack" aria-hidden="true"></i> <?php echo $g5['title'] ?></h1>
    <table class="p_table">
        <thead class="p_head">
            <tr> 
                <th> 번호 </th> <th> 게시판 </th> <th> 제목 </th> <th> 보관일시 </th> <th> 삭제 </th>
            </tr>
        </thead>
        <tbody class="p_body">
            <?php for($i=0; $i<count($list); $i++) { ?>
                <tr>
                    <?php echo "<td> $i </td>" ?> 
                    <td> <a href="<?php echo $list[$i]['opener_href'] ?>" class="scrap_cate" target="_blank" onclick="opener.document.location.href='<?php echo $list[$i]['opener_href'] ?>'; return false;"><?php echo $list[$i]['bo_subject'] ?></a> </td>
                    <td> <a href="<?php echo $list[$i]['opener_href_wr_id'] ?>" class="scrap_tit" target="_blank" onclick="opener.document.location.href='<?php echo $list[$i]['opener_href_wr_id'] ?>'; return false;"><?php echo $list[$i]['subject'] ?></a> </td>                   
                    <td>  <?php echo $list[$i]['ms_datetime'] ?> </td>
                    <td> <a href="<?php echo $list[$i]['del_href'];  ?>" onclick="del(this.href); return false;"> 삭제</a> </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php if ($i == 0) echo "<li class=\"empty_li\">자료가 없습니다.</li>";  ?>

    <!-- <?php echo get_paging($config['cf_write_pages'], $page, $total_page, "?$qstr&amp;page="); ?> -->
</div>

<div class="popup">
    <button type="button" onclick="window.close();" class ="button01"> 닫기 </button>
</div>
<!-- } 스크랩 목록 끝 -->

<!-- 아래는 기존 사용코드  -->

<!--
    <div class="list_01 new_win_con">
        <ul>
        <?php for ($i=0; $i<count($list); $i++) {  ?>
            <li>
                <a href="<?php echo $list[$i]['opener_href_wr_id'] ?>" class="scrap_tit" target="_blank" onclick="opener.document.location.href='<?php echo $list[$i]['opener_href_wr_id'] ?>'; return false;"><?php echo $list[$i]['subject'] ?></a>
                <a href="<?php echo $list[$i]['opener_href'] ?>" class="scrap_cate" target="_blank" onclick="opener.document.location.href='<?php echo $list[$i]['opener_href'] ?>'; return false;"><?php echo $list[$i]['bo_subject'] ?></a>
                <span class="scrap_datetime"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $list[$i]['ms_datetime'] ?></span>
                <a href="<?php echo $list[$i]['del_href'];  ?>" onclick="del(this.href); return false;" class="scrap_del"><i class="fa fa-times-circle" aria-hidden="true"></i><span class="sound_only">삭제</span></a>
            </li>
            <?php }  ?>

            <?php if ($i == 0) echo "<li class=\"empty_li\">자료가 없습니다.</li>";  ?>
        </ul>
    </div>
-->