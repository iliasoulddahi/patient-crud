<?php

declare(strict_types=1);

class PatientController extends ControllerBase
{

    public function indexAction()
    {
        $patients = Patient::find();
        return $this->response->setJsonContent([
            "status"=> [
                "code"=> 200,
                "response" => "success",
                "message"=> "success get data patients"
            ],
            "result"=> $patients
        ]);
    }
    public function findOneAction()
    {   $id = $this->dispatcher->getParam('id');
        $patient = Patient::findFirstById($id);

        if(!$patient)
        {
            $this->response->setStatusCode(404, "Not Found");
            return $this->response->setJsonContent([
                "status"=> [
                    "code"=> 404,
                    "response" => "error",
                    "message"=> "patient not found"
                ],
                "result"=> new stdClass()
            ]);
        }
        else
        {
            $this->response->setStatusCode(200, "OK");
            return $this->response->setJsonContent([
                "status"=> [
                    "code"=> 200,
                    "response" => "success",
                    "message"=> "success get data patient"
                ],
                "result"=> $patient
            ]);
        }
    }
    public function createAction()
    {
        $patient = new Patient();

        $patient->name = $this->request->getPost('name');
        $patient->sex = $this->request->getPost('sex');
        $patient->religion = $this->request->getPost('religion');
        $patient->phone = $this->request->getPost('phone');
        $patient->address = $this->request->getPost('address');
        $patient->nik = $this->request->getPost('nik');

        if(!$patient->save())
        {   
            $this->response->setStatusCode(400);
            return $this->response->setJsonContent([
                "status"=> [
                    "code"=> 400,
                    "response" => "error",
                    "message"=> $patient->getMessages()[0]
                ],
                "result"=> new stdClass()
            ]);
        }
        else
        {   
            return $this->response->setJsonContent([
                "status"=> [
                    "code"=> 200,
                    "response" => "success",
                    "message"=> "new patient created successfully"
                ],
                "result"=> new stdClass()
            ]);
        }
    }

    public function updateAction()
    {   $id = $this->dispatcher->getParam('id');
        $patient = Patient::findFirstById($id);

        if(!$patient)
        {
            $this->response->setStatusCode(404, "not found");
            return $this->response->setJsonContent([
                "status"=> [
                    "code"=> 404,
                    "response" => "error",
                    "message"=> "Patient not found"
                ],
                "result"=> new stdClass()
            ]);
        }
        
        $putData = $this->request->getPut();
        if(isset($putData["name"])) {
            $patient->name = $putData["name"];
        }
        if(isset($putData["sex"])) {
            $patient->sex = $putData["sex"];
        }
        if(isset($putData["religion"])) {
            $patient->religion = $putData["religion"];
        }
        if(isset($putData["phone"])) {
            $patient->phone = $putData["phone"];
        }
        if(isset($putData["address"])) {
            $patient->address = $putData["address"];
        }
        if(isset($putData["nik"])) {
            $patient->nik = $putData["nik"];
        }

        if(!$patient->save())
        {
            $this->response->setStatusCode(400, "Bad Request");
            return $this->response->setJsonContent([
                "status"=> [
                    "code"=> 400,
                    "response" => "error",
                    "message"=> $patient->getMessages()[0]
                ],
                "result"=> new stdClass()
            ]);
        }
        else
        {
            $this->response->setStatusCode(200, "OK");
            return $this->response->setJsonContent([
                "status"=> [
                    "code"=> 200,
                    "response" => "success",
                    "message"=> "patient updated successfully"
                ],
                "result"=> new stdClass()
            ]);
        }
    }

    public function deleteAction(){
        $id = $this->dispatcher->getParam("id");
        $patient = Patient::findFirstById($id);

        if(!$patient)
        {
            $this->response->setStatusCode(404, "Not Found");
            return $this->response->setJsonContent([
                "status"=> [
                    "code"=> 404,
                    "response" => "error",
                    "message"=> "patient not found"
                ],
                "result"=> new stdClass()
            ]);
        }
        else
        {
            $patient->delete();
            $this->response->setStatusCode(200, "OK");
            return $this->response->setJsonContent([
                "status"=> [
                    "code"=> 200,
                    "response" => "success",
                    "message"=> "patient deleted successfully"
                ],
                "result"=> new stdClass()
            ]);
        }
    }
}
