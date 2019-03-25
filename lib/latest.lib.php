<?php
if (!defined('_GNUBOARD_')) exit;

// 최신글 추출
// $cache_time 캐시 갱신시간
function latest($skin_dir='', $bo_table, $rows=10, $subject_len=40, $cache_time=1, $options='')
{
    global $g5;

    if (!$skin_dir) $skin_dir = 'basic';

    if(preg_match('#^theme/(.+)$#', $skin_dir, $match)) {
        if (G5_IS_MOBILE) {
            $latest_skin_path = G5_THEME_MOBILE_PATH.'/'.G5_SKIN_DIR.'/latest/'.$match[1];
            if(!is_dir($latest_skin_path))
                $latest_skin_path = G5_THEME_PATH.'/'.G5_SKIN_DIR.'/latest/'.$match[1];
            $latest_skin_url = str_replace(G5_PATH, G5_URL, $latest_skin_path);
        } else {
            $latest_skin_path = G5_THEME_PATH.'/'.G5_SKIN_DIR.'/latest/'.$match[1];
            $latest_skin_url = str_replace(G5_PATH, G5_URL, $latest_skin_path);
        }
        $skin_dir = $match[1];
    } else {
        if(G5_IS_MOBILE) {
            $latest_skin_path = G5_MOBILE_PATH.'/'.G5_SKIN_DIR.'/latest/'.$skin_dir;
            $latest_skin_url  = G5_MOBILE_URL.'/'.G5_SKIN_DIR.'/latest/'.$skin_dir;
        } else {
            $latest_skin_path = G5_SKIN_PATH.'/latest/'.$skin_dir;
            $latest_skin_url  = G5_SKIN_URL.'/latest/'.$skin_dir;
        }
    }

    if($bo_table=='new'){
        $sql_common = " FROM {$g5['board_new_table']} a ";
        $sql_order = " ORDER by a.bn_id desc ";;

        $list = array();
        $sql = " SELECT a.* {$sql_common} WHERE wr_id=wr_parent {$sql_order} limit {$rows} ";
        $result = sql_query($sql);

        for ($i=0; $row=sql_fetch_array($result); $i++) {
            $tmp_write_table = $g5['write_prefix'].$row['bo_table'];

            // 원글
            $row2 = sql_fetch(" select * from {$tmp_write_table} where wr_id = '{$row['wr_id']}' ");
            $list[$i] = $row2;

            // 당일인 경우 시간으로 표시함
            $datetime = substr($row2['wr_datetime'],0,10);
            $datetime2 = $row2['wr_datetime'];
            if ($datetime == G5_TIME_YMD) {
                $datetime2 = substr($datetime2,11,5);
            } else {
                $datetime2 = substr($datetime2,5,5);
            }

            $list[$i]['comment_cnt'] = $row2['wr_comment'];

            $list[$i]['href'] = G5_URL.'/bbs/board.php?bo_table='.$row['bo_table'].'&wr_id='.$row2['wr_id'];
            $list[$i]['datetime'] = $datetime;
            $list[$i]['datetime2'] = $datetime2;

            $list[$i]['subject'] = conv_subject($row2['wr_subject'], $subject_len, '…');
        }
    }


    else if(!G5_USE_CACHE || $cache_fwrite) {
        $list = array();

        $sql = " select * from {$g5['board_table']} where bo_table = '{$bo_table}' ";
        $board = sql_fetch($sql);
        $bo_subject = get_text($board['bo_subject']);

        $tmp_write_table = $g5['write_prefix'] . $bo_table; // 게시판 테이블 전체이름
        $sql = " select * from {$tmp_write_table} where wr_is_comment = 0 order by wr_num limit 0, {$rows} ";
        $result = sql_query($sql);
        for ($i=0; $row = sql_fetch_array($result); $i++) {
            try {
                unset($row['wr_password']);     //패스워드 저장 안함( 아예 삭제 )
            } catch (Exception $e) {
            }
            $row['wr_email'] = '';              //이메일 저장 안함
            if (strstr($row['wr_option'], 'secret')){           // 비밀글일 경우 내용, 링크, 파일 저장 안함
                $row['wr_content'] = $row['wr_link1'] = $row['wr_link2'] = '';
                $row['file'] = array('count'=>0);
            }
            $list[$i] = get_list($row, $board, $latest_skin_url, $subject_len);
            $list[$i]['href'] = G5_URL.'/bbs/board.php?bo_table='.$bo_table.'&wr_id='.$row['wr_id'];
        }
    }

    ob_start();
    include $latest_skin_path.'/latest.skin.php';
    $content = ob_get_contents();
    ob_end_clean();

    return $content;
}
?>
