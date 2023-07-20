<?php
try {
    $host = "svc.sel4.cloudtype.app";
    $db = "dsl";
    $user = "test";
    $pass = "1234";
    $port = "30105";

    // 연결 에러 시 예외를 던지도록 설정
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    // PDO를 사용하여 접속 시도
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass, $options);
    // $conn = mysqli_connect($host, $user, $pass, $db, $port);
    echo "접속 성공!";
} catch (PDOException $e) {
   echo "접속 실패: " . $e->getMessage();
}
function errMsg($msg){
    echo "<script>
        window.alert('$msg');
        history.back(1);
    </script>";
    exit;
}
?>