<?php
include './inc/common.php';
include "inc/dbconfig.php";

$db = $pdo;

include 'inc_header.php';

include 'inc/board.php';
include "inc/lib.php"; // 페이지네이션

$board = new Board($db);

$limit = 10; // 페이지당 게시글 수
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$param = '&search=' . $_GET['search'] . '&list_answer=' . $_GET['list_answer']; // 기존 쿼리 파라미터를 페이지네이션에 추가

$offset = ($page - 1) * $limit;

$paramArr = []; // Initialize the $paramArr array here

$boardData = $board->getBoardList($limit, $offset, $paramArr);
$total = count($board->getBoardList(9999, 0, $paramArr)); // 9999를 최대 값으로 지정하여 전체 게시물 수 계산

$page_limit = 5;


?>
<link rel="stylesheet" href="./css/customer_in.css">
<!-- title -->
<section class="sns_banner">
    <img src="./img/customer_main_banner.png" alt="main_banner" class="main_banner">
    <div class="main_title">
        <div class="map_title_text">
            <p class="sns_text_title"><span>고객센터 </span></p>
            <p>사이트 이용시 불편한 점이 있다거나 건의사항, 틀린 정보 신고 등 자유롭게 문의해주세요.
                이용자의 의견을 적극 반영하는 동성로랑이 되겠습니다.</p>
        </div>
    </div>
</section>

<!-- 게시판!  -->
<main class="question_wrapper">
    <!-- 검색공간 -->
    <div class="search_space">
        <select name="search" class="search_list">
            <option value="">제목</option>
        </select>
        <input type="text" />
        <button><i class="fa-solid fa-magnifying-glass">검색</i></button>
    </div>

    <!-- 셀렉트 -->
    <div class="list_select">
        <p><?= $total ?>개의 게시글이 있습니다.</p>
        <div>
            <select name="list_answer" class="list_answer">
                <option value="">카테고리</option>
                <option value="">관광지</option>
                <option value="">음식</option>
                <option value="">쇼핑</option>
                <option value="">숙박</option>
            </select>
            <select name="list_answer" class="list_answer">
                <option value="">답변여부</option>
                <option value="">답변</option>
                <option value="">미답변</option>
            </select>
        </div>
    </div>

    <table class="board">

        <th>제목</th>
        <th class="item-none">카테고리</th>
        <th class="item-none">조회 수</th>
        <th>작성일</th>
        <?php
foreach ($boardData as $item) {
    ?>
        <tr class="board_item">
            <td>
                <span>[미답변]</span>
                <?= $item['subject']; ?>
            </td>
            <td class="item_detail item-none"><?= $item['manage_name'] ?></td>
            <td class="item_detail item-none"><?= $item['hit'] ?></td>
            <td class="item_detail"><?= substr($item['create_at'], 0, 10); ?></td>
        </tr>
        <?php
}
?>
    </table>
    <style>
    .board th {
        text-align: center;
    }
    </style>
    <!-- 페이지네이션 -->
    <div class="page">
        <?php
echo my_pagination($total, $limit, $page_limit, $page, $param);
?>
    </div>
</main>

<?php
include 'inc_footer.php';
?>