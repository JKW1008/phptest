<?php
    include '../inc/dbconfig.php';

    $db = $pdo;

    include '../inc/memeber.php';

    $mem = new Member($db);

    $id    = (isset($_POST['id'   ]) && $_POST['id'   ] != '') ? $_POST['id'   ] : '';
    $email = (isset($_POST['email']) && $_POST['email'] != '') ? $_POST['email'] : '';


    if($_POST['mode'] == 'id_chk'){

        if($id == ''){
            die(json_encode(['result' => 'empty_id']));
            
        }
        
        if($mem->id_exist($id)){

            die(json_encode(['result' => 'fail']));
            
         }else{

            die(json_encode(['result' => 'success']));

        }
    }else if($_POST['mode'] == 'email_chk'){

        if($email == ''){
            die(json_encode(['result' => 'empty_email']));
            
        }

        if($mem->email_exists($email)){

            die(json_encode(['result' => 'fail']));
            
         }else{

            die(json_encode(['result' => 'success']));

        }
    }   
?>