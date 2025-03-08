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
                // $this->postCollection();
                break;
            default:
                http_response_code(405);
                break;
        }
    }
}