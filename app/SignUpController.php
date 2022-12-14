<?php

class SignUpController extends Controller 
{
    public function run()
    {
        //create the model object
        $v = new View();
        $v->setTemplate(TPL_DIR . '/signup.tpl.php');

        //set the model and the view
        $this->setModel(new SignUpModel());
        $this->setView($v);

        $this->model->attach($this->view);
        
        $data = $this->model->getAll();

        $this->model->updateThechangedData($data);

        $this->model->notify();
    }    

  
}