<?php
    include '../inc/common.php';

    include '../inc/dbconfig.php';

    $db = $pdo;

    include '../inc/board.php'; // 게시판 class
    include '../inc/member.php'; // 회원 class

    $mode    = (isset($_POST['mode'   ]) && $_POST['mode'   ] != '') ? $_POST['mode'   ] : '';
    $bcode   = (isset($_POST['bcode'  ]) && $_POST['bcode'  ] != '') ? $_POST['bcode'  ] : '';
    $subject = (isset($_POST['subject']) && $_POST['subject'] != '') ? $_POST['subject'] : '';
    $content = (isset($_POST['content']) && $_POST['content'] != '') ? $_POST['content'] : '';

    if($mode == ''){
        $arr = ["result" => "empty_mode"];
        $json_str = json_encode($arr);  // 배열 => json 문자열
        die($json_str);
    }

    if($bcode == ''){
        $arr = ["result" => "empty_bcode"];
        die(json_encode($arr));
    }

    $board = new Board($db);    // connect, dbcon, pdo
    $member = new Member($db);
    
    if($mode == 'input'){

        if($subject == ''){
            die(json_encode(["result" => "empty_subject"]));
        }

        if($content == '' || $content == '<p><br></p>'){
            die(json_encode(["result" => "empty_content"]));
        }
        // bcode, id, namem, subject, content, hit, ip

        $memArr = $member->getInfo($ses_id);

        $name = $memArr['name'];

        $arr = [
            'bcode' => $bcode,
            'id' => $ses_id,
            'name' => $name,
            'subject' => $subject,
            'content' => $content,
            'ip' => $_SERVER['REMOTE_ADDR']
        ];

        $board->input($arr);

        die(json_encode(["result" => "success"]));
    }
?>