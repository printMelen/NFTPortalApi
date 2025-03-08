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
    
}