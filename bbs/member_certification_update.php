<?php
include_once('./_common.php');
if (!$is_member)//미가입자 접근 불가 설정
    alert('회원만 이용하실 수 있습니다.', './login.php');


$g5['title'] = '한민고 학생 인증';

?>
<?php
//답안 DB 접근 및 값 비교
$sql = "SELECT * FROM g5_member_certification";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++){
    $question[$i]=$row;
}
for ($j=0; $j<=5; $j++)
{
	$user_a=$_POST['mc_A'.$j];
	$db=$question[$_POST['mc_Q'.$j]];
	$re=strcmp($user_a,$db['qa_answer']);
	if($re!=0)
		alert('틀렸습니다 ㅠㅠ 다시 시도해주세요','./member_certification.php');
}

//멤버 DB 접근 및 값 비교
$mb_id = $member['mb_id'];
$mb_1 = $_POST['mc_number'];
$mb_2 = $_POST['mc_fclass'];
$sql = "UPDATE g5_member SET mb_level=3, mb_1='$mb_1', mb_2='$mb_2' WHERE mb_id='$mb_id' LIMIT 1";
$result = sql_query($sql);
alert('인증에 성공했습니다!');
goto_url(G5_URL);
?>
