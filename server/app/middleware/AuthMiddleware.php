<?php 
namespace App\Middleware;

use Phalcon\Mvc\Micro;
use Phalcon\Mvc\Micro\MiddlewareInterface;
use Phalcon\Http\Response;

class AuthMiddleware implements MiddlewareInterface
{
    public function call(Micro $app)
    {
        $access_token = $app->request->getHeader("access_token");
        if(!$access_token) 
        {
            $response = new Response();
            $response->setStatusCode(401, "Unauthorized");
            $response->setJsonContent([
                "status"=> [
                    "code"=> 401,
                    "response" => "error",
                    "message"=> "Unautorized"
                ],
                "result"=> new stdClass()
            ]);
            $response->send();
            return false;
        }
    }
}