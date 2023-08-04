<?php
    // 게시판 관리 클래스
    class Board{
        private $conn;

        // 생성자
        public function __construct($db)
        {
            $this->conn = $db;
        }

        // 게시판 목록
        public function list(){
            $sql = "SELECT idx, name, bcode, btype, cnt, DATE_FORMAT(create_at, '%Y-%m-%d %H:%i') AS create_at 
                    FROM board_manage
                    ORDER BY idx ASC";   
                    
            $stmt = $this->conn->prepare($sql);

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        // 게시판 생성
        public function create($arr){
            $sql = "INSERT INTO board_manage(name, bcode, btype, create_at) values (:name, :bcode, :btype, NOW())";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':name', $arr['name']);
            $stmt->bindParam(':bcode', $arr['bcode']);
            $stmt->bindParam(':btype', $arr['btype']);
            $stmt->execute();
        }

        // 게시판 idx로 게시판 정보 가져오기
        public function getBcode($idx){
            $sql = "SELECT bcode  FROM board_manage WHERE idx=:idx";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':idx', $idx);
            $stmt->setFetchMode(PDO::FETCH_COLUMN, 0);
            $stmt->execute();

            return $row = $stmt->fetch();
        }

        // 게시판 삭제
        public function delete($idx){

            //  bcode
            $bcode = $this->getBcode($idx);

            $sql = "DELETE FROM board_manage WHERE idx=:idx";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':idx', $idx);
            $stmt->execute();

            $sql = "DELETE FROM board WHERE bcode=:bcode";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':bcode', $bcode);
            $stmt->execute();
        }

        // 게시판 코드 생성
        public function bcode_create(){
            $letter = range('a', 'z');
            $bcode = '';

            for($i = 0; $i < 6; $i++){
                $r = rand(0, 25);
                $bcode .= $letter[$r];
            }
            return $bcode;
        }
    }
?>