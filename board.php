<?php
    
    include 'inc/common.php';

    include 'inc/dbconfig.php';

    $db = $pdo; 
    
    include "inc/board.php";

    $bcode = (isset($_GET['bcode']) && $_GET['bcode'] != '') ? $_GET['bcode'] : '';

    if($bcode == ''){
        die("<script>
                alert('게시판 코드가 빠졌습니다.');
                histoty.go(-1);
            </script>");
    }

    // 게시판 목록
    include 'inc/boardmanage.php';

    $boardm = new BoardManage($db);
    $boardArr = $boardm->list();
    $board_name = $boardm->getBoardName($bcode);

    $board = new Board($db);

    $menu_code = 'board';

    $js_array = ['js/board.js'];

    $g_title = $board_name;

    include 'inc_header.php';
?>
<main class="w-75 mx-auto border rounded-2 p-5">
    <h1 class="text-center"><?= $board_name; ?></h1>
    <table class="table table-dark table-striped mt-5">
        <tr>
            <th>번호</th>
            <th>제목</th>
            <th>이름</th>
            <th>날짜</th>
            <th>조회수</th>
        </tr>
        <tr>
            <td>1</td>
            <td>행복한 하루</td>
            <td>홍길동</td>
            <td>03-02</td>
            <td>5</td>
        </tr>
        <tr>
            <td>1</td>
            <td>행복한 하루</td>
            <td>홍길동</td>
            <td>03-02</td>
            <td>5</td>
        </tr>
        <tr>
            <td>1</td>
            <td>행복한 하루</td>
            <td>홍길동</td>
            <td>03-02</td>
            <td>5</td>
        </tr>
    </table>
    <div class="d-flex justify-content-between align-items-start">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
        <button class="btn btn-primary" id="btn_write">글쓰기</button>
    </div>
</main>
<?php
    include 'inc_footer.php';
?>