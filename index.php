    <?php
    include 'inc_header.php';

    include "./inc/board.php";
    $db = $pdo;

    $g_title = 'test';
    $js_array = [ 'js/home.js'];

    $board = new Board($db);
?>

    <main>
        <section class="main_carousel">
            <!-- Swiper -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="./img/Frame1.png" />
                    </div>
                    <div class="swiper-slide">
                        <img src="./img/Frame2.png" loading="lazy" />
                    </div>
                    <div class="swiper-slide">
                        <img src="./img/Frame3.png" loading="lazy" />
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>

            <div class="slide_text">
                <h4>대구 광역시 문화와 쇼핑의 중심지</h4>
                <h2>지금 여기는 동성로</h2>
            </div>
        </section>

        <section class="first_carousel">
            <div class="gray_section"></div>
            <div class="wrapper">
                <div class="main_text">
                    특별한 동성로
                    <span>여행지</span>
                </div>

                <div class="swiper first_swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="text_box">
                                <div>
                                    <button>AD</button>
                                    <div>
                                        <div class="text_box_main_text">하이마트 음악감상실</div>
                                        <div class="text_box_location">
                                            <img src="./img/location.png" alt="location" />
                                            <p>대구 중구 동성로6길 45</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text_box_description">
                                    <p>60년 전통을 가진 음악감상실이 대구 동성로에 있다는 사실, 알고계시나요?</p>
                                    <p>
                                        7천여장의 LP레코드, 다권, 오르간 등 아날로그 감성이 가득한 하이마트에서, 사장님의 추천 음악을 웅장한 사운드로 마음껏 들어보세요. 레트로
                                        공간에서 따뜻한 차를 마시며, 독특한 분위기에 취한 채로 시간을 보내실 수 있습니다.
                                    </p>
                                </div>
                            </div>
                            <img src="./img/first_carousel1.png" alt="first_carousel1" loading="lazy" />
                        </div>
                        <div class="swiper-slide">
                            <div class="text_box">
                                <div>
                                    <button>추천</button>
                                    <div>
                                        <div class="text_box_main_text">문화장</div>
                                        <div class="text_box_location">
                                            <img src="./img/location.png" alt="location" />
                                            <p>대구 중구 동성로12길 51</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text_box_description">
                                    <p>
                                        총 4층으로 이뤄진 건물은 목욕탕과 여관으로 사용됐던 곳이다. 옥상의 루프탑까지 있는 커다란 규모를 갖춘 이곳은 40여 년이 넘은 목욕탕의
                                        내부를 그대로 살렸으며 복도는 물론 구석구석 500점 정도의 작품으로 가득 차 있는 갤러리 카페다. 창의력과 상상력이 마구 발휘될 것 같은
                                        예술적인 공간이며 동심으로 돌아가게 만들어 주는 재밌는 놀이터 같기도 하다.
                                    </p>
                                </div>
                            </div>
                            <img src="./img/first_carousel2.png" alt="first_carousel2" loading="lazy" />
                        </div>
                        <div class="swiper-slide">
                            <div class="text_box">
                                <div>
                                    <button>추천</button>
                                    <div>
                                        <div class="text_box_main_text">미르엘 과자점</div>
                                        <div class="text_box_location">
                                            <img src="./img/location.png" alt="location" />
                                            <p>대구 중구 동성로12길 51</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text_box_description">
                                    <p>맛있는 빵을 저렴하게 판매하고 있으며 종류도 다양하다. 또한 나만의 케익 만들기, 쿠키 만들기, 피자 만들기, 컵케익 만들기 등 다양한 체험을
                                        진행하고
                                        있다. 해당 체험들은
                                        미르엘 과자점에서 수제로 만든 반죽을 제공하기 때문에 조금 더 저렴한 가격으로 체험가능하다.
                                    </p>
                                </div>
                            </div>
                            <img src="./img/first_carousel3.png" alt="first_carousel3" loading="lazy" />
                        </div>
                        <div class="swiper-slide">
                            <div class="text_box">
                                <div>
                                    <button>추천</button>
                                    <div>
                                        <div class="text_box_main_text">스파크랜드</div>
                                        <div class="text_box_location">
                                            <img src="./img/location.png" alt="location" />
                                            <p>대구 중구 동성로12길 51</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text_box_description">
                                    <p>
                                        대구 도심 한가운데 위치한 스파크랜드는 쇼핑몰이자 놀이테마파크로서 중구의 새로운 랜드마크로 떠오르고 있다. 패션브랜드, 식당, 놀이시설 등을
                                        갖추어 다양한 볼거리와 먹거리, 즐길거리를 제공한다. 특히, 건물 꼭대기에 있는 대관람차는 많은 이들의 시선을 사로잡는다.
                                    </p>
                                </div>
                            </div>
                            <img src="./img/first_carousel4.png" alt="first_carousel4" />
                        </div>
                        <div class="swiper-slide">
                            <div class="text_box">
                                <div>
                                    <button>추천</button>
                                    <div>
                                        <div class="text_box_main_text">멘야하나비</div>
                                        <div class="text_box_location">
                                            <img src="./img/location.png" alt="location" />
                                            <p>대구 중구 동성로2길 71 1층</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text_box_description">
                                    <p>
                                        동성로 맛집으로 유명한 멘야하나비는 나고야에서 시작된
                                        일본식 비빔면 마제소바의 원조 프렌차이즈입니다. 국물있는
                                        고정관념을 깬 멘야하나비의 ‘마제소바’는 니이야마 사장이 직접 개발한 ‘민찌소스’를 계란 노른자, 파, 고등어 가루, 마늘, 파 등 여러 재료와
                                        함께
                                        비벼먹는 비빔 라멘입니다.
                                    </p>
                                </div>
                            </div>
                            <img src="./img/first_carousel5.png" alt="first_carousel4" />
                        </div>
                    </div>
                    <div class="swiper_button">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>

        <section class="second_carousel">
            <div class="wrapper">
                <div class="main_text">
                    동성로에서 즐기자!
                    <span>다양한 축제</span>
                </div>
                <!-- Swiper -->
                <div class="swiper second-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="./img/축제1.png" alt="축제1" />
                            <div class="festival_text">
                                <p>한방의 중심, 대구약령시가 온다!</p>
                                <p>한방문화축제 : 한방백화점</p>
                                <p>2023-05-05~2023-05-07 (종료)</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img src="./img/축제2.png" alt="축제2" />
                            <div class="festival_text">
                                <p>400년 전의 대구를 만나다.</p>
                                <p>경상감영 풍속재연</p>
                                <p>2023-05-13 ~ 2023-05-14 (종료)</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img src="./img/축제3.png" alt="축제3" />
                            <div class="festival_text">
                                <p>시민이 만들고, 시민이 즐기는 거리로!</p>
                                <p>파워풀대구페스티벌</p>
                                <p>2023-05-13 ~ 2023-05-14 (종료)</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img src="./img/축제4.png" alt="축제4" />
                            <div class="festival_text">
                                <p>도심 속 생활문화광장!</p>
                                <p>대구 생활문화제</p>
                                <p>2023-05-13 ~ 2023-05-14 (종료)</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img src="./img/축제5.png" alt="축제5" />
                            <div class="festival_text">
                                <p>한방활력콘서트, 토요일은 밤이 좋아!</p>
                                <p>약령시한방문화축제</p>
                                <p>2023-07-01 / 08-05 / 09-02 (토) 16:00 ~</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img src="./img/축제6.png" alt="축제6" />
                            <div class="festival_second_text">
                                <p>수상작을 감독들이 직접 선정하는</p>
                                <p>전무후무한 영화제!</p>
                                <p>대구단편영화제</p>
                                <p>2023년 8월 23일 ~ 28일</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
                <!-- <div class="swiper-pagination"></div> -->
            </div>
        </section>

        <section class="knowledge_in">
            <div class="knowledge_title">
                <div class="main_text">
                    동성로 관광
                    <span>지식 iN</span>
                </div>
                <p>동성로 여행에 관해서라면 어떤 것이라도 물어 보세요!</p>
                <p>"동성로랑" 상주 전문가를 비롯해 동성로를 잘 아는 사람이라면 누구에게라도 답변 받을 수 있습니다.</p>
                <div class="knowledge_btns">
                    <button><a href="./sub_know_in.php">동성로관광 지식iN 바로가기</a></button>
                    <button><a href="./sub_service.php">고객센터 바로가기</a></button>
                </div>
            </div>

            <div class="knowledge_notice">
                <h2>신규 질문</h2>
                <div class="notice_items">
                    <?php
