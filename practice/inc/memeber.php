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
        // var_dump($marray);
        $sql = "INSERT INTO member(id, name, password, email, zipcode, addr1, addr2, photo, create_at, ip) VALUES
                (:id, :name, :password, :email, :zipcode, :addr1, :addr2, :photo, NOW(), :ip)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id'      ,  $marr['id']);        
        $stmt->bindParam(':name'    ,  $marr['name']);        
        $stmt->bindParam(':password',  $marr['password']);        
        $stmt->bindParam(':email'   ,  $marr['email']);        
        $stmt->bindParam(':zipcode' ,  $marr['zipcode']);        
        $stmt->bindParam(':addr1'   ,  $marr['addr1']);        
        $stmt->bindParam(':addr2'   ,  $marr['addr2']); 
        $stmt->bindParam(':photo'   ,  $marr['photo']); 
        $stmt->bindParam(':ip'      ,  $_SERVER['REMOTE_ADDR']);        
        $stmt->execute();
    }
}
?>