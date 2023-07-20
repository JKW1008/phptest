<?php include 'inc_header.php';?>

<main class="p-5 border rounded-5">
    <h1 class="text-center mt-5">회원 약관 및, 개인정보 취급방침 동의</h1>
    <h4 class="mt-5">회원 약관</h4>
    <textarea name="" id="" cols="30" rows="10" class="form-control mt-5">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati voluptatibus possimus dolor, quia explicabo vero reprehenderit ipsam totam velit quas blanditiis porro beatae? Veritatis tempore, minima cupiditate non optio sunt voluptatum explicabo aut nostrum minus, nulla hic quae quaerat omnis quod doloribus quos! Molestiae quos fuga rem non eaque qui, error atque sint ipsa dicta quaerat! Ad repellat hic consequatur reprehenderit magni error sit nostrum quaerat vitae exercitationem voluptatum similique facilis repellendus, iure consequuntur. Qui, inventore doloribus recusandae vel repudiandae molestiae commodi saepe officia dolorum atque incidunt natus alias ut earum id cumque optio quod itaque iusto pariatur! Tempora fugit aliquid incidunt at ipsa veniam est, non voluptatem dignissimos suscipit molestias eaque autem nostrum, adipisci earum quos a perspiciatis? Porro voluptatibus labore eius, maxime cum ratione aliquid explicabo consectetur distinctio sunt dolores voluptas! Eum rem praesentium quisquam ad? Odit dolorum amet reprehenderit unde deleniti quibusdam perspiciatis eligendi consequuntur provident obcaecati fugit, magnam doloremque. Saepe expedita accusantium enim sunt explicabo aspernatur omnis nisi repellat deserunt provident deleniti quibusdam alias, et sed neque quia vel rerum quos obcaecati dicta qui aliquam? Amet aut illum corporis laborum perferendis id animi recusandae, enim architecto odit officiis tempora repellendus quisquam eaque debitis harum fugit, explicabo nesciunt deleniti minima. Soluta quibusdam illum aspernatur fugit sint ab tempora consectetur recusandae dolorum libero? Illo, tenetur dolor repellat nemo omnis quae facilis officiis esse at magnam officia consectetur id odit itaque labore asperiores ipsum ab fugit? Reiciendis, recusandae earum exercitationem culpa saepe quidem porro natus. Neque esse asperiores perspiciatis est quae accusamus deleniti? Ea alias est corporis? Est id praesentium itaque saepe officiis quos omnis atque sequi earum nisi? Tempore id reprehenderit consequuntur minima, aliquam ipsa commodi, debitis voluptate eveniet similique explicabo doloremque repellendus cum unde dolore illo. Culpa incidunt earum illum odit vel corporis eaque quis suscipit reprehenderit!
        </textarea>
    <div class="form-check mt-5">
        <input class="form-check-input mt-2" type="checkbox" value="" id="chk_member1" />
        <label class="form-check-label" for="chk_member1">
            위 약관에 동의 하시겠습니까?
        </label>
    </div>
    <h4 class="mt-5">개인정보 취급방침</h4>
    <textarea name="" id="" cols="30" rows="10" class="form-control mt-5">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore cum odit reiciendis voluptate vel ipsum, natus quidem atque, sunt accusamus, qui fugit obcaecati. Saepe in expedita similique, quaerat molestiae omnis hic minima culpa porro amet excepturi voluptatibus possimus ipsa optio temporibus eum placeat reiciendis fugiat dolorem maiores ad. Voluptas placeat sunt ducimus incidunt voluptatibus quas quos nam, porro est cupiditate rem, quam atque, illum eos esse? Dolorum porro quisquam officia iste debitis alias. Nisi fugit voluptatibus quae debitis dolor ut, eaque porro neque culpa rem voluptatem officia consequuntur hic sit sint tempora voluptate. Temporibus quo facilis perspiciatis magni. Delectus repudiandae ea rerum reprehenderit minima? Quasi culpa corrupti odio illum illo, consequatur explicabo. Magnam voluptatem voluptate sed veritatis. Ducimus iure voluptatibus nesciunt quidem itaque, cupiditate perspiciatis assumenda inventore fugiat, pariatur temporibus vero explicabo dolorum dolor natus voluptates! Debitis nesciunt beatae tempore! Magni dolore natus officiis! Magnam omnis voluptatem dolor sed maiores vero. Asperiores veniam quidem deleniti aliquam minus explicabo at laborum culpa aut eveniet doloribus, corporis consequuntur tempora deserunt assumenda maiores, totam eligendi eius blanditiis fuga provident neque, porro iste! Nobis cumque illo eum facilis quia eius natus ipsa debitis. In omnis qui eum ad doloribus totam, facere odio nam, accusantium fugiat consectetur quibusdam blanditiis voluptatum nostrum eligendi. Eligendi voluptatibus expedita omnis! Laboriosam provident fugiat quo cupiditate aliquid! Cum atque voluptates exercitationem laborum consequatur, dolorum voluptatum alias eaque nulla optio blanditiis saepe earum obcaecati mollitia assumenda dolor facilis aliquid cupiditate, incidunt quam? Sed quaerat, illo ipsam doloribus blanditiis unde itaque exercitationem in, earum iure necessitatibus tempore enim pariatur vero, harum quasi recusandae natus? Blanditiis esse ullam consequatur libero recusandae. Corporis quod error nobis in eveniet deserunt. Facilis, reiciendis inventore autem ea porro maxime possimus officia illo vitae distinctio minima repudiandae amet rerum nobis labore, obcaecati ipsum laudantium veniam nisi laboriosam est!
        </textarea>
    <div class="form-check mt-5">
        <input class="form-check-input mt-2" type="checkbox" value="" id="chk_member2" />
        <label class="form-check-label" for="chk_member2">
            위 개인정보 취급방침에 동의하시겠습니까?
        </label>
    </div>
    <div class="mt-5 d-flex justify-content-center gap-2">
        <button class="btn btn-primary w-50" id="btn_member">회원가입</button>
        <button class="btn btn-secondary w-50">가입취소</button>
    </div>

    <form action="member_input.php" method="post" name="stipulation_form" style="display:none">
        <input type="hidden" name="chk" value="0">
    </form>


</main>
</div>

<?php include 'inc_footer.php';?>