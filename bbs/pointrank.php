<?php
include_once('./_common.php');

$g5['title'] = '포인트 랭킹';
include_once('./_head.php');

$sql = "SELECT mb_nick, mb_point FROM `g5_member` WHERE mb_level < 10 ORDER BY `mb_point` DESC";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {
    $mb_nick[$i] = $row['mb_nick'];
    $mb_point[$i] = $row['mb_point'];
    $total_count=$i;
}
$total_count = $total_count+1;
$page_rows = 20;

if (G5_IS_MOBILE) {
    $pointrank_skin_path = G5_THEME_MOBILE_PATH.'/'.G5_SKIN_DIR.'/pointrank/basic';
    if(!is_dir($pointrank_skin_path))
    $pointrank_skin_path = G5_THEME_PATH.'/'.G5_SKIN_DIR.'/pointrank/basic';
    $pointrank_skin_url = str_replace(G5_PATH, G5_URL, $pointrank_skin_path);
} else {
    $pointrank_skin_path = G5_THEME_PATH.'/'.G5_SKIN_DIR.'/pointrank/basic';
    $pointrank_skin_url = str_replace(G5_PATH, G5_URL, $pointrank_skin_path);
}


if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$total_page  = ceil($total_count / $page_rows);  // 전체 페이지 계산

$write_pages = get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, "./pointrank.php?");

include_once($pointrank_skin_path.'/pointrank_page.skin.php');

include_once('./_tail.php');
?>
