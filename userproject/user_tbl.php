<?php
    include "../lib/connect_db.php";

    echo "<center><p><br><b><h2> user_tbl 테이블 성공여부 판별</h2></b></p>";

    // dsl_db 데이터베이스의 선택 성공 여부
    if($db)
    {
        echo " [ dsl_db ] 데이터베이스 선택 완료 <br>";
    }
    else
    {
        echo "<B> dsl_db 데이터베이스 선택 실패 </B><br>";
        echo " 프로그램을 종료합니다...";
        exit;
    }

    // user_tbl 생성
    $sql = "CREATE TABLE user_tbl(
            no int primary key not null auto_increment,
            userid varchar(12) not null,
            name varchar(12) not null,
            passwd varchar(12),
            sex char(1),
            email varchar(30),
            date datetime,
            ip_addr varchar(30))
            default charset=utf8";
    
    $result = mysqli_query($conn, $sql);

    // user_tbl 테이블 존재여부
    if($result)
    {
        echo "<hr>";
        echo "<p> 성공적으로 user_tbl 테이블을 생성하였습니다...<br><br>";
        echo "....이제 레코드를 삽입할 준비가 되었습니다....<hr><br>";
        echo " >> <a href=main.php> 메인 화면으로 이동 </a> <<center <br>";
    }else{
        echo "<hr>";
        echo "<p><font color=red> user_tbl 테이블은 이미 생성되었습니다...</p>";
        echo "....MySQL에 접속하여 확인하기 바랍니다.!! <hr><br></font>";
        echo ">> <a href=main.php> 메인 화면으로 이동 </a> <<center <br>";
        exit;
    }
    echo "</center>";
    mysqli_close($conn);
    
?>