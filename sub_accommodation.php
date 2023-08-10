<?php
    include 'inc_header.php';
?>
<link rel="stylesheet" href="./css/pagination_accomodation.css">

<main>
    <section class="map_banner">
        <img src="./img/accomodation_main_img.png" alt="map_banner" class="map_banner">
        <div class="map_title">
            <img src="./img/accomodation_marker.png" alt="marker">
            <div class="map_title_text">
                <p>숙박</p>
                <p>홈 > 여행지 > 숙박</p>
            </div>
        </div>
    </section>

    <section class="map_section">
        <div>
            <div class="item_list">
            </div>
            <div class="page_container">
                <button class="button" id="startBtn" disabled>
                    <i class="fa-solid fa-angles-left"></i>
                </button>
                <button class="button prevNext" id="prev" disabled>
                    <i class="fa-solid fa-angle-left"></i>
                </button>


                <div class="links">
                    <div class="links-group active">
                        <!-- 1~3번 숫자 링크 -->
                        <a href="#" class="link active">1</a>
                        <a href="#" class="link">2</a>
                        <a href="#" class="link">3</a>
                    </div>
                    <div class="links-group">
                        <!-- 4~6번 숫자 링크 (초기에는 보이지 않음) -->
                        <a href="#" class="link">4</a>
                        <a href="#" class="link">5</a>
                        <a href="#" class="link">6</a>
                    </div>
                    <div class="links-group">
                        <!-- 7~9번 숫자 링크 (초기에는 보이지 않음) -->
                        <a href="#" class="link">7</a>
                        <a href="#" class="link">8</a>
                        <a href="#" class="link">9</a>
                    </div>
                </div>


                <button class="button prevNext" id="next">
                    <i class="fa-solid fa-angle-right"></i>
                </button>
                <button class="button" id="endBtn">
                    <i class="fa-solid fa-angles-right"></i>
                </button>
            </div>
        </div>

        <div id="map"></div>
        </div>
    </section>
    <script type="text/javascript"
        src="//dapi.kakao.com/v2/maps/sdk.js?appkey=6b94c492ea514833ba4fe0a9d6a43b6e&libraries=services"></script>

    <script src="./js/pagenation_none.js"></script>
    <script src="./js/accommodation.js" defer></script>
    <script src="./js/map_accomodation.js"></script>

    <script src="https://kit.fontawesome.com/59f8fe4f52.js" crossorigin="anonymous"></script>
    <script src="./js/toggle.js"></script>

    <script src="./js/config.js"></script>
    <script src="./js/weather.js"></script>
    <script src="./js/mordal.js"></script>
    <?php
    include 'inc_footer.php';
?>