<?php

    $g_title = '로그인';
    $js_array = [ 'js/login.js' ];

    $menu_code = 'login';

    include "const.php";

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
        <!--이보다 더 아늑할 수 없는 우리 집 주소는 127.0.0.1-->
        <!--테스트용으로 만든 구구루 버튼-->
        <a href="<?= SocialLogin::socialLoginUrl("google");  ?>"><img src="./images/google_btn.png"
                onclick="check_input" class="w-100 mt-2"></a>
        <a href=<?=  SocialLogin::socialLoginUrl("kakao") ?>><img src="./images/kakao_login_medium_narrow.png"
                onclick="check_input" class="w-100 mt-2"></a>

        <a href=<?=  SocialLogin::socialLoginUrl("naver") ?>><img src="./images/naver_btn.png" onclick="check_input"
                class="w-100 mt-2"></a>
        <!-- php 코드 정렬 -->
    </form>
</main>


<?php
    include 'inc_footer.php';
?>