<?php
namespace Printmelen\NftPortalApi\controllers;

class UserController{
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
                echo json_encode(['id' => 123]);
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