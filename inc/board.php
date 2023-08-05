<?php
    //게시판 클래스

    class Board{
        private $conn;

        // 생성자
        public function __construct($db)
        {
            $this->conn = $db;
        }

        // 글 등록
        // bcode, id, namem, subject, content, hit, ip, create_at
        // NOW() -> 2023-08-06 16:34:11 현재 연월일시분초
        public function input($arr){
            $sql = "INSERT INTO board(bcode, id, name, subject, content, hit, ip, create_at) VALUES(
                :bcode, :id, :name, :subject, :content, 0, :ip, NOW())"; // hit는 정수로 가정하고 초기값으로 0을 설정
        
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':bcode', $arr['bcode']);
            $stmt->bindValue(':id', $arr['id']);
            $stmt->bindValue(':name', $arr['name']);
            $stmt->bindValue(':subject', $arr['subject']);
            $stmt->bindValue(':content', $arr['content']);
            $stmt->bindValue(':ip', $arr['ip']);
            $stmt->execute();
        }
        
    }
?>