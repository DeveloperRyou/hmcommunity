<?php
$sub_menu = "200110";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'r');

$sql = "SELECT * FROM g5_member_certification";
$result = sql_query($sql);

$g5['title'] = "한민고 인증 QA";
include_once('./admin.head.php');

?>

<div class="local_desc01 local_desc">
    <p><strong>주의!</strong> QA 수정 작업 후 반드시 <strong>확인</strong>을 누르셔야 저장됩니다.</p>
</div>

<form name="fmenulist" id="fmenulist" method="post" action="./member_certificate_update.php" onsubmit="return fmenulist_submit(this);">
<input type="hidden" name="token" value="">

<div id="menulist" class="tbl_head01 tbl_wrap">
    <table>
    <caption><?php echo $g5['title']; ?> 목록</caption>
    <thead>
    <tr>
        <th scope="col">번호</th>
        <th scope="col">문제</th>
        <th scope="col">답</th>
        <th scope="col">관리</th>
    </tr>
    </thead>
    <tbody>
    <tr class="qa_list hidden sound_only">
          <td class="td_qa_id">
              <input type="hidden" name="new[]" value="new">
              <label for="qa_id" class="sound_only">번호</label>
              new
          </td>
          <td>
              <label for="qa_question" class="sound_only">질문<strong class="sound_only"> 필수</strong></label>
              <input type="text" value="질문" name="qa_content_" required class="required tbl_input full_input">
          </td>
          <td class="td_answer">
              <label for="qa_answer" class="sound_only">답</label>
              <input type="text" value="답" name="qa_answer_" required class="required tbl_input full_input">
          </td>
          <td class="td_mng" style="width:60px;">
              <button type="button" class="btn_del_menu btn_02">삭제</button>
          </td>
    </tr>
    <?php
    for ($i=0; $row=sql_fetch_array($result); $i++)
    {
        $bg = 'bg'.(-($i%2-1));
    ?>
    <tr class="<?php echo $bg; ?> qa_list id_<?php echo $row['qa_id']; ?>">
        <td class="td_qa_id">
            <input type="hidden" name="code[]" value="<?php echo substr($row['qa_id'], 0, 2) ?>">
            <label for="qa_id_<?php echo $i; ?>" class="sound_only">번호</label>
            <?php echo $i+1?>
        </td>
        <td>
            <label for="qa_question_<?php echo $i; ?>" class="sound_only">질문<strong class="sound_only"> 필수</strong></label>
            <input type="text" value="<?php echo $row['qa_content'] ?>" name="qa_content_<?php echo $i; ?>" required class="required tbl_input full_input">
        </td>
        <td class="td_answer">
            <label for="qa_answer_<?php echo $i; ?>" class="sound_only">답</label>
            <input type="text" value="<?php echo $row['qa_answer'] ?>" name="qa_answer_<?php echo $i; ?>" required class="required tbl_input full_input">
        </td>
        <td class="td_mng" style="width:60px;">
            <button type="button" class="btn_del_menu btn_02">삭제</button>
        </td>
    </tr>
    <?php
    }
    ?>
    </tbody>
    </table>
</div>

<div class="btn_fixed_top">
    <button type="button" onclick="return add_menu();" class="btn btn_02">질문추가<span class="sound_only"> 새창</span></button>
    <input type="submit" name="act_button" value="확인" class="btn_submit btn ">
</div>

</form>

<script>
$(function() {
    $(document).on("click", ".btn_del_menu", function() {
        if(!confirm("문제를 삭제하시겠습니까?"))
            return false;

        var code = $(this).closest("tr").find("input[name='code[]']").val();
        $("tr.id_"+code).remove();

        var code = $(this).closest("tr").find("input[name='new[]']").val();
        $("tr.id_"+code).remove();

        $("#menulist tr.qa_list").each(function(index) {
            $(this).removeClass("bg0 bg1")
                .addClass("bg"+(index % 2));
        });
    });
});

function add_menu()
{
    var new_num=0;
    var new_tr=$("tr.hidden").clone();
    $("tbody").append(new_tr);
    $("#menulist tr.qa_list").each(function(index) {
        $(this).removeClass("bg0 bg1")
            .addClass("bg"+(index % 2));

        if($(this).hasClass("id_new_"+new_num)===true) new_num+=1;

        if(index!=0 && $(this).hasClass("hidden")===true){
            $(this).removeClass("hidden sound_only")
            $(this).addClass("id_new_"+new_num);
            $(this).find("input[name='new[]']").val("new_"+new_num);
            $(this).find("input[name='qa_content_']").attr("name","qa_content_new_"+new_num);
            $(this).find("input[name='qa_answer_']").attr("name","qa_answer_new_"+new_num);
        }
    });
}

function fmenulist_submit(f)
{
    var me_links = document.getElementsByName('me_link[]');
    var reg = /^javascript/;
    for (i=0; i<me_links.length; i++){

	    if( reg.test(me_links[i].value) ){

            alert('링크에 자바스크립트문을 입력할수 없습니다.');
            me_links[i].focus();
            return false;
        }
    }

    return true;
}
</script>

<?php
include_once ('./admin.tail.php');
?>
