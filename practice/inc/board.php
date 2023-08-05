<?php
    //게시판 클래스

    class Board{
        private $conn;

        // 생성자
        public function __construct($db)
        {
            $this->conn = $db;
        }
    }
?>