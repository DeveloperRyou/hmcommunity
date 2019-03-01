<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>
  
  <div id="point" class="new_win">
    <h1 id="win_title"><i class="fa fa-database" aria-hidden="true"></i> <?php echo $g5['title'] ?></h1>
</div>
<div class="new_win">
<div class="point-skin">
	<table class="p_table table">
	<col width="160">
	<thead class="p_head">
	<tr>
		<th class="text-center" scope="col">
            <select name="sca" class="form-control input-sm" onchange="location='./point.php?sca='+encodeURIComponent(this.value);">
            <option value="">전체</option>
            <option value="write"<?php echo get_selected('write', $sca);?>>등록</option>
            <option value="read"<?php echo get_selected('read', $sca);?>>열람</option>
            <option value="good"<?php echo get_selected('good', $sca);?>>추천</option>
            <option value="download"<?php echo get_selected('download', $sca);?>>다운</option>
            <option value="choice"<?php echo get_selected('choice', $sca);?>>채택</option>
            <option value="login"<?php echo get_selected('login', $sca);?>>출석</option>
			<?php if(IS_YC) { ?>
	            <option value="buy"<?php echo get_selected('buy', $sca);?>>구매</option>
			<?php } ?>
            <option value="event"<?php echo get_selected('event', $sca);?>>이벤트</option>
			<option value="poll"<?php echo get_selected('poll', $sca);?>>별점/설문</option>
			</select>		
		</th>
		<th class="text-center" scope="col">내용</th>
		<th class="text-center" scope="col">만료</th>
		<th class="text-center" scope="col">지급</th>
		<th class="text-center" scope="col">사용</th>
		<th width="20"></th>
    </tr>
    </thead>
    <tbody>
	<?php
	$sum_point1 = $sum_point2 = $sum_point3 = 0;

	$sql = " select *
				{$sql_common}
				{$sql_order}
				limit {$from_record}, {$rows} ";
	$result = sql_query($sql);
	for ($i=0; $row=sql_fetch_array($result); $i++) {
		$point1 = $point2 = 0;
		if ($row['po_point'] > 0) {
			$point1 = '+' .number_format($row['po_point']);
			$sum_point1 += $row['po_point'];
		} else {
			$point2 = number_format($row['po_point']);
			$sum_point2 += $row['po_point'];
		}

		$po_content = $row['po_content'];

		$expr = '';
		if($row['po_expired'] == 1)
			$expr = ' red';
	?>
	<tr>
		<td class="text-center"><?php echo $row['po_datetime']; ?></td>
		<td class="text-center"><?php echo $po_content; ?></td>
		<td class="text-center font-11<?php echo $expr; ?>">
			<?php if ($row['po_expired'] == 1) { ?>
			만료<?php echo substr(str_replace('-', '', $row['po_expire_date']), 2); ?>
			<?php } else echo $row['po_expire_date'] == '9999-12-31' ? '&nbsp;' : $row['po_expire_date']; ?>
		</td>
		<td class="text-center"><?php echo $point1; ?></td>
		<td class="text-center"><?php echo $point2; ?></td>
		<td></td>
	</tr>
	<?php
	}

	if ($i == 0)
		echo '<tr><td class="text-center" colspan="6">자료가 없습니다.</td></tr>';
	else {
		if ($sum_point1 > 0)
			$sum_point1 = "+" . number_format($sum_point1);
		$sum_point2 = number_format($sum_point2);
	}
	?>
	</tbody>
	<tfoot>
	<tr class="active">
		<td> </td>
		<th scope="row">소계</th>
		<td> </td>
		<td align="center"><b><?php echo $sum_point1; ?></b></td>
		<td align="center"><b><?php echo $sum_point2; ?></b></td>
		<td> </td>
	</tr>
	<tr class="p_foot01">
		<th></th>
		<th scope="row">보유포인트</th>
		<th></th>
		<td align="center"><b><?php echo number_format($member['mb_point']); ?></b></td>
		<td></td>
		<td></td>
	</tr>
	</tfoot>
	</table>
    <?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, $_SERVER['SCRIPT_NAME'].'?'.$qstr.'&amp;page='); ?>
</div>
    
</div>
</div>
<div class="popup">
    <button type="button" onclick="window.close();" class ="button01"> 닫기 </button>
<!--
    <div id="point" class="new_win">
    <h1 id="win_title"><i class="fa fa-database" aria-hidden="true"></i> <?php echo $g5['title'] ?></h1>

    <div class="new_win_con list_01">
        
        <ul>
            <li class="point_all">
                보유포인트
                <span><i class="fa fa-database" aria-hidden="true"></i> <?php echo number_format($member['mb_point']); ?></span>
            </li>
            <?php
            $sum_point1 = $sum_point2 = $sum_point3 = 0;

            $sql = " select *
                        {$sql_common}
                        {$sql_order}
                        limit {$from_record}, {$rows} ";
            $result = sql_query($sql);
            for ($i=0; $row=sql_fetch_array($result); $i++) {
                $point1 = $point2 = 0;
                if ($row['po_point'] > 0) {
                    $point1 = '+' .number_format($row['po_point']);
                    $sum_point1 += $row['po_point'];
                } else {
                    $point2 = number_format($row['po_point']);
                    $sum_point2 += $row['po_point'];
                }

                $po_content = $row['po_content'];

                $expr = '';
                if($row['po_expired'] == 1)
                    $expr = ' txt_expired';
            ?>
            <li>
                <div class="point_top">
                    <span class="point_tit"><?php echo $po_content; ?></span>
                    <span class="point_num"><?php if ($point1) echo $point1; else echo $point2; ?></span>

                </div>
                <span class="point_date1"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $row['po_datetime']; ?></span>
                <span class="point_date<?php echo $expr; ?>">
                    <?php if ($row['po_expired'] == 1) { ?>
                    만료 <?php echo substr(str_replace('-', '', $row['po_expire_date']), 2); ?>
                    <?php } else echo $row['po_expire_date'] == '9999-12-31' ? '&nbsp;' : $row['po_expire_date']; ?>
                </span>
            </li>
            <?php
            }

            if ($i == 0)
                echo '<li class="empty_li">자료가 없습니다.</li>';
            else {
                if ($sum_point1 > 0)
                    $sum_point1 = "+" . number_format($sum_point1);
                $sum_point2 = number_format($sum_point2);
            }
            ?>
        
            <li class="point_status">
                소계
                <span><?php echo $sum_point1; ?></span>
                <span><?php echo $sum_point2; ?></span>
            </li>
        </ul>

    </div>

    <?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, $_SERVER['SCRIPT_NAME'].'?'.$qstr.'&amp;page='); ?>

    <button type="button" onclick="javascript:window.close();" class="btn_close">창닫기</button>
</div>
        -->