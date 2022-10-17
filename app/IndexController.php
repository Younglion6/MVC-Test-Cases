<?php

class IndexController extends Controller 
{
    public function run()
    {
        //create the view object
        $v = new View();
        $v->setTemplate(TPL_DIR . '/index.tpl.php');

        //set the model and the view
        $this->setModel(new IndexModel());
        $this->setView($v);

        $this->model->attach($this->view);
        
        $data = $this->model->getAll();

        $this->model->updateThechangedData($data);

        //tell the model to contact other 
        $this->model->notify();
    }
}