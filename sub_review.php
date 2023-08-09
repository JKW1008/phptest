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
<main class="review_wrapper">
    <!-- title -->
    <div class="main_review_title">나의 여행</div>
    <div class="review_title">
        <span>나의 리뷰</span>
    </div>
    <div class="review_title_line"></div>

    <!-- review_list -->
    <div class="review_item">
        <div class="review_item_list">
            <div class="review_shop">
                <img src="./img/review_list1.png" alt="리뷰작성대표사진" />
                <p>2023.08.04</p>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
            <div class="review_text">
                <div class="review_text_title">
                    <p class="text_title">가야골 가마솥 한우국밥</p>
                    <p class="text_text">맛있게 잘 먹었습니다. 사장님도 친절하시고 앞에 주차장도 넓어서 편리했습니다.</p>
                </div>
                <div class="review_text_photo">
                    <img src="./img/review_list_item1-1.png" alt="리뷰사진" />
                    <img src="./img/review_list_item1-2.png" alt="리뷰사진" />
                </div>
            </div>
        </div>
    </div>
    <div class="review_item">
        <div class="review_item_list">
            <div class="review_shop">
                <img src="./img/review_list2.png" alt="리뷰작성대표사진" />
                <p>2023.08.04</p>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </div>
            <div class="review_text">
                <div class="review_text_title">
                    <p class="text_title">가창식당</p>
                    <p class="text_text">맛있게 잘 먹었습니다. 사장님도 친절하시고 앞에 주차장도 넓어서 편리했습니다.</p>
                </div>
                <div class="review_text_photo">
                    <img src="./img/review_list_item2-1.png" alt="리뷰사진" />
                    <img src="./img/review_list_item2-2.png" alt="리뷰사진" />
                </div>
            </div>
        </div>
    </div>
    <div class="review_item" id="last_item">
        <div class="review_item_list">
            <div class="review_shop">
                <img src="./img/review_list3.png" alt="리뷰작성대표사진" />
                <p>2023.08.04</p>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
            <div class="review_text">
                <div class="review_text_title">
                    <p class="text_title">8번식당</p>
                    <p class="text_text">맛있게 잘 먹었습니다. 사장님도 친절하시고 앞에 주차장도 넓어서 편리했습니다.</p>
                </div>
                <div class="review_text_photo">
                    <img src="./img/review_list_item3-1.png" alt="리뷰사진" />
                    <img src="./img/review_list_item3-2.png" alt="리뷰사진" />
                </div>
            </div>
        </div>
    </div>
</main>

<?php
    include 'inc_footer.php';
?>