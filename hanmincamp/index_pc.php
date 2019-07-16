<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

?>

<h2 class="sound_only">최신글</h2>


 <div class="latest_wr">
    <!--  사진 최신글2 { -->
     <?php
    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
    echo latest('theme/pic_basic', 'leadershipcamp', 8, 20);
    echo latest('theme/pic_basic', 'miucamp', 8, 20);
    ?>
    <!-- } 사진 최신글2 끝 -->
</div>

<div class="latest_wr">
<!-- 최신글 시작 { -->

    <div style="float:left;" class="lt_wr">
    <?php echo latest("theme/basic", "notice_hanmincamp", 5, 25); ?>
    </div>
    <div style="float:left; margin-left:2%;" class="lt_wr">
    <?php echo latest("theme/basic", "consult_hanmincamp", 5, 25); ?>
    </div>

    <!-- } 최신글 끝 -->

</div>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
