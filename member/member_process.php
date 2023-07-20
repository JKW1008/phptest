<?php
    require_once('../DB/db.php');

    switch($_GET['mode']){
        case 'register' :
            $id = $_POST['id'];
            $userid = $_POST['userid'];
            $pw1 = $_POST['pw1'];
            $pw2 = $_POST['pw2'];
            $name = $_POST['name'];
            $sex = $_POST['sex'];
            $tel = $_POST['tel'];
            $email = $_POST['email'];
        break;
    }
?>