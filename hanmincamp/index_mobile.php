<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<!-- 메인화면 최신글 시작 -->
<div id="container_main">

<div class="big_img" onclick="location.href='bbs/group.php?gr_id=camp';">
 <img src="img/hanmincamp/main_ad_01.jpg">
</div>
<div class="small_img left" onclick="location.href='bbs/content.php?co_id=introduce_mce&gr_id=mce';">
 <img src="img/hanmincamp/main_ad_02.jpg">
</div>
<div class="small_img right" onclick="location.href='https://www.youtube.com/watch?v=1w-TzLPYoIs';">
 <img src="img/hanmincamp/main_ad_03.jpg">
</div>

</div>
<!-- 메인화면 최신글 끝 -->

<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>
