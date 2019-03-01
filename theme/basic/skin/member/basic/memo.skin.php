<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<!-- 쪽지 목록 시작 { -->
<div id="memo_list" class="new_win">
    <h1 id="win_title"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo $g5['title'] ?></h1>
    
    
    <div class="new_win_con">
        <ul class="win_ul">
            <li class="<?php if ($kind == 'recv') {  ?>selected<?php }  ?>" ><a href="./memo.php?kind=recv" style="color: white">받은쪽지</a></li>
            <li class="<?php if ($kind == 'send') {  ?>selected<?php } ?>" ><a href="./memo.php?kind=send" style="color: white">보낸쪽지</a></li>
            <li ><a href="./memo_form.php" style="color: white">쪽지쓰기</a></li>
        </ul>
        <table class="p_table">
        <thead class="p_head02">
            <tr> 
                <th> 번호 </th> <th> 보낸 사람 </th> <th> 보낸 시간 </th> <th> 읽은 시간 </th> <th> 관리 </th>
            </tr>
        </thead>
        <tbody class="p_body">
            <?php for($i=0; $i<count($list); $i++) { ?>
                <tr>
                    <?php echo "<td> $i </td>" ?> 
                    <td> <a href="<?php echo $list[$i]['view_href'] ?>"><?php echo $list[$i]['mb_nick'] ?></a> </td>
                    <td> <?php echo $list[$i]['send_datetime'] ?> </td>                   
                    <td> <?php echo $list[$i]['read_datetime'] ?> </td>
                    <td> <a href="<?php echo $list[$i]['del_href'] ?>" onclick="del(this.href); return false;" class="memo_del"><i class="fa fa-times-circle" aria-hidden="true"></i> <span class="sound_only">삭제</span></a> </td>
                </tr>
            <?php } ?>
        </tbody>
        </table>
        <div class="list_01">
        <?php if ($i==0) { echo '<li class="empty_table">자료가 없습니다.</li>'; }  ?>
        </div>
        <!-- 페이지 -->
        <?php echo $write_pages; ?>

        <p class="win_desc">
            쪽지 보관일수는 최장 <strong><?php echo $config['cf_memo_del'] ?></strong>일 입니다.
        </p>

    </div>
</div>

<div class="popup">
    <br>
    <br>
    <button type="button" onclick="window.close();" class ="button01"> 닫기 </button>
</div>
<!-- } 쪽지 목록 끝 -->

<!-- 원본 코드 
<div id="memo_list" class="new_win">
    <h1 id="win_title"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo $g5['title'] ?></h1>
    <div class="new_win_con">
        <ul class="win_ul">
            <li class="<?php if ($kind == 'recv') {  ?>selected<?php }  ?>"><a href="./memo.php?kind=recv">받은쪽지</a></li>
            <li class="<?php if ($kind == 'send') {  ?>selected<?php }  ?>"><a href="./memo.php?kind=send">보낸쪽지</a></li>
            <li><a href="./memo_form.php">쪽지쓰기</a></li>
        </ul>
        <div class="win_total">
            <span>
                전체 <?php echo $kind_title ?>쪽지 <?php echo $total_count ?>통<br>
            </span>
        </div>
        <div class="list_01">

            <ul>
            <?php for ($i=0; $i<count($list); $i++) {  ?>
            <li>
                <span class="memo_name"><a href="<?php echo $list[$i]['view_href'] ?>"><?php echo $list[$i]['mb_nick'] ?></a></span>
                <span class="memo_datetime"><?php echo $list[$i]['send_datetime'] ?> - <?php echo $list[$i]['read_datetime'] ?> <a href="<?php echo $list[$i]['del_href'] ?>" onclick="del(this.href); return false;" class="memo_del"><i class="fa fa-times-circle" aria-hidden="true"></i> <span class="sound_only">삭제</span></a></span>
            </li>
            <?php }  ?>
            <?php if ($i==0) { echo '<li class="empty_table">자료가 없습니다.</li>'; }  ?>
            </ul>
        </div>

        <?php echo $write_pages; ?>

        <p class="win_desc">
            쪽지 보관일수는 최장 <strong><?php echo $config['cf_memo_del'] ?></strong>일 입니다.
        </p>

        <div class="win_btn">
            <button type="button" onclick="window.close();" class="btn_close">창닫기</button>
        </div>
    </div>
</div>
-->
<!-- } 쪽지 목록 끝 -->