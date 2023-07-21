<?php
$host = "svc.sel4.cloudtype.app";
$user = "test";
$pass = "1234";
$db = "dsl";
$port = "30105";

try {
    // PDO 객체를 생성하여 데이터베이스에 연결1
    $dsn = "mysql:host=$host;port=$port;dbname=$db";
    $pdo = new PDO($dsn, $user, $pass);

    // PDO 연결 설정
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 연결이 정상적으로 설정되었을 때, 이곳에서 데이터베이스 쿼리를 실행하거나 다른 작업을 수행할 수 있습니다.

    // 연결 종료
    $pdo = null; // PDO 객체를 null로 설정하여 연결 종료

    echo "연결 성공";
    
} catch (PDOException $e) {
    // 예외 처리
    echo "데이터베이스 연결 실패: " . $e->getMessage();
}
?>