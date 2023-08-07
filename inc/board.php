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
            $sql = "INSERT INTO board(bcode, id, name, subject, content, files, hit, ip, create_at) VALUES(
                :bcode, :id, :name, :subject, :content, :files, 0, :ip, NOW())"; // hit는 정수로 가정하고 초기값으로 0을 설정
        
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':bcode', $arr['bcode']);
            $stmt->bindValue(':id', $arr['id']);
            $stmt->bindValue(':name', $arr['name']);
            $stmt->bindValue(':subject', $arr['subject']);
            $stmt->bindValue(':content', $arr['content']);
            $stmt->bindValue(':files', $arr['files']);
            $stmt->bindValue(':ip', $arr['ip']);
            $stmt->execute();
        }

        // 글 목록
                // 회원목록
                public function list($bcode, $page, $limit, $paramArr){
                    $start = ($page - 1) * $limit;
                    
                    $where = "WHERE bcode=:bcode";
                    
                    if(isset($paramArr['sn']) && $paramArr['sn'] != '' && isset($paramArr['sf']) && $paramArr['sf'] != ''){
                        switch($paramArr['sn']){
                            case 1 : $sn_str = 'name'; break;
                            case 2 : $sn_str = 'id'; break;
                            case 3 : $sn_str = 'email'; break;
                        }
                    
                        $where .= " ". $sn_str."=:sf ";
                    }
                    
                    $sql = "SELECT idx, id, subject, name, hit, DATE_FORMAT(create_at, '%Y-%m-%d %H:%i') AS create_at 
                            FROM board ". $where ." 
                            ORDER BY idx DESC LIMIT ".$start.",".$limit;
                    
                    $stmt = $this->conn->prepare($sql);

                    $stmt->bindValue(':bcode', $bcode);

                                        
                    if(isset($paramArr['sf']) && $paramArr['sf'] != ''){
                        // 조건에 따라서 ':sf' 파라미터를 바인딩합니다.
                        $stmt->bindValue(':sf', $paramArr['sf']);
                    }
                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $stmt->execute();
                    return $stmt->fetchAll();
                }
                
                // 전체 글 수 구하기
                public function total($bcode, $paramArr){

                    $where = "WHERE bcode=:bcode ";
        
                    if(isset($paramArr['sn']) && $paramArr['sn'] != '' && isset($paramArr['sf']) && $paramArr['sf'] != ''){
                        switch($paramArr['sn']){
                            case 1 : $sn_str = 'name'; break;
                            case 2 : $sn_str = 'id'; break;
                            case 3 : $sn_str = 'email'; break;
                        }
        
                        $where .= "AND ". $sn_str."=:sf ";
                    }
        
                    $sql = "SELECT COUNT(*) cnt FROM board ". $where;
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bindValue(':bcode', $bcode);
                    if(isset($paramArr['sf']) && $paramArr['sf'] != ''){
                        $stmt->bindValue(':sf', $paramArr['sf']);
                    }
        
                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $stmt->execute();
                    $row = $stmt->fetch();
                    return $row['cnt'];
                } 
                
        
    }
?>