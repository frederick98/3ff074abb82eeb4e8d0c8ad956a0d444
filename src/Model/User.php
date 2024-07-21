<?php
namespace src\Model;

class User{
    private $db = null;

    public function __construct($db){
        $this->db = $db;
    }

    public function getAllUser(){
        $query = "
            select id, name, email, phone_number, username, password
            from user;
        ";

        try {
            $query  = $this->db->query($query);
            $result = $query->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getUserById($id){
        $query = "
            select id, name, email, phone_number, username, password
            from user
            where id=?;
        ";

        try {
            $query  = $this->db->prepare($query);
            $query->execute(array($id));
            $result = $query->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
    
    public function createUser(Array $param){
        $query = "
            insert into user (name, email, phone_number, username, password)
            values (:name, :email, :phone_number, :username, :password);
        ";

        try {
            $query  = $this->db->prepare($query);
            $query->execute(array(
                'name'          => $param['name'],
                'email'         => $param['email'],
                'phone_number'  => $param['phone_number'],
                'username'      => $param['username'],
                'password'      => $param['password']
            ));
            $result = $query->rowCount();
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
    
    public function updateUser($id, Array $param){
        $query = "
            update user
            set name=name, email=email, phone_number=phone_number, username=username, password=password
            where id=:id;
        ";

        try {
            $query  = $this->db->prepare($query);
            $query->execute(array(
                'id'            => (int) $id,
                'name'          => $param['name'],
                'email'         => $param['email'],
                'phone_number'  => $param['phone_number'],
                'username'      => $param['username'],
                'password'      => $param['password']
            ));
            $result = $query->rowCount();
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
    
    public function deleteUser($id){
        $query = "
            delete from user
            where id=:id;
        ";

        try {
            $query  = $this->db->prepare($query);
            $query->execute(array(
                'id' => $id
            ));
            $result = $query->rowCount();
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
}