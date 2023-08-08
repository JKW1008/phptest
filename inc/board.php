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
                public function list($bcode, $page, $limit, $paramArr) {
                    $start = ($page - 1) * $limit;
                    $where = "WHERE bcode=:bcode ";
                    $params = [':bcode' => $bcode]; // Initialize the $params array here
                
                    if (isset($paramArr['sn']) && $paramArr['sn'] != '' && isset($paramArr['sf']) && $paramArr['sf'] != '') {
                        switch ($paramArr['sn']) {
                            case 1:
                                $where .= "AND (subject LIKE CONCAT('%', :sf, '%') OR (content LIKE CONCAT('%', :sf2, '%'))) ";
                                $params[':sf'] = $paramArr['sf'];
                                $params[':sf2'] = $paramArr['sf'];
                                break; // 제목 + 내용
                
                            case 2:
                                $where .= "AND (subject LIKE CONCAT('%', :sf, '%')) ";
                                $params[':sf'] = $paramArr['sf'];
                                break; // 제목
                
                            case 3:
                                $where .= "AND (content  LIKE CONCAT('%', :sf, '%')) ";
                                $params[':sf'] = $paramArr['sf'];
                                break; // 내용
                
                            case 4:
                                $where .= "AND (name = :sf) ";
                                $params[':sf'] = $paramArr['sf'];
                                break; // 글쓴이
                        }
                    }
                
                    $sql = "SELECT idx, id, subject, name, hit, DATE_FORMAT(create_at, '%Y-%m-%d %H:%i') AS create_at 
                            FROM board " . $where . " 
                            ORDER BY idx DESC LIMIT " . $start . "," . $limit;
                
                    $stmt = $this->conn->prepare($sql);
                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $stmt->execute($params);
                    return $stmt->fetchAll();
                }
                
                
                // 전체 글 수 구하기
                public function total($bcode, $paramArr){

                    $where = "WHERE bcode=:bcode ";
                    $params = [':bcode' => $bcode]; // Initialize the $params array here
                
                    if (isset($paramArr['sn']) && $paramArr['sn'] != '' && isset($paramArr['sf']) && $paramArr['sf'] != '') {
                        switch ($paramArr['sn']) {
                            case 1:
                                $where .= "AND (subject LIKE CONCAT('%', :sf, '%') OR (content LIKE CONCAT('%', :sf2, '%'))) ";
                                $params[':sf'] = $paramArr['sf'];
                                $params[':sf2'] = $paramArr['sf'];
                                break; // 제목 + 내용
                
                            case 2:
                                $where .= "AND (subject LIKE CONCAT('%', :sf, '%')) ";
                                $params[':sf'] = $paramArr['sf'];
                                break; // 제목
                
                            case 3:
                                $where .= "AND (content  LIKE CONCAT('%', :sf, '%')) ";
                                $params[':sf'] = $paramArr['sf'];
                                break; // 내용
                
                            case 4:
                                $where .= "AND (name = :sf) ";
                                $params[':sf'] = $paramArr['sf'];
                                break; // 글쓴이
                        }
                    }
                
                    $sql = "SELECT COUNT(*) AS cnt
                            FROM board " . $where; 
                
                    $stmt = $this->conn->prepare($sql);
        
                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $stmt->execute($params);
                    $row = $stmt->fetch();
                    return $row['cnt'];
                } 
    }
?>