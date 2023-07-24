<?php
    include '../inc/dbconfig.php';

    $db = $pdo;

    include '../inc/memeber.php';

    $mem = new Member($db);

    $id = $_POST['id'];

    if($_POST['mode'] == 'id_chk'){
        if($mem->id_exist($id)){

            die(json_encode(['result' => 'fail']));
            
         }else{

            die(json_encode(['result' => 'success']));

        }
    }   

?>