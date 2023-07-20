<?php
    if(isset($_POST['chk']) or $_POST['chk'] != 1){
        // die("<script>
        //     alert('약관 등을 동의하시고 접근하시기 바랍니다.');
        //     self.location.href='./stipulation.php'
        //     </script>");
    }

    include 'inc_header.php';
?>
<main>
    <h1 class="text-center">회원가입</h1>
    <div>
        <label for="" class="form-labe">아이디</label>
        <input type="text" class="form-control">
    </div>
</main>
<?php
    include 'inc_footer.php';

?>