<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<!-- 회원 비밀번호 확인 시작 { -->
<div id="mb_confirm" class="mbskin" style="margin-bottom: 100px; width: 572px;">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <h1 style="width: 340px; margin-top: 30px; margin-bottom: 30px;"><i class="glyphicon glyphicon-lock"></i>  <?php echo $g5['title'] ?></h1>

    <p style="padding-bottom: 30px; padding-left: 25px; padding-right: 35px; width: 565px;">
        <strong style="font-size:15px; width: 240px;">비밀번호를 한번 더 입력해주세요.</strong>
        <?php if ($url == 'member_leave.php') { ?>
        비밀번호를 입력하시면 회원탈퇴가 완료됩니다.
        <?php }else{ ?>
        회원님의 정보를 안전하게 보호하기 위해 비밀번호를 한번 더 확인합니다.
        <?php }  ?>
    </p>

    <form name="fmemberconfirm" action="<?php echo $url ?>" onsubmit="return fmemberconfirm_submit(this);" method="post">
    <input type="hidden" name="mb_id" value="<?php echo $member['mb_id'] ?>">
    <input type="hidden" name="w" value="u">

    <fieldset style="padding-top: 30px; padding-bottom: 30px; padding-left: 30px; padding-right: 30px;">
        <div style="padding-bottom: 10px;"><span style="font-size:0.92em; color:#666">회원아이디 : </span><span style="font-weight:bold"><?php echo $member['mb_id'] ?></span></div>
        <label for="confirm_mb_password" class="sound_only">비밀번호<strong>필수</strong></label>
        <input type="password" name="mb_password" id="confirm_mb_password" required class="required frm_input" size="15" maxLength="20" placeholder="비밀번호">
        <input type="submit" value="확인" id="btn_submit" class="btn_submit">
    </fieldset>

    </form>

</div>

<script>
function fmemberconfirm_submit(f)
{
    document.getElementById("btn_submit").disabled = true;

    return true;
}
</script>
<!-- } 회원 비밀번호 확인 끝 -->