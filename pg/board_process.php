<?php
    //$err_array = error_get_last();

    if(isset($_SERVER['CONTENT_LENGTH']) && $_SERVER['CONTENT_LENGTH'] > (int) ini_get('post_max_size') * 1024 * 1024){

        $arr = ['result' => 'post_size_exceed'];
        
        die(json_encode($arr));
    }


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
        // 이미지 변환하여 저장하기
        preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $content, $matches);

        $img_array = [];

        foreach($matches[1] AS $key => $row){
            if(substr($row, 0, 5) != 'data:'){
                continue;
            }

            list($type, $data) = explode(';', $row);
            list(, $data) = explode(',', $data);

            $data = base64_decode($data);

            list(,$ext) = explode('/', $type);

            $ext = ($ext == 'jpeg') ? 'jpg' : $ext;

            $filename = date('YmdHis') .'_'. $key .'.'. $ext;

            file_put_contents(BOARD_DIR."/". $filename, $data);

            $content = str_replace($row, BOARD_WEB_DIR."/". $filename, $content);

            $img_array[] = BOARD_WEB_DIR."/". $filename;
        }

        if($subject == ''){
            die(json_encode(["result" => "empty_subject"]));
        }

        if($content == '' || $content == '<p><br></p>'){
            die(json_encode(["result" => "empty_content"]));
        }

        // 다중 파일 첨부

        // 파일 첨부
        // $_FILES[]
        if(isset($_FILES['files'])){

            if(sizeof($_FILES['files']['name']) > 3){
                $arr = [ "result" => "file_upload_count_exceed"];
                die(json_encode($arr)); 
            }

            $tmp_arr = [];

            foreach($_FILES['files']['name'] AS $key => $val){
                // $_FILES['files']['name'][$key];
                $full_srt = ''; 
                
                $tmparr = explode('.', $_FILES['files']['name'][$key]);
                $ext = end($tmparr);
                $flag = rand(1000, 9999);
                $filename = 'a'. date('YmdHis') . $flag .'.'. $ext;
                $file_ori = $_FILES['files']['name'][$key];
    
                // copy() move_uploaded_file()
                copy($_FILES['files']['tmp_name'][$key], BOARD_DIR .'/'. $filename);

                // aaaaa.jpg | 새파일.jpg
                $full_srt = $filename .'|'. $file_ori;
                $tmp_arr[] = $full_srt;
            }

            $file_list_str = implode('?', $tmp_arr);
            
        };    

        $memArr = $member->getInfo($ses_id);

        $full_list_srt = '';

        $name = $memArr['name'];

        $arr = [
            'bcode' => $bcode,
            'id' => $ses_id,
            'name' => $name,
            'subject' => $subject,
            'content' => $content,
            'files' => $full_list_srt,
            'ip' => $_SERVER['REMOTE_ADDR']
        ];

        $board->input($arr);

        die(json_encode(["result" => "success"]));
    }
?>