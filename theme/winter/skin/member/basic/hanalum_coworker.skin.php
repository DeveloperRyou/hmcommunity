<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>
<!-- 한아름 팀원 소개-->
<div>
    <div class="alert alert-info" role="alert" style="text-align:center">
	     <strong>한아름 팀원 소개</strong>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading"><strong>조직도</strong></div>
      <div class="panel-body">
        <style>
          th{text-align: center;}
          td{text-align: center;}
        </style>
        <table style="width:100%">
          <tbody>
            <tr>
              <th colspan="4">대표 류성민<br>부대표 배기찬</th>
            </tr>
            <tr>
              <th>경영총괄부<br>부장 공석</th>
              <th>온라인사업부<br>부장 공석</th>
              <th>통합사업부<br>부장 공석</th>
              <th>특별사업부</th>
            </tr>
            <tr>
              <th>경영지원팀</th>
              <th>사이트운영팀</th>
              <th>커뮤니케이션팀</th>
              <th>재학생팀</th>
            </tr>
            <tr>
              <td>인사관리 차세임</td>
              <td>게시판관리 김준호</td>
              <td>홍보 배기찬</td>
              <td>공석</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading"><strong>팀원 기여도</strong></div>
      <div class="panel-body">
        <style>
          th{text-align: center;}
          td{text-align: center;}
        </style>
        <table style="width:100%">
          <tbody>
            <tr>
              모든 팀원의 기여도를 점수화, 표로 프린트하는 기능 필요. 이때, 점수를 매기지 않은 주는 빨간색으로 표시하면서 점수에서 -1 필요. 1점대일 경우 배경 노랑 등으로 강조. 4점대이상일 경우 배경 파랑으로 강조.
            </tr>
          </tbody>
        </table>
      </div>
    </div>


    <div class="text-center" style="margin:30px 0px;">
      <button type="submit" id="btn_submit" class="btn btn-color" style="width:140px;height:40px" onclick="open_hidden()">점수창 펼치기</button>
    </div>

    <div id="div_grade" style="display:none">
      DB를 업데이트 할 수 있는 form 생성.
      폼 내부는 자신을 선택할 수 있는 체크박스 1,
      나머지 팀원의 점수(본인포함)을 매기는 박스 구현, 점수는 1~5사이로 줄 수 있음.
      폼에는 비밀번호 필요. 한아름 팀원만 업데이트 가능
    </div>

</div>

<script>
function open_hidden()
{
    document.getElementById("div_grade").style = "";

    return true;
}
</script>

<!-- 한민고 인증 끝 -->
