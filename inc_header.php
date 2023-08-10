<?php
    include 'inc/common.php';
    include "inc/dbconfig.php";

    $db = $pdo;

    include "inc/member.php";
    $js_array = ['js/login.js', 'js/board.js', 'js/board_write.js'];


    include 'inc/boardmanage.php';   

    $boardm = new BoardManage($db);  
    $boardArr = $boardm->list();
    include "const.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>동성로랑</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="./js/signup.js"></script>
    <script src="./js/member.js"></script>
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link type="image/x-icon" rel="icon" sizes="180x180" href="./img/apple-icon-180x180.png" />
    <link rel="stylesheet" href="./css/all.css">
    <?php
    if (isset($js_array)) {
        foreach ($js_array as $var) {
            echo  '<script src="' . $var . '?v=' . date('YmdHis') . '"></script>' . PHP_EOL;
        }
    }
    ?>
</head>

<body>
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <div class="header_inner">
            <a href="./index.php"><img src="./img/logo_black.png" alt="동성로랑 logo" /></a>
            <nav class="menu_wrapper">
                <ui>
                    <li>
                        <div class="main_menu_title main">
                            <span class="main_title">여행지</span>
                            <i class="fa-sharp fa-solid fa-caret-down"></i>
                            <ul class="sub_menu">
                                <a href="./sub_toulist.php">
                                    <li>관광지</li>
                                </a>
                                <a href="./sub_food.php">
                                    <li>음식</li>
                                </a>
                                <a href="./sub_shopping.php">
                                    <li>쇼핑</li>
                                </a>
                                <a href="./sub_accommodation.php">
                                    <li>숙박</li>
                                </a>
                            </ul>
                        </div>
                    </li>
                </ui>

                <ui>
                    <li>
                        <div class="main_menu_title main">
                            <span class="main_title">나의 여행</span>
                            <i class="fa-sharp fa-solid fa-caret-down"></i>
                            <ul class="sub_menu">
                                <a href="./sub_zzim.php">
                                    <li>찜한 여행</li>
                                </a>
                                <a href="./sub_review.php">
                                    <li>나의 리뷰</li>
                                </a>
                                <a href="./sub_question.php">
                                    <li>나의 질문</li>
                                </a>
                            </ul>
                        </div>
                    </li>
                </ui>
                <ui>
                    <li>
                        <div class="main_menu_title main">
                            <span class="main_title">커뮤니티</span>
                            <i class="fa-sharp fa-solid fa-caret-down"></i>
                            <ul class="sub_menu">
                                <a href="./sub_sns.php">
                                    <li>SNS</li>
                                </a>
                                <a href="./sub_know_in.php">
                                    <li>동성로 지식IN</li>
                                </a>
                                <a href="./sub_service.php">
                                    <li>고객센터</li>
                                </a>
                            </ul>
                        </div>
                    </li>
                </ui>
            </nav>
            <div class="right_nav">
                <div class="right_nav_icon">
                    <div id="weather">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <?php 

                            $ses_id    = (isset($_SESSION['ses_id'   ]) && $_SESSION['ses_id'   ] != '') ? $_SESSION['ses_id'   ] : ''; 
                            $ses_level = (isset($_SESSION['ses_level']) && $_SESSION['ses_level'] != '') ? $_SESSION['ses_level'] : '';

                            if (isset($ses_id) && $ses_id != '') {
                                  // 로그인 상태 
                        ?>
                    <?php 
                                if ($ses_level == 10) { 
                        ?>
                    <li class="nav-item"><a href="./admin/" class="nav-link">관리자</a></li>
                    <?php 
                                } 
                        ?>


                    <li class="nav-item"><a href="mypage.php" class="nav-link"><button>마이페이지</button></a></li>
                    <li class="nav-item"><a href="./pg/logout.php" class="nav-link"><button>로그아웃</button></a></li>
                    <?php
                            // foreach($boardArr AS $row){
                            //     echo '<li class="nav-item"><a href="board.php?bcode='.$row['bcode'].'" class="nav-link';
                            //     if(isset($_GET['bcode']) && $_GET['bcode'] == $row['bcode']){
                            //         echo ' active';
                            //     }
                            //     echo '">'.$row['name'].'</a></li>';
                            // }
                        ?>
                    <?php
                            } else {
                                // 로그인 안된 상태
                        ?>
                    <img src="./img/user_icon.png" alt="user_icon" class="main_login_btn user_icon" />

                    <button class="main_login_btn">로그인</button>
                    <button id="signup">회원가입</button>
                    <?php
                            }
                        ?>
                    <!-- <button class="main_login_btn">로그인</button>
                    <button>회원가입</button> -->
                </div>
                <!-- 토글 메뉴 -->
                <div class="nav_toggle">
                    <input type="checkbox" name="" id="menuicon" />
                    <label for="menuicon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </label> <!-- 사이드 바 메뉴 -->
                    <div class="sidebar">
                        <ui>
                            <li>
                                <div class="main sideAccordion_title">
                                    <span>여행지</span>
                                    <i class="fa-sharp fa-solid fa-caret-down"></i>
                                    <ul class="sideAccordion_menu">
                                        <a href="./sub_toulist.php">
                                            <li>관광지</li>
                                        </a>
                                        <a href="./sub_food.php">
                                            <li>음식</li>
                                        </a>
                                        <a href="./sub_shopping.php">
                                            <li>쇼핑</li>
                                        </a>
                                        <a href="./sub_accommodation.php">
                                            <li>숙박</li>
                                        </a>

                                    </ul>

                                </div>
                            </li>
                        </ui>
                        <ui>
                            <li>
                                <div class="main sideAccordion_title">
                                    <span>나의여행</span>
                                    <i class="fa-sharp fa-solid fa-caret-down"></i>
                                    <ul class="sideAccordion_menu">
                                        <a href="./sub_zzim.php">
                                            <li>찜한 여행</li>
                                        </a>
                                        <a href="./sub_review.php">
                                            <li>나의 리뷰</li>
                                        </a>
                                        <a href="./sub_question.php">
                                            <li>나의 질문</li>
                                        </a>
                                    </ul>
                                </div>
                            </li>
                        </ui>
                        <ui>
                            <li>
                                <div class="main sideAccordion_title">
                                    <span>커뮤니티</span>
                                    <i class="fa-sharp fa-solid fa-caret-down"></i>
                                    <ul class="sideAccordion_menu">
                                        <a href="./sub_sns.php">
                                            <li>SNS</li>
                                        </a>
                                        <a href="./sub_know_in.php">
                                            <li>동성로 지식IN</li>
                                        </a>
                                        <a href="./sub_service.php">
                                            <li>고객센터</li>
                                        </a>
                                    </ul>
                                </div>
                            </li>
                        </ui>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <dialog id="loginModal">
        <form method="dialog">
            <button value="close" class="close_btn"><i class="fa-solid fa-x"></i></button>
        </form>
        <div class="form-box">
            <div class="form-value">
                <form method="post" action="" class="mx-auto pt-2">
                    <h2 class="mb-3">로그인</h2>
                    <div class="inputbox form-floating">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input placeholder="아이디" class="form-control" type="text" id="f_id" />
                        <label for="f_id">아이디</label>
                    </div>
                    <div class="inputbox form-floating">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input placeholder="비밀번호" class="form-control" type="password" id="f_pw" />
                        <label for="f_pw">비밀번호</label>
                    </div>
                    <div class="forget mt-3">
                        <label for="">
                            <a href="#">아이디 찾기</a>
                            <a href="#">비밀번호 찾기</a>
                        </label>
                    </div>
                    <button class="login_btn" id="btn_login" type="button">로그인</button>
                    <button class="register_btn" id="signup">회원가입</button>
                    <div class="border_line"></div>
                    <p class="sns_login">SNS 간편 로그인</p>
                    <a href="<?= SocialLogin::socialLoginUrl("google");  ?>"><img src="./images/google_btn.png"
                            onclick="check_input" class="w-100 mt-2"></a>
                    <a href=<?=  SocialLogin::socialLoginUrl("kakao") ?>><img
                            src="./images/kakao_login_medium_narrow.png" onclick="check_input" class="w-100 mt-2"></a>

                    <a href=<?=  SocialLogin::socialLoginUrl("naver") ?>><img src="./images/naver_btn.png"
                            onclick="check_input" class="w-100 mt-2"></a>
                </form>
            </div>
        </div>

    </dialog>