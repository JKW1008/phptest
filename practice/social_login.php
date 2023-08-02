<?php
include_once dirname(__FILE__)."/social_login_config.php";
include_once dirname(__FILE__)."/common_method.php";
include "./inc/dbconfig.php";

$db = $pdo;

include "./inc/memeber.php";

$mem = new Member($db);

// a태그에서 response code 받아오기
$code = $_GET['code'];

// 소셜로그인 구분자 받아오기 ('kakao', 'naver', 'google'...)
$state = $_GET['state'];

$model = getTokenModel($code, $state);

$accessToken = $model->getAccessToken();
$profileModel = getProfile($accessToken, $state);

$regist_day = date("Y-m-d (H:i)");

$sql = "INSERT INTO member(id, name, password, email, zipcode, addr1, addr2, photo, create_at, ip) VALUES
  (:id, :name, :password, :email, :zipcode, :addr1, :addr2, :photo, NOW(), :ip)";

$stmt = $db->prepare($sql);
$stmt->bindValue(':id', $profileModel->email);
$stmt->bindValue(':name', $profileModel->nickname);
$stmt->bindValue(':password', $profileModel->uid); // Note: This might not be the right column for password
$stmt->bindValue(':email', $profileModel->email);
$stmt->bindValue(':zipcode', ''); // Replace with the actual value for zipcode
$stmt->bindValue(':addr1', ''); // Replace with the actual value for addr1
$stmt->bindValue(':addr2', ''); // Replace with the actual value for addr2
$stmt->bindValue(':photo', $profileModel->profile); // Assuming the profile URL should be used for the photo
$stmt->bindValue(':ip', $_SERVER['REMOTE_ADDR']); // Assuming you want to store the user's IP address

// $stmt->execute();


if ($stmt->rowCount() > 0) {
  // 데이터가 성공적으로 삽입되었습니다.
} else {
  // 삽입 중 문제가 발생했습니다.
  // 오류 메시지를 확인하여 원인을 파악하세요.
  print_r($stmt->errorInfo());
}

echo "
  <script>
    self.location.href = 'index.php';
  </script>";
?>