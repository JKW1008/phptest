<?php

    $g_title = '로그인';
    $js_array = [ 'js/login.js' ];

    $menu_code = 'login';

    include "./inc/const.php";

    include 'inc_header.php';
    
?>
<main class="mx-auto border rounded-2 p-5 d-flex gap-5" style="height: calc(100vh - 257px);">
    <form method="post" action="" class="w-25 mt-5 mx-auto" action="">
        <img src="./images/logo.svg" width="72" alt="">
        <h1 class="h3 mb-3">로그인</h1>
        <div class="form-floating mt-2">
            <input type="text" class="form-control" id="f_id" placeholder="아이디 입력" autocomplete="off">
            <label for="f_id">아이디</label>
        </div>
        <div class="form-floating mt-2">
            <input type="password" class="form-control" id="f_pw" placeholder="비밀번호 입력">
            <label for="f_pw">비밀번호</label>
        </div>
        <button class="w-100 mt-2 btn btn-lg btn-primary" id="btn_login" type="button">확인</button>
        <!--테스트용으로 만든 구구루 버튼-->
        <a href="#"><img src="./images/google_btn.png" onclick="check_input" class="w-100 mt-2"></a>
    </form>
</main>


<?php
    include 'inc_footer.php';
?>