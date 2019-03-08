<?php
include_once('./_common.php');

if (!$is_member)//미가입자 접근 불가 설정
    alert('회원만 이용하실 수 있습니다.', './login.php');


$g5['title'] = '한민고 학생 인증';

include_once(G5_PATH.'/head.php');

//include_once($member_skin_path.'/member_confirm.skin.php');
?>

<div class="page_certification">
    <form action="memeber_certification_update.php" method="post">
        <div class="content_certification">
            <p> 한민고등학교 몇 기 이신지 작성해주세요. </p>
            <input type="text" name="mc_number" placeholder="(숫자만 입력해주세요)">
            <p> 한민고등학교 1학년 몇 반이신지 작성해주세요. </p>
            <input type="text" name="mc_fclass" placeholder="(숫자만 입력해주세요)"> 
            
            <p> 한민고등학교 재학생, 졸업생을 인증하는 질문입니다. </p>
            <?php 
                // DB 끌어와야됨.
                $sql = "SELECT * FROM `g5_member_certification`";

            ?>
            


        </div>
    </form>

</div>

<?php
include_once(G5_PATH.'/tail.php');
?>
