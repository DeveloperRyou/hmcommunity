<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<div id="slide" class="slider" style="margin-bottom:10px">
  <input type="radio" name="pos" class="dot" id="pos1">
  <input type="radio" name="pos" class="dot" id="pos2">
  <input type="radio" name="pos" class="dot" id="pos3">
  <ul class="slideshow-container">
    <li class="mySlides" onclick="location.href='http://hanalum.kr/bbs/board.php?bo_table=vietnam';"><div id="div_img"> <img src="img/main_ad_04.png"> </div> </li>
    <li class="mySlides" onclick="location.href='http://hanalum.kr/bbs/board.php?bo_table=vietnam';"><div id="div_img"> <img src="img/main_ad_04.png"> </div></li>
    <li class="mySlides" onclick="location.href='http://hanalum.kr/bbs/board.php?bo_table=vietnam';"><div id="div_img"> <img src="img/main_ad_04.png"> </div></li>
  </ul>
  <p class="pos">
    <label for="pos1"></label>
    <label for="pos2"></label>
    <label for="pos3"></label>
  </p>
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 3000); // Change image every 3  seconds
}
</script>
<!--
<div>
    <a href="http://hmcoder.kr" target="_blank"> <img src="img/main_ad_dark.png" width=100%> </a>
    <br>
    <br>
</div>
-->
<h2 class="sound_only">최신글</h2>

<div class="latest_wr">
<!-- 최신글 시작 { -->

    <div style="float:left;" class="lt_wr">
    <?php echo latest("theme/basic", "mentor", 5, 25); ?>
    </div>
    <div style="float:left; margin-left:2%;" class="lt_wr">
    <?php echo latest("theme/basic", "info_share", 5, 25); ?>
    </div>

    <!-- } 최신글 끝 -->

</div>

 <div class="latest_wr">
    <!--  사진 최신글2 { -->
     <?php
    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
    //echo latest('theme/pic_basic', 'gallery', 5, 23);
    ?>
    <!-- } 사진 최신글2 끝 -->
</div>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>