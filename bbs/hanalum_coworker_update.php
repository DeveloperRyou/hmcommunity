<?php
include_once('./_common.php');
if (!$is_member)//미가입자 접근 불가 설정
    alert('회원만 이용하실 수 있습니다.', './login.php');


$g5['title'] = '한아름 팀원 사이트';

?>
<?php

//DB접근 후 채점자의 이번주 점수 삭제

//DB에 채점자가 매긴 이번주의 점수 추가

//답안 DB 접근 및 값 비교
$sql = "SELECT * FROM g5_member_certification WHERE mc_name = '{$member['mb_name']}' AND mc_number = '{$_POST['mc_number']}' AND  mc_fclass = '{$_POST['mc_fclass']}'";
$result = sql_query($sql);
$namelist=sql_fetch_array($result);

if(!$namelist)
		alert('잘못된 기수, 성명, 반입니다. 다시 확인해 주세요.','./member_certification.php');


//멤버 DB 접근 및 값 비교
$mb_id = $member['mb_id'];
$mb_1 = $_POST['mc_number'];
$mb_2 = $_POST['mc_fclass'];
$sql = "UPDATE g5_member SET mb_level=3, mb_1='$mb_1', mb_2='$mb_2' WHERE mb_id='$mb_id' LIMIT 1";
$result = sql_query($sql);
alert('인증에 성공했습니다!');
goto_url(G5_URL);
?>
