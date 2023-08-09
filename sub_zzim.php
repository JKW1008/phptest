<?php
    include './inc/common.php';

    if($ses_id == ''){
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

?>
<main class="zzim">
    <!-- title -->
    <div class="main_zzim_title">나의 여행</div>
    <div class="zzim_title">
        <span>찜한 여행</span>
    </div>
    <div class="zzim_title_line"></div>

    <!-- 카테고리 아이콘 -->
    <div class="zzim_icon">
        <div class="zzim_icon_item">
            <img src="./img/toulist_marker.png" alt="관광지" />
            <p>관광지</p>
        </div>
        <div class="zzim_icon_item">
            <img src="./img/shopping_marker.png" alt="쇼핑" />
            <p>쇼핑</p>
        </div>
        <div class="zzim_icon_item">
            <img src="./img/accomodation_marker.png" alt="숙박" />
            <p>숙박</p>
        </div>
        <div class="zzim_icon_item">
            <img src="./img/food_marker.png" alt="음식" />
            <p>음식</p>
        </div>
    </div>

    <!-- 찜한 목록 -->
    <div class="zzim_item">
        <div class="zzim_item_list">
            <img src="./img/spark.png" alt="찜한 여행지 이미지" />
            <div class="zzim_item_list_title">
                <img src="./img/toulist_marker.png" alt="찜아이콘" />
                <div>
                    <p>스파크랜드</p>
                    <p>대구광역시 중구 동성로6길 61</p>
                </div>
            </div>
        </div>
        <div class="zzim_item_list">
            <img src="./img/zara.png" alt="찜한 여행지 이미지" />
            <div class="zzim_item_list_title">
                <img src="./img/shopping_marker.png" alt="찜아이콘" />
                <div>
                    <p>ZARA 동성로점</p>
                    <p>대구 중구 동성로 17</p>
                </div>
            </div>
        </div>
        <div class="zzim_item_list">
            <img src="./img/restaurant.png" alt="찜한 여행지 이미지" />
            <div class="zzim_item_list_title">
                <img src="./img/food_marker.png" alt="찜아이콘" />
                <div>
                    <p>8번식당</p>
                    <p>대구광역시 중구 서성로13길 8</p>
                </div>
            </div>
        </div>
        <div class="zzim_item_list">
            <img src="./img/noble.png" alt="찜한 여행지 이미지" />
            <div class="zzim_item_list_title">
                <img src="./img/accomodation_marker.png" alt="찜아이콘" />
                <div>
                    <p>노블스테이호텔</p>
                    <p>대구광역시 중구 국채보상로123길 23</p>
                </div>
            </div>
        </div>
        <div class="zzim_item_list">
            <img src="./img/cgv.png" alt="찜한 여행지 이미지" />
            <div class="zzim_item_list_title">
                <img src="./img/toulist_marker.png" alt="찜아이콘" />
                <div>
                    <p>CGV 대구한일</p>
                    <p>대구광역시 중구 동성로 39</p>
                </div>
            </div>
        </div>
        <div class="zzim_item_list">
            <img src="./img/mankyoung.png" alt="찜한 여행지 이미지" />
            <div class="zzim_item_list_title">
                <img src="./img/toulist_marker.png" alt="찜아이콘" />
                <div>
                    <p>동성로 만경관</p>
                    <p>대구광역시 중구 동성로2길 95</p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
    include 'inc_footer.php';
?>