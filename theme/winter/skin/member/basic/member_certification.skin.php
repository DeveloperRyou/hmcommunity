<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>
<!-- 한민인 인증 시작 { -->
<div>

    <div class="alert alert-info" role="alert">
	     <strong><i class="fa fa-exclamation-circle fa-lg"></i> 한민인 인증을 하시면 더 많은 서비스를 이용하실 수 있습니다.</strong>
    </div>

    <form class="form-horizontal register-form" role="form" id="fcertificateform" name="fcertificateform" action="<?php echo G5_URL.'/bbs/member_certification_update.php' ?>" onsubmit="return fregisterform_submit(this);" method="post" autocomplete="off">
    <div class="panel panel-default">
      <div class="panel-heading"><strong><i class="fa fa-user fa-lg" style="margin-right:3.5px"></i> 기본 학생정보</strong></div>
      <div class="panel-body">
        <div class="form-group">
            <label class="col-sm-2 control-label" for="cer_mc_name"><b>실명</b></label>
            <div class="col-sm-8">
              <input type="text" name="mc_name" id="cer_mc_name" <?php echo $required ?> value="<?php echo $member['mb_name']?>" class="form-control input-sm" minlength="1" maxlength="3" disabled>
            </div>
        </div>

        <div class="form-group has-feedback">
          <label class="col-sm-2 control-label" for="cer_mc_password"><b>기수</b><strong class="sound_only">필수</strong></label>
          <div class="col-sm-8">
            <input type="number" name="mc_number" id="cer_mc_password" <?php echo $required ?> class="form-control input-sm" minlength="1" maxlength="3">
            <span class="fa fa-check form-control-feedback"></span>
          </div>
        </div>

        <div class="form-group has-feedback">
          <label class="col-sm-2 control-label" for="cer_mc_fclass" style="padding-top:0px"><b>재학생 : 현재반<br>졸업생 : 3학년때의 반</b><strong class="sound_only">필수</strong></label>
          <div class="col-sm-8">
            <input type="number" name="mc_fclass" id="cer_mc_fclass" <?php echo $required ?> class="form-control input-sm" minlength="1" maxlength="2">
            <span class="fa fa-check form-control-feedback"></span>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-8 text-muted">
            <div id="msg_mb_id"></div>
            숫자만 입력 가능. 허위사실 기재시 불이익이 있을 수 있습니다.
          </div>
        </div>
      </div>
    </div>


    <div class="text-center" style="margin:30px 0px;">
      <button type="submit" id="btn_submit" class="btn btn-color" style="width:140px;height:40px">한민고 학생 인증</button>
    </div>

    </form>
</div>

<script>
// submit 최종 폼체크
function fregisterform_submit(f)
{
    //기본 학생정보 검사
    if (f.mc_number.value.length < 1) {
      alert("기수를 입력하십시오.");
      f.mc_number.focus();
      return false;
    }
    if (f.mc_fclass.value.length < 1) {
      alert("1학년때의 반을 입력하십시오.");
      f.mc_fclass.focus();
      return false;
    }

    document.getElementById("btn_submit").disabled = "disabled";

    return true;
}
</script>

<!-- 한민고 인증 끝 -->
