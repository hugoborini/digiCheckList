<?php

class ApiController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function ajaxAction()
    {
        $initadater = new Application_Model_Todo();

        $request = $this->getRequest();
        $data = $request->getPost();
        $initadater->addTodo($data["todo"]);
    }

    public function ajaxsupAction()
    {
        $initadater = new Application_Model_Todo();

        $request = $this->getRequest();
        $data = $request->getPost();
        $initadater->supTodo($data["id_todo"]);
    }


}





