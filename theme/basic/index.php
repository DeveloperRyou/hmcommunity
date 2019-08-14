<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');

//한민캠프 페이지로 이동
if(G5_IS_HANMINCAMP) {
  include_once(G5_PATH.'/hanmincamp/index_pc.php');
  return;
}

?>
<div id="advertise">
  <div id="left_ad">
    <a href = "http://hanalum.kr/bbs/board.php?bo_table=mentor&wr_id=10">
      <div id="div_img">
          <img src="img/main_ad_07.jpg">
      </div>
    </a> 
  </div>
  <div id="slide" class="slider">
    <input type="radio" name="pos" class="dot" id="pos1">
    <input type="radio" name="pos" class="dot" id="pos2">
    <input type="radio" name="pos" class="dot" id="pos3">
    <input type="radio" name="pos" class="dot" id="pos4">
    <ul class="slideshow-container">
      <a href = "http://hanalum.kr/bbs/board.php?bo_table=notice&wr_id=33">
        <li class="mySlides">        
          <div id="div_img"> 
            <img src="img/main_ad_08.jpg"> 
          </div>
        </li>
      </a>
      <a href = "http://hanalum.kr/bbs/board.php?bo_table=music_90s"> 
        <li class="mySlides"> 
          <div id="div_img" style="top:-20px"> 
            <img src="img/main_ad_06.jpg"> 
          </div>
        </li>
      </a>
      <a href ="http://hanalum.kr/bbs/board.php?bo_table=radio">
        <li class="mySlides"> 
          <div id="div_img" style="top:-20px"> 
            <img src="img/main_ad_05.png"> 
          </div> 
        </li>
      </a>
      <a href = "http://hanalum.kr/bbs/board.php?bo_table=vietnam">
        <li class="mySlides">
          <div id="div_img" > 
            <img src="img/main_ad_04.png"> 
          </div>
        </li>
      </a>
    </ul>
    <p class="pos">
      <label for="pos1"></label>
      <label for="pos2"></label>
      <label for="pos3"></label>
      <label for="pos4"></label>
    </p>
  </div>
</div>

<script>
var slideIndex = 0;
var slides = document.getElementsByClassName("mySlides");
var dots = document.getElementsByClassName("dot");    

showSlides();

$('.dot#pos1').change(function(){
  slideIndex=1;
  var i;
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  dots[slideIndex-1].className += " active";
  setTimeout(function(){},4000);
});

$('.dot#pos2').change(function(){
  slideIndex=2;
  var i;
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  dots[slideIndex-1].className += " active";
  setTimeout(function(){},4000);
});

$('.dot#pos3').change(function(){
  slideIndex=3;
  var i;
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  dots[slideIndex-1].className += " active";
  setTimeout(function(){},4000);
});

$('.dot#pos4').change(function(){
  slideIndex=4;
  var i;
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  dots[slideIndex-1].className += " active";
  setTimeout(function(){},4000);
});

function showSlides() {
    var i;
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides,4000); // Change image every 4  seconds
}
</script>
<!--
<div>
    <a href="http://hmcoder.kr" target="_blank"> <img src="img/main_ad_dark.png" width=100%> </a>
    <br>
    <br>
</div>
-->
<!--포인트랭킹 시작-->
<h2 class="sound_only">최신글</h2>

<div class="latest_wr">
<!-- 최신글 시작 { -->
    <div style="float:left;" class="lt_wr">
    <?php echo latest("theme/basic", "notice_council", 5, 30); ?>
    </div>
    <div style="float:left; margin-left:2%;" class="lt_wr">
    <?php echo latest("theme/basic", "mentor", 5, 30); ?>
    </div>
    <div style="float:left;" class="lt_wr">
    <?php echo latest("theme/basic", "suggest_to_hanmin", 5, 30); ?>
    </div>
    <div style="float:left; margin-left:2%;" class="lt_wr">
    <?php echo latest("theme/basic", "vietnam", 5, 30); ?>
    </div>
    <div style="float:left;" class="lt_wr">
    <?php echo latest("theme/basic", "radio", 5, 30); ?>
    </div>
    <div style="float:left; margin-left:2%;" class="lt_wr">
    <?php echo latest("theme/basic", "music_90s", 5, 30); ?>
    </div>
    <div style="float:left;" class="lt_wr">
    <?php echo latest("theme/basic", "hanminagora", 5, 30); ?>
    </div>
    <div style="float:left; margin-left:2%;" class="lt_wr">
    <?php echo latest("theme/basic", "free_anonymous", 5, 30); ?>
    </div>
    <div style="float:left;" class="lt_wr">
    <?php echo latest("theme/basic", "free_YB", 5, 30); ?>
    </div>
    <div style="float:left; margin-left:2%;" class="lt_wr">
    <?php echo latest("theme/basic", "free_OB", 5, 30); ?>
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
