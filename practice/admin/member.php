<?php
    $g_title = 'test';
    $js_array = [ 'js/home.js' ];

    $menu_code = 'home';

    include 'inc_common.php';
    include 'inc_header.php';
    include '../inc/dbconfig.php';

    $db = $pdo;

    include '../inc/memeber.php';    // 회원관리 Class
    include '../inc/lib.php';       // 페이지네이션

    // $total, $limit, $page_limit, $page, $param
    
    $mem = new Member($db);

    $total = $mem->total();
    $limit = 5;
    $page_limit =5;
    $page = (isset($_GET['page']) && $_GET['page'] != '' && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
    $param = ''; 


    $memArr = $mem->list();

?>
<main class="w-75 mx-auto border rounded-5 p-5" style="height: calc(100vh - 257px);">
    <div class="container">
        <h3>회원관리</h3>
    </div>
    <table class="mt-3 table table-border">
        <tr>
            <th>번호</th>
            <th>아이디</th>
            <th>이름</th>
            <th>이메일</th>
            <th>등록일시</th>
            <th>관리</th>
        </tr>
        <?php
            foreach($memArr AS $row){

            // 2023-11-11 11:11:11
            $row['create_at'] = substr($row['create_at'], 0, 16);
        ?>
        <tr>
            <td><?= $row['idx']; ?></td>
            <td><?= $row['id']; ?></td>
            <td><?= $row['name']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['create_at']; ?></td>
            <td>
                <button class="btn btn-primary btn-sm">수정</button>
                <button class="btn btn-danger btn-sm">삭제</button>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
    <?php
        echo my_pagination($total, $limit, $page_limit, $page, $param);
    ?>
</main>


<?php
    include 'inc_footer.php';
?>