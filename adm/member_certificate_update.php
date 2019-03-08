<?php
$sub_menu = "100110";
include_once('./_common.php');

check_demo();

auth_check($auth[$sub_menu], 'd');

check_admin_token();

// 이전 메뉴정보 삭제

$sql = "DELETE from g5_member_certification";
sql_query($sql);

// 기존 QA 입력
$count = count($_POST['code']);

$idx=0;
$check_delete=0;
for ($i=0;$i<$count; $i++)
{
    $now_content=$_POST['qa_content_'.(string)$i];
    $now_answer=$_POST['qa_answer_'.(string)$i];
    if($now_content){
      //문제 등록
      $sql = " INSERT into g5_member_certification
                  set qa_id  = '$i-$check_delete',
                      qa_content  = '$now_content',
                      qa_answer   = '$now_answer' ";
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
    $now_content=$_POST['qa_content_new_'.(string)$new_i];
    $now_answer=$_POST['qa_answer_new_'.(string)$new_i];

    if($now_content){
      //문제 등록
      $sql = " INSERT into g5_member_certification
                  set qa_id  = '$new_i+$idx-$check_delete',
                      qa_content  = '$now_content',
                      qa_answer   = '$now_answer' ";
      sql_query($sql);
    }
    else{
      $check_delete+=1;
      $count+=1;
    }
}
goto_url('./member_certificate.php');
?>
