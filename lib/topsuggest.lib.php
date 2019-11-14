<?php
if (!defined('_GNUBOARD_')) exit;

// 방문자수 출력
function topsuggest($skin_dir='basic',$num_person=3,$max_achivement=50)
{
    global $config, $g5;
    $sql = "SELECT  wr_good, wr_nogood, wr_name, wr_subject FROM `g5_write_suggest_to_hanmin` ORDER BY `wr_good` - `wr_nogood` DESC LIMIT {$num_person}";
    $result = sql_query($sql);
    for ($i=0; $row=sql_fetch_array($result); $i++) {
        $wr_name[$i] = $row['wr_name'];
        $wr_subject[$i] = $row['wr_subject'];
        $now_achivement[$i] = $row['wr_good'] - $row['wr_nogood'];
    }

    if(preg_match('#^theme/(.+)$#', $skin_dir, $match)) {
        if (G5_IS_MOBILE) {
            $topsuggest_skin_path = G5_THEME_MOBILE_PATH.'/'.G5_SKIN_DIR.'/topsuggest/'.$match[1];
            if(!is_dir($topsuggest_skin_path))
                $topsuggest_skin_path = G5_THEME_PATH.'/'.G5_SKIN_DIR.'/topsuggest/'.$match[1];
            $topsuggest_skin_url = str_replace(G5_PATH, G5_URL, $topsuggest_skin_path);
        } else {
            $topsuggest_skin_path = G5_THEME_PATH.'/'.G5_SKIN_DIR.'/topsuggest/'.$match[1];
            $topsuggest_skin_url = str_replace(G5_PATH, G5_URL, $topsuggest_skin_path);
        }
        $skin_dir = $match[1];
    } else {
        if(G5_IS_MOBILE) {
            $topsuggest_skin_path = G5_MOBILE_PATH.'/'.G5_SKIN_DIR.'/topsuggest/'.$skin_dir;
            $topsuggest_skin_url = G5_MOBILE_URL.'/'.G5_SKIN_DIR.'/topsuggest/'.$skin_dir;
        } else {
            $topsuggest_skin_path = G5_SKIN_PATH.'/topsuggest/'.$skin_dir;
            $topsuggest_skin_url = G5_SKIN_URL.'/topsuggest/'.$skin_dir;
        }
    }
    ob_start();
    include_once ($topsuggest_skin_path.'/topsuggest.skin.php');
    $content = ob_get_contents();
    ob_end_clean();

    return $content;
}
?>
