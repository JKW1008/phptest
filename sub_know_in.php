<?php
include './inc/common.php';
include "inc/dbconfig.php";

$db = $pdo;

if ($ses_id == '') {
    include 'inc_header.php';

    echo "
        <script>
            alert('로그인이 필요한 서비스입니다.');
            const loginModal = document.querySelector('#loginModal');
            loginModal.showModal();
        </script>
    ";
}
include 'inc_header.php';

include 'inc/board.php';
include "inc/lib.php";      // 페이지네이션

$board = new Board($db);

$limit = 10; // 페이지당 게시글 수
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$boardData = $board->getBoardList($limit, $offset);

$total = count($boardData); // 모든 게시물 수 가져오기

$page_limit = 5;
$param = ''; // 필요한 경우 페이지네이션에 추가 파라미터를 설정하세요

?>
<!-- title -->
<section class="sns_banner">
    <img src="./img/SNS_bg.png" alt="main_banner" class="main_banner">
    <div class="main_title">
        <div class="map_title_text">
            <p class="sns_text_title"><span>동성로관광 </span>지식iN</p>
            <p>여행 가기 전이나 여행중이라도 언제든지! 관광지, 숙박, 음식점, 쇼핑,
                축제, 교통, 문화 등 동성로 여행에 관해서라면 어떤 것이라도
                동성로관광 지식iN에 물어보세요 동성로랑 상주 전문가를 비롯해 제주를
                잘 아는 사람이라면 누구에게라도 답변 받을 수 있습니다</p>
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

    <!-- 글 목록 -->
    <table class="board">
        <colgroup>
            <col width="60%">
            <col width="15%">
            <col width="10%">
            <col width="10%">
        </colgroup>
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
            <td class="item_detail"><?= $item['create_at'] ?></td>
        </tr>
        <?php
        }
        ?>
    </table>

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