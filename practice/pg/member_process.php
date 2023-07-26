<?php
    include '../inc/dbconfig.php';

    $db = $pdo;

    include '../inc/memeber.php'; // Member Class 정의된 파일

    $mem = new Member($db);

    $id      = (isset($_POST['id'      ]) && $_POST['id'      ] != '') ? $_POST['id'      ] : '';
    $email   = (isset($_POST['email'   ]) && $_POST['email'   ] != '') ? $_POST['email'   ] : '';
    $name    = (isset($_POST['name'    ]) && $_POST['name'    ] != '') ? $_POST['name'    ] : '';
    $password= (isset($_POST['password']) && $_POST['password'] != '') ? $_POST['password'] : '';
    $zipcode = (isset($_POST['zipcode' ]) && $_POST['zipcode' ] != '') ? $_POST['zipcode' ] : '';
    $addr1   = (isset($_POST['addr1'   ]) && $_POST['addr1'   ] != '') ? $_POST['addr1'   ] : '';
    $addr2   = (isset($_POST['addr2'   ]) && $_POST['addr2'   ] != '') ? $_POST['addr2'   ] : '';

    
    $mode  = (isset($_POST['mode' ]) && $_POST['mode' ] != '') ? $_POST['mode' ] : '';
    

    // 아이디 중복확인
    if($mode == 'id_chk'){

        if($id == ''){
            die(json_encode(['result' => 'empty_id']));
            
        }
        
        if($mem->id_exist($id)){

            die(json_encode(['result' => 'fail']));
            
         }else{

            die(json_encode(['result' => 'success']));

        }
        // 이메일 중복확인
    }else if($mode == 'email_chk'){

        if($email == ''){
            die(json_encode(['result' => 'empty_email']));
            
        }
        // 이메일 형식채크
        if($mem->email_format_check($email) === false){
            die(json_encode(['result' => 'email_format_wrong']));
        }

        if($mem->email_exists($email)){

            die(json_encode(['result' => 'fail']));
            
         }else{

            die(json_encode(['result' => 'success']));

        }
    }else if ($mode == 'input'){
        // Profile Image 처리
        $extArray = explode('.', $_FILES['photo']['name']);
        $ext = end($extArray);
        $photo = $id.'.'.$ext; 
        
        copy($_FILES['photo']['tmp_name'], "../data/profile/".$photo);

        $arr = [
            'id' => $id,
            'email' => $email,
            'password' => $password,
            'name' => $name,
            'zipcode' => $zipcode,
            'addr1' => $addr1,
            'addr2' => $addr2,
            'photo' => $photo
        ];

        $mem->input($arr);

        echo "
        <script>
            self.location.href='../member_success.php'
        </script>";
    }
?>