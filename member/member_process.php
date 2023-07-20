<?php
require_once('../db/db.php');

if (isset($_GET['mode'])) {
    switch ($_GET['mode']) {
        case 'register':
            $id = $_POST['id'];
            $userid = $_POST['userid'];
            $pw1 = $_POST['pw1'];
            $pw2 = $_POST['pw2'];
            $name = $_POST['name'];
            $sex = $_POST['sex'];
            $tel = $_POST['tel'];
            $email = $_POST['email'];

            // 여기부터 수정된 부분
            $sql = $conn->prepare('INSERT INTO register
            (id, userid, pw, name, sex, tel, email, redate)
            VALUES(:id, :userid, :pw, :name, :sex, :tel, :email, now())');

            $sql->bindParam(':id', $id);
            $sql->bindParam(':userid', $userid);
            $sql->bindParam(':pw', $pw1);
            $sql->bindParam(':name', $name);
            $sql->bindParam(':sex', $sex);
            $sql->bindParam(':tel', $tel);
            $sql->bindParam(':email', $email);

            $sql->execute();
            // 여기까지 수정된 부분

            header('location: ../main.php');
            break;

        // 다른 case들을 추가할 수 있습니다.
        // 예: case 'update':
        //       // 업데이트 처리 로직
        //       break;

        default:
            // 잘못된 mode 값이 전달된 경우에 대한 처리
            // 예: header('location: ../error.php');
            break;
    }
} else {
    // 'mode' 값이 전달되지 않은 경우에 대한 처리
    // 예: header('location: ../error.php');
}
?>