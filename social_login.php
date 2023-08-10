<?php
  session_start();

  include_once dirname(__FILE__)."/social_login_config.php";
  include_once dirname(__FILE__)."/common_method.php";
  include "./inc/dbconfig.php";

  $db = $pdo;

  include "./inc/member.php";

  $mem = new Member($db);

  // a태그에서 response code 받아오기
  $code = $_GET['code'];

  // print_r($code);
  // exit;
  

  // 소셜로그인 구분자 받아오기 ('kakao', 'naver', 'google'...)
  $state = $_GET['state'];

  $model = getTokenModel($_GET['code'], $state);
  
  $accessToken = $model->getAccessToken();
  $profileModel = getProfile($accessToken, $state);

  $regist_day = date("Y-m-d (H:i)");

  // 사용자가 이미 존재하는지 확인
  $stmt = $db->prepare("SELECT * FROM member WHERE id = :id");
  $stmt->bindValue(':id', $profileModel->email);
  $stmt->execute();
  $userExists = $stmt->fetch(PDO::FETCH_ASSOC);
  

  if ($userExists) {

    // 사용자가 이미 존재하므로, 기존 레코드를 업데이트하거나 로그인 처리 등을 수행하세요.
    // 애플리케이션의 로직에 맞게 처리하시면 됩니다.
    if($userExists['login_social'] == $state){
      session_start();
      $_SESSION['ses_id'] = $profileModel->email;
      $_SESSION['ses_level'] = $userExists['level']; // 사용자 레벨이 있는 경우 해당 컬럼을 사용
    
      // 로그인 후에는 원하는 페이지로 리다이렉트합니다.
      
      header('Location: index.php');
    }else{
      $divValue = array("kakao" => "카카오", "naver" => "네이버", "google" => "구글");
      echo "<script>
        alert('가입된 이메일이 존재합니다. (". $divValue[$userExists['login_social']].")'); 
      </script>";      
    }

  } else {
    session_start();
    $_SESSION['ses_id'] = $profileModel->email;
    $_SESSION['ses_level'] = $userExists['level']; 
    // 사용자가 존재하지 않으므로 삽입 작업을 진행합니다.

    $sql = "INSERT INTO member(id, name, password, email, zipcode, addr1, addr2, photo, create_at, ip, login_social) VALUES
      (:id, :name, :password, :email, :zipcode, :addr1, :addr2, :photo, NOW(), :ip, :login_social)";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $profileModel->email);
    $stmt->bindValue(':name', $profileModel->nickname);
    $stmt->bindValue(':password', $profileModel->uid); // 비밀번호에 해당하는 컬럼이 아닐 수 있습니다. 애플리케이션에 맞게 수정하세요.
    $stmt->bindValue(':email', $profileModel->email);
    $stmt->bindValue(':zipcode', ''); // 우편번호에 해당하는 컬럼에 실제 값으로 대체하세요.
    $stmt->bindValue(':addr1', ''); // 주소1에 해당하는 컬럼에 실제 값으로 대체하세요.
    $stmt->bindValue(':addr2', ''); // 주소2에 해당하는 컬럼에 실제 값으로 대체하세요.
    $stmt->bindValue(':photo', $profileModel->profile); // 프로필 사진 URL을 사용하여 해당 컬럼에 대체하세요.
    $stmt->bindValue(':ip', $_SERVER['REMOTE_ADDR']); // 사용자의 IP 주소를 저장하려면 이대로 유지하세요.
    $stmt->bindValue(':login_social', $_GET['state']); // 사용자의 IP 주소를 저장하려면 이대로 유지하세요.


    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      // 데이터가 성공적으로 삽입되었습니다.
    } else {
      // 삽입 중 문제가 발생했습니다.
      // 오류 메시지를 확인하여 원인을 파악하세요.
      print_r($stmt->errorInfo());
    }
  }

  echo "  
    <script>
      self.location.href = 'index.php';
    </script>";
  ?>