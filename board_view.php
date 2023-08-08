    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
    <?php
    
    include 'inc/common.php';   // 세션

    include 'inc/dbconfig.php';

    $db = $pdo; 
    
    include "inc/board.php";    //  게시판 클래스
    include "inc/lib.php";      // 페이지네이션

    $bcode = (isset($_GET['bcode']) && $_GET['bcode'] != '') ? $_GET['bcode'] : '';
    $idx = (isset($_GET['idx']) && $_GET['idx'] != '' && is_numeric($_GET['idx'])) ? $_GET['idx'] : '';

    if($bcode == ''){
        die("<script>
                alert('게시판 코드가 빠졌습니다.');
                history.go(-1);
            </script>");
    }

    if($idx == ''){
        die("<script>
                alert('게시물 번호가 빠졌습니다.');
                history.go(-1);
            </script>");
    }

    // 게시판 목록
    include 'inc/boardmanage.php';

    $boardm = new BoardManage($db);
    $boardArr = $boardm->list();
    $board_name = $boardm->getBoardName($bcode);



    $board = new Board($db);    // 게시판 클래스

    $menu_code = 'board';

    $js_array = ['js/board_view.js'];

    $g_title = $board_name;
    
    $boardRow = $board->hitInc($idx);

    $boardRow = $board->view($idx);

    include 'inc_header.php';
?>
    <main class="w-100 mx-auto border rounded-2 p-5">
        <h1 class="text-center"><?= $board_name; ?></h1>

        <div class="vstack w-75 mx-auto">
            <div class="p-3">
                <span class="h3 fw-bolder">
                    <?= $boardRow['subject']; ?>
                </span>
            </div>
            <div class="d-flex border border-top-0 border-start-0 border-end-0 border-bottom-1">
                <span>
                    <?= $boardRow['name']; ?>
                </span>
                <span class="ms-5 me-auto">
                    <?= $boardRow['hit']; ?>회
                </span>
                <span>
                    <?= $boardRow['create_at']; ?>
                </span>
            </div>
            <div class="p-3">
                <?= $boardRow['content']; ?>

                <?php
                    echo $boardRow['files'];
                ?>
            </div>
            <div class="d-flex gap-2 p-3">
                <button class="btn btn-secondary  me-auto">목록</button>
                <button class="btn btn-primary">수정</button>
                <button class="btn btn-danger">삭제</button>
            </div>
        </div>

    </main>
    <?php
    include 'inc_footer.php';
?>