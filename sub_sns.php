<?php
    include 'inc_header.php';
?>

<main>
    <section class="sns_banner">
        <img src="./img/sns_main_img.png" alt="main_banner" class="main_banner">
        <div class="main_title">
            <img src="./img/youtube_icon2.png" alt="icon">
            <div class="map_title_text">
                <p>SNS</p>
                <p>홈 > 커뮤니티 > SNS</p>
            </div>
        </div>
        <div class="line"></div>
        <div class="hashtag">
            <button class="tag-button active" data-tag="관광지"># 관광지</button>
            <button class="tag-button" data-tag="맛집"># 음식</button>
            <button class="tag-button" data-tag="쇼핑"># 쇼핑</button>
            <button class="tag-button" data-tag="호텔"># 숙박</button>
        </div>
    </section>
    <section class="youtube_items">
        <p>총 게시물: 12</p>
        <div id="youtube_results"></div>
    </section>
</main>


<?php
    include 'inc_footer.php';
?>