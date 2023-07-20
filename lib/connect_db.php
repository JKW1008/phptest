<?php
    $host = "svc.sel4.cloudtype.app";       
    $db = "dsl"; 
    $user = "test";
    $pass = "1234";
    $port = "30105";
    
    $conn = mysqli_connect($host, $user, $pass, $db, $port) or die("mysql서버 접속 에러");
?>