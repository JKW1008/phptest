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
}
?>