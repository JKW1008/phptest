<?php
    $fuserid = $_POST['fuserid'];           // 제일 먼저 선언해야 함
    $fname = $_POST['fname'];
    $fpasswd = $_POST['fpasswd'];
    $fpasswd_re = $_POST['fpasswd_re'];
    $fsex = $_POST['fsex'];
    $femail = $_POST['femail'];
    $userip = $_SERVER['REMOTE_ADDR'];      // 사용자 주소 IP

    include "../lib/connect_db.php";

    // 필수 입력 항목에 대한 입력 여부 검사
    if($fuserid == "" || $fname == "" || $fpasswd == "" || $fpasswd_re == "" || $fpasswd != $fpasswd_re)
    {
        echo "<script> alert(' * 필수 입력사항은 반드시 입력해야 합니다...');
            history.back();
            </script>";
            die;    // 프로그램을 중단
    }

    // PHP와 MySQL 한글 깨짐 방지
    mysqli_query($conn, "set session character_set_connection=utf8");
    mysqli_query($conn, "set session character_set_results=utf8");
    mysqli_query($conn, "set session character_set_client=utf8");

    // 데이터베이스에 입력된 정보 저장
    $sql = "INSERT INTO user_tbl (userid, name, passwd, sex, email, date, ip_addr) values ('$fuserid', '$fname', '$fpasswd', '$fsex', '$femail', now(), '$userip')";
?>