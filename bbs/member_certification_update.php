<?php
include_once('./_common.php');

if (!$is_member)//미가입자 접근 불가 설정
    alert('회원만 이용하실 수 있습니다.', './login.php');


$g5['title'] = '한민고 학생 인증';
//스킨 파일에서 form 태그를 이용해 POST방식으로 넘긴 변수와 답 DB를 대조하여 맞으면 회원 권한 3, 틀리면 스킨페이지로 이동

?>
