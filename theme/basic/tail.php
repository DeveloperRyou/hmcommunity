<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/tail.php');
    return;
}
?>

    </div>

    <?php
    if(!$_POST["side_hidden"]){
        echo "<div id=\"aside\">";
            //공지사항
            // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
            // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
            // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정

            //echo latest('theme/notice', 'notice', 4, 13);
            echo outlogin('theme/basic'); // 외부 로그인, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정
            echo poll('theme/basic'); // 설문조사, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정
            //echo visit('theme/basic'); // 접속자집계, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정
            echo latest("theme/basic", "new", 15, 8); //최근 게시판
            ?>
            <div id="side_ad">
              <ul>
                <li><div id="ad_img"><a href="http://www.hanmin.hs.kr" target="_blank"> <img src="<?php echo G5_URL?>/img/main_ad_01.png" style="width:100%;height:auto;"></div> </a></li>
                <li><div id="ad_img"><a href="http://my.hanmin.hs.kr/" target="_blank"><img src="<?php echo G5_URL?>/img/main_ad_02.png"></div> </a></li>
                <li><div id="ad_img"><a href="http://hmcoder.kr:8080" target="_blank"><img src="<?php echo G5_URL?>/img/main_ad_03.png"></div> </a></li>
              </ul>
            </div>
            <?php


        echo "</div>";
    }
    ?>
</div>

</div>
<!-- } 콘텐츠 끝 -->

<hr>

<!-- 하단 시작 { -->
<div id="ft">

    <div id="ft_wr">
        <div id="ft_link">
            <a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=company">사이트소개</a>
            <a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=privacy">개인정보처리방침</a>
            <a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=provision">사이트이용약관</a>
            <a href="<?php echo get_device_change_url(); ?>">모바일버전</a>
        </div>
        <div id="ft_catch"><img src="<?php echo G5_IMG_URL; ?>/ft_logo.png" alt="<?php echo G5_VERSION ?>" style="height: 100px"></div>
        <div id="ft_copy"> 한아름 공식 이메일: contacthanmin01@gmail.com </div>
        <div id="ft_copy">Copyright &copy; <b>hmcoder.kr/hm.</b> All rights reserved.</div>
    </div>

    <button type="button" id="top_btn"><i class="fa fa-arrow-up" aria-hidden="true"></i><span class="sound_only">상단으로</span></button>
        <script>

        $(function() {
            $("#top_btn").on("click", function() {
                $("html, body").animate({scrollTop:0}, '500');
                return false;
            });
        });
        </script>
</div>

<?php
if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { ?>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");
?>
