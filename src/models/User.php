<?php
namespace Printmelen\NftPortalApi\models;
use PDO;
use Printmelen\NftPortalApi\db\Database;

class User{
    private PDO $connection;

    public function __construct(Database $database){
        $this->connection = $database->getConnection();    
    }
    public function getAll():array{
        $stmt = $this->connection->query('SELECT * FROM user');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

        $data = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        return $data;
    }

    public function create(array $data){
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        $stmt = $this->connection->prepare('INSERT INTO user (username, email, password, saldo, phone) 
                                            VALUES (:username, :email, :password, :saldo, :phone)');
        $stmt->bindValue(':username', $data['username'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $data['email'], PDO::PARAM_STR);
        $stmt->bindValue(':password', $data['password'], PDO::PARAM_STR);
        $stmt->bindValue(':saldo', $data['saldo'], PDO::PARAM_STR);
        $stmt->bindValue(':phone', $data['phone'], PDO::PARAM_STR);
        $stmt->execute();

        return $this->connection->lastInsertId();
    }
    
}