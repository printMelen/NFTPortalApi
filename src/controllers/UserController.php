<?php
namespace Printmelen\NftPortalApi\controllers;
use Printmelen\NftPortalApi\models\User;
class UserController{

    public function __construct(private User $user){
        
    }
    public function processRequest(string $method, ?string $id):void {
        if ($id) {
            $this->processItem($method, $id);       
        }else{
            $this->processCollection($method);
        }
    }

    public function processItem(string $method, string $id):void {
        
    }

    public function processCollection(string $method):void {
        switch ($method) {
            case 'GET':
                echo json_encode($this->user->getAll());
                break;
            case 'POST':
                $data = (array) json_decode(file_get_contents('php://input'), true);
                $id = $this->user->create($data);

                http_response_code(201);
                echo json_encode([
                    'message' => 'User created',
                    'id' => $id
                ]);
                break;
            default:
                http_response_code(405);
                break;
        }
    }
}