$newboard = $board->getLatestPosts();

foreach ($newboard as $post) {
    $subject = $post['subject'];
    $hit = $post['hit'];

    // 글자 수 제한 설정
    $maxLength = 20;
    $trimmedContent = iconv_substr($subject, 0, $maxLength);
    
    // 글자 수가 제한보다 길 경우 "..." 추가
    if (iconv_strlen($subject) > $maxLength) {
        $trimmedContent .= "...";
    }

    echo '<div>';
    echo '<img src="./img/round.svg" alt="*" />';
    echo "<p>$trimmedContent</p>";
    echo "<p>조회 : $hit</p>";
    echo '</div>';
}


?>

                </div>
            </div>
        </section>

        <section class="sns_item">
            <div class="main_text"><span>SNS</span>로 만나는 동성로</div>
            <div class="sns_items" id="youtube_results">
                <!-- <div>
          <img src="./img/youtube.png" alt="">
          <img src="./img/youtube_icon.png" alt="">
          <p>스파크랜드 직원 v-log</p>
        </div>
        <div>
          <img src="./img/youtube.png" alt="">
          <img src="./img/youtube_icon.png" alt="">
          <p>스파크랜드 직원 v-log</p>
        </div>
        <div>
          <img src="./img/youtube.png" alt="">
          <img src="./img/youtube_icon.png" alt="">
          <p>스파크랜드 직원 v-log</p>
        </div> -->
            </div>
            <div class="gray_section"></div>
        </section>
    </main>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!--  -->
    <script src="https://kit.fontawesome.com/59f8fe4f52.js" crossorigin="anonymous"></script>
    <script src="./js/toggle.js"></script>
    <!-- Initialize Swiper -->
    <script src="./js/first_carousel.js"></script>
    <script src="./js/second_carousel.js"></script>
    <script src="./js/main_carousel.js"></script>
    <script src="./js/config.js"></script>

    <script src="./js/youtube.js"></script>

    <?php
        include './inc_footer.php';
    ?>
    <style>
footer {
    margin-top: 1%;
}
    </style>