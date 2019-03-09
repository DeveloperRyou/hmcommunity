<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 최고관리자
//if ($member['mb_id'] == 'junho0725') $is_admin = 'super';
//if ($member['mb_id'] == 'b14095') $is_admin = 'super';

// 그룹관리자 Type1
//if ($gr_id == '그룹아이디') {
    //if ($member['mb_id'] == '회원아이디1') $is_admin = 'group';
    //if ($member['mb_id'] == '회원아이디2') $is_admin = 'group';
//}

// 그룹관리자 Type2
//if ($gr_id == '그룹아이디' && $member['mb_id'] == '회원아이디1') $is_admin = 'group';
//if ($gr_id == '그룹아이디' && $member['mb_id'] == '회원아이디2') $is_admin = 'group';

// 그룹관리자 Type3 : 관리자 > 그룹관리자에 콤마로 구분하여 여러명을 등록합니다(aaa,bbc,ccc)
//if($is_member && $group['gr_admin']) {
//    $tmpArr= explode(',', $group['gr_admin']);
//    if( in_array( $member['mb_id'], $tmpArr)){ $group['gr_admin']=$member['mb_id']; $is_admin = 'group'; }
//}

// 게시판관리자 Type1
//if ($bo_table == '게시판아이디') {
    //if ($member[mb_id] == '회원아이디1') $is_admin = 'board';
    //if ($member[mb_id] == '회원아이디2') $is_admin = 'board';
//}

// 게시판관리자 Type2
//if ($is_admin == 'board') $board[bo_admin] = $member['mb_id'];
?>
