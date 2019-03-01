<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<!-- 회원가입약관 동의 시작 { -->
<div>

    <?php
    // 소셜로그인 사용시 소셜로그인 버튼
    @include_once(get_social_skin_path().'/social_register.skin.php');
    ?>


    <div class="alert alert-info" role="alert">
	     <strong><i class="fa fa-exclamation-circle fa-lg"></i> 회원가입약관 및 개인정보처리방침안내의 내용에 동의하셔야 회원가입 하실 수 있습니다.</strong>
    </div>

    <form  name="fregister" id="fregister" action="<?php echo $register_action_url ?>" onsubmit="return fregister_submit(this);" method="POST" autocomplete="off">

    <div id="fregister_chkall">
        <label for="chk_all">전체선택</label>
        <input type="checkbox" name="chk_all"  value="1"  id="chk_all">

    </div>
    <div id="fregister_term" class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-check-square-o" aria-hidden="true"></i> 회원가입약관</div>
        <textarea readonly><?php echo get_text($config['cf_stipulation']) ?></textarea>
        <div class="panel-footer">
            <label class="checkbox-inline" for="agree11">
            <input type="checkbox" name="agree" value="1" id="agree11">
            회원가입약관의 내용에 동의합니다.</label>
        </div>
    </div>

    <div id="fregister_private" class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-check-square-o" aria-hidden="true"></i> 개인정보처리방침안내</div>
            <table class="table" style="border-top:0px;">
                <caption>개인정보처리방침안내</caption>
                <tbody>
                  <tr>
                      <th>목적</th>
                      <th>항목</th>
                      <th>보유기간</th>
                  </tr>
                <tr>
                    <td>이용자 식별 및 본인여부 확인</td>
                    <td>아이디, 이름, 비밀번호</td>
                    <td>회원 탈퇴 시까지</td>
                </tr>
                <tr>
                    <td>고객서비스 이용에 관한 통지</td>
                    <td>연락처 (이메일)</td>
                    <td>회원 탈퇴 시까지</td>
                </tr>
                </tbody>
            </table>

        <div class="panel-footer">
            <label class="checkbox-inline"for="agree21">
            <input type="checkbox" name="agree2" value="1" id="agree21">
            개인정보처리방침안내의 내용에 동의합니다.</label>
        </div>
    </div>

    <div class="btn_confirm">
        <input type="submit" class="btn_submit" value="회원가입">
    </div>

    </form>

    <script>
    function fregister_submit(f)
    {
        if (!f.agree.checked) {
            alert("회원가입약관의 내용에 동의하셔야 회원가입 하실 수 있습니다.");
            f.agree.focus();
            return false;
        }

        if (!f.agree2.checked) {
            alert("개인정보처리방침안내의 내용에 동의하셔야 회원가입 하실 수 있습니다.");
            f.agree2.focus();
            return false;
        }

        return true;
    }

    jQuery(function($){
        // 모두선택
        $("input[name=chk_all]").click(function() {
            if ($(this).prop('checked')) {
                $("input[name^=agree]").prop('checked', true);
            } else {
                $("input[name^=agree]").prop("checked", false);
            }
        });
    });

    </script>
</div>
<!-- } 회원가입 약관 동의 끝 -->
