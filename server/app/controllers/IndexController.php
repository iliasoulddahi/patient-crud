<?php
declare(strict_types=1);

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        return $this->response->setJsonContent([
            'message' => 'Hello, World!'
        ]);
    }

}

