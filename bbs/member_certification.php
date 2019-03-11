<?php
include_once('./_common.php');
$_POST["side_hidden"]=TRUE;
$_POST["use_bootstrap"]=TRUE;

if (!$is_member)//미가입자 접근 불가 설정
    alert('회원만 이용하실 수 있습니다.', './login.php');


$g5['title'] = '한민고 학생 인증';

include_once(G5_PATH.'/head.php');

include_once($member_skin_path.'/member_certification.skin.php');

include_once(G5_PATH.'/tail.php');
?>
