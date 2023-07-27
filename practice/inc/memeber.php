<?php
// Member Class file

class Member{
    // 멤버 변수, 프로퍼티
    private $conn;

    // 생성자
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //아이디 중복체크용 멤버 함수, 메서드
    public function  id_exist($id)
    {
        $sql = "SELECT *FROM member WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id',  $id);
        $stmt->execute();

        return $stmt->rowCount() ? true : false;
    }

    public function email_format_check($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function email_exists($email){
        $sql = "SELECT *FROM member WHERE email=:email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email',  $email);
        $stmt->execute();

        return $stmt->rowCount() ? true : false;
    }

    // 회원정보 입력
    public function input($marr){

        // 단방향 암호화
        $new_hash_passowrd = password_hash($marr['password'], PASSWORD_DEFAULT);

        // var_dump($marray);
        $sql = "INSERT INTO member(id, name, password, email, zipcode, addr1, addr2, photo, create_at, ip) VALUES
                (:id, :name, :password, :email, :zipcode, :addr1, :addr2, :photo, NOW(), :ip)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id'      ,  $marr['id']);        
        $stmt->bindParam(':name'    ,  $marr['name']);        
        $stmt->bindParam(':password',  $new_hash_passowrd);        
        $stmt->bindParam(':email'   ,  $marr['email']);        
        $stmt->bindParam(':zipcode' ,  $marr['zipcode']);        
        $stmt->bindParam(':addr1'   ,  $marr['addr1']);        
        $stmt->bindParam(':addr2'   ,  $marr['addr2']); 
        $stmt->bindParam(':photo'   ,  $marr['photo']); 
        $stmt->bindParam(':ip'      ,  $_SERVER['REMOTE_ADDR']);        
        $stmt->execute();
    }

    // 로그인
    public function login($id, $pw){

        // password_verify($password, $new_password);


        $sql = "SELECT password FROM member WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id',  $id);

        $stmt->execute();
        
        if($stmt->rowCount()){
            $row = $stmt->fetch();

            if(password_verify($pw, $row['password'])){
                $sql = "UPDATE member SET login_dt=NOW() WHERE id=:id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':id',  $id);
                $stmt->execute();

                return true;
            }else{
                return false;
            }
        }else{
            return false;

        }
    }

    public function logout(){
        session_start();
        session_destroy();

        die('<script>self.location.href="../index.php"</script>');
    }

    public function getInfo($id){
        $sql = "SELECT * FROM member WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function edit($marr){
        $sql = 'UPDATE member SET name=:name, email=:email, zipcode=:zipcode, addr1=:addr1, addr2=:addr2, photo=:photo';
        $params = [
            ':name' => $marr['name'], 
            ':email' => $marr['email'],
            ':zipcode' => $marr['zipcode'],
            ':addr1' => $marr['addr1'],
            ':addr2' => $marr['addr2'],
            ':photo' => $marr['photo'],
            ':id' => $marr['id']
        ];

        if($marr['password'] != ''){
            // 단방향 암호화
            $new_hash_passowrd = password_hash($marr['password'], PASSWORD_DEFAULT);
            $params[':password'] = $new_hash_passowrd;

            $sql .= ", password=:password";
        }

        $sql.=" WHERE id=:id";

        $stmt = $this->conn->prepare($sql);
        $stmt-> execute($params);
        // 프로필 이미지를 업로드했다면
    }

    public function list(){
        // 번호 아이디 이름 이메일 등록일시
        $sql = "SELECT idx, id, name, email, DATE_FORMAT(create_at, '%Y-%m-%d %H:%i') AS create_at FROM member ORDER BY idx DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function total(){
        $sql = "SELECT COUNT(*) cnt FROM member";
        $stmt = $this->conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $row = $stmt->fetch();
        return $row['cnt'];
    }
}
?>