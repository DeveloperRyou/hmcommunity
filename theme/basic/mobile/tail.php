<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
    </div>
</div>


<?php //echo poll('theme/basic'); // 설문조사 ?>
<?php //echo popular('theme/basic'); // 인기검색어 ?>
<?php //echo visit('theme/basic'); // 방문자수 ?>


<div id="ft" class="<?php if(defined('_INDEX_')) echo 'index';?>">
    <div id="ft_copy">
        <div id="ft_company" style="margin-bottom:10px;">
            <a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=company">사이트소개</a>
            <a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=privacy">개인정보처리방침</a>
            <a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=provision">사이트이용약관</a>
            <?php
            if(G5_DEVICE_BUTTON_DISPLAY && G5_IS_MOBILE) { ?>
              <a href="<?php echo get_device_change_url(); ?>" id="device_change">PC버전</a>
            <?php }?>
        </div>
        한아름 공식 이메일: contacthanmin01@gmail.com<br>Copyright &copy; <b>hanalum.kr</b> All rights reserved.<br>
    </div>
    <button type="button" id="top_btn"><i class="fa fa-arrow-up" aria-hidden="true"></i><span class="sound_only">상단으로</span></button>

    <?php
    if ($config['cf_analytics']) {
        echo $config['cf_analytics'];
    }
    ?>
</div>



<script>
jQuery(function($) {

    $( document ).ready( function() {

        // 폰트 리사이즈 쿠키있으면 실행
        font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));

        //상단으로
        $("#top_btn").on("click", function() {
            $("html, body").animate({scrollTop:0}, '500');
            return false;
        });

    });
});
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");
?>
