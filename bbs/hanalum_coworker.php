<?php
include_once('./_common.php');
$_POST["side_hidden"]=TRUE;
$_POST["use_bootstrap"]=TRUE;

$g5['title'] = '한아름 팀원 사이트';

include_once(G5_PATH.'/head.php');

include_once($member_skin_path.'/hanalum_coworker.skin.php');

include_once(G5_PATH.'/tail.php');
?>
