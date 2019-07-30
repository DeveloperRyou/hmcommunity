<?php
$sub_menu = "100110";
include_once('./_common.php');

check_demo();

auth_check($auth[$sub_menu], 'd');

check_admin_token();

// 이전 메뉴정보 삭제

$sql = "DELETE from g5_member_certification";
sql_query($sql);

// 기존 명단 입력
$count = count($_POST['code']);

$idx=0;
$check_delete=0;
for ($i=0;$i<$count; $i++)
{
    $now_number=$_POST['mc_number_'.(string)$i];
    $now_fclass=$_POST['mc_fclass_'.(string)$i];
    $now_name=$_POST['mc_name_'.(string)$i];
    if($now_name){
      //문제 등록
      $now_id = $i-$check_delete;
      $sql = " INSERT into g5_member_certification
                  set mc_id  = '$now_id',
                      mc_number  = '$now_number',
                      mc_fclass  = '$now_fclass',
                      mc_name   = '$now_name' ";

      sql_query($sql);
    }
    else{
      $check_delete+=1;
      $count+=1;
    }
    $idx=$i-$check_delete+1;
}

// 새 QA 입력
$count = count($_POST['new'])-1;

$check_delete=0;
for ($new_i=0;$new_i<$count; $new_i++)
{
  $now_number=$_POST['mc_number_new_'.(string)$new_i];
  $now_fclass=$_POST['mc_fclass_new_'.(string)$new_i];
  $now_name=$_POST['mc_name_new_'.(string)$new_i];

    if($now_name){
      //문제 등록
      $now_id=$new_i+$idx-$check_delete;
      $sql = " INSERT into g5_member_certification
                  set mc_id  = '$now_id',
                      mc_number  = '$now_number',
                      mc_fclass  = '$now_fclass',
                      mc_name   = '$now_name' ";

      sql_query($sql);
    }
    else{
      $check_delete+=1;
      $count+=1;
    }
}
goto_url('./member_certificate.php');
?>
