<?php
// dbconfig.php 파일을 포함하여 $pdo 객체를 얻어옴
$pdo = include "./inc/dbconfig.php";

// $pdo 객체를 이용하여 $db 변수 초기화
$db = $pdo;

// Member Class file을 포함하여 Member 클래스를 로드
include "./inc/memeber.php";

$email = 'email@email.com';

$mem = new Member($db);

if ($mem->email_exists($email)) {
    echo "이메일이 중복됩니다.";
} else {
    echo "사용할 수 있는 이메일 입니다.";
}
?>