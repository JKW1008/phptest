<?php
    require_once('../DB/db.php');

    echo "<hr>";

    switch($_GET['mode']){
        case 'register' :
            $id = $_POST['id'];
            $userid = $_POST['userid'];
            $pw1 = $_POST['pw1'];
            $pw2 = $_POST['pw2'];
            $name = $_POST['name'];
            $sex = $_POST['sex'];
            $tel = $_POST['tel'];
            $email = $_POST['email'];

            // echo $id. '<br>'.$userid.'<br>'.$pw1.'<br>'.$pw2.'<br>'.$name.'<br>'.$sex.'<br>'.$tel.'<br>'.$email;

            $sql = $conn -> prepare('INSERT INTO register(id, userid, pw, name, sex, tel, email, redate)
                                    -- 이 부분은 DB 테이블에서 만든 이름과 똑같이 입력해줍니다.
                                    VALUE(:id, :userid, :pw, :name, :sex, :tel, :email, now())');

            $sql -> bindParam(':id', $id);
            
        break;
    }
?>