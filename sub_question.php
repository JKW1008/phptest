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
<main class="question_wrapper">
    <!-- title -->
    <div class="main_question_title">나의 여행</div>
    <div class="question_title">
        <span>나의 질문</span>
    </div>
    <div class="question_title_line"></div>

    <!-- Search space -->
    <div class="search_space">
        <select name="search" class="search_list">
            <option value="">제목</option>
        </select>
        <input type="text" />
        <button><i class="fa-solid fa-magnifying-glass">검색</i></button>
    </div>

    <!-- 셀렉트 -->
    <div class="list_select">
        <p>10개의 게시글이 있습니다.</p>
        <div>
            <select name="list_answer" class="list_answer">
                <option value="">카테고리</option>
                <option value="">관광지</option>
                <option value="">음식</option>
                <option value="">쇼핑</option>
                <option value="">숙박</option>
            </select>
            <select name="list_answer" class="list_answer">
                <option value="">답변여부</option>
                <option value="">답변</option>
                <option value="">미답변</option>
            </select>
        </div>
    </div>

    <!-- 글 목록 -->
    <table class="board">
        <th>제목</th>
        <th class="item-none">카테고리</th>
        <th class="item-none">답변수</th>
        <th>작성일</th>
        <tr class="board_item">
            <td>
                <span>[미답변]</span>
                부모님 모시고 갈 음식점 좀 추천...
            </td>
            <td class="item_detail item-none">음식점</td>
            <td class="item_detail item-none">0</td>
            <td class="item_detail">2023.07.23</td>
        </tr>
        <tr class="board_item">
            <td>
                <span>[미답변]</span>
                가성비 좋은 숙소 좀 알려주세요
            </td>
            <td class="item_detail item-none">숙박</td>
            <td class="item_detail item-none">0</td>
            <td class="item_detail">2023.07.23</td>
        </tr>
        <tr class="board_item">
            <td>
                <span>[미답변]</span>
                스시 맛집 뭐가 있나요?
            </td>
            <td class="item_detail item-none">음식점</td>
            <td class="item_detail item-none">0</td>
            <td class="item_detail">2023.06.28</td>
        </tr>
        <tr class="board_item">
            <td>
                <span>[답변]</span>
                스파크랜드 가격이 어떻게 되나요 ?
            </td>
            <td class="item_detail item-none">관광지</td>
            <td class="item_detail item-none">1</td>
            <td class="item_detail">2023.05.23</td>
        </tr>
        <tr class="board_item">
            <td>
                <span>[답변]</span>
                자라 매장 어디있나요 ?
            </td>
            <td class="item_detail item-none">쇼핑</td>
            <td class="item_detail item-none">1</td>
            <td class="item_detail">2023.02.14</td>
        </tr>
        <tr class="board_item">
            <td>
                <span>[답변]</span>
                대구백화점 어디 갔나요?
            </td>
            <td class="item_detail item-none">쇼핑</td>
            <td class="item_detail item-none">1</td>
            <td class="item_detail">2023.01.10</td>
        </tr>
        <tr class="board_item">
            <td>
                <span>[답변]</span>
                어린이들이 놀만한 곳 추천해주세요.
            </td>
            <td class="item_detail item-none">관광지</td>
            <td class="item_detail item-none">1</td>
            <td class="item_detail">2022.12.29</td>
        </tr>
        <tr class="board_item">
            <td>
                <span>[답변]</span>
                동성로 게스트하우스 있나요?
            </td>
            <td class="item_detail item-none">숙박</td>
            <td class="item_detail item-none">1</td>
            <td class="item_detail">2022.12.20</td>
        </tr>
        <tr class="board_item">
            <td>
                <span>[답변]</span>
                동성로 스터디카페 ICAN 어떤가...
            </td>
            <td class="item_detail item-none">관광지</td>
            <td class="item_detail item-none">1</td>
            <td class="item_detail">2022.10.08</td>
        </tr>
        <tr class="board_item">
            <td>
                <span>[답변]</span>
                동성로에 탕후루 집 있나요?
            </td>
            <td class="item_detail item-none">음식점</td>
            <td class="item_detail item-none">1</td>
            <td class="item_detail">2022.09.03</td>
        </tr>
    </table>

    <!-- 페이지네이션 -->
    <div class="page">
        <img src="./img/arrow_leftleft.png" alt="" />
        <img src="./img/arrow_left.png" alt="" />
        <span class="first">1</span>
        <span>2</span>
        <span>3</span>
        <span>4</span>
        <span>5</span>
        <img src="./img/arrow_right.png" alt="" />
        <img src="./img/arrow_rightright.png" alt="" />
    </div>
</main>

<?php
    include 'inc_footer.php';
?>