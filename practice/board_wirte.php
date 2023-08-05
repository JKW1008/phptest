<?php
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

    $board = new Board($db);

    $js_array = ['js/board_wirte.js'];

    $g_title = '게시판';

    include 'inc_header.php';
?>
<main class="w-75 mx-auto border rounded-2 p-5">
    <h1 class="text-center">게시판 글쓰기</h1>


</main>
<?php
    include 'inc_footer.php';
?>