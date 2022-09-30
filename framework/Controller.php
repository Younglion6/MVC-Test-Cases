<?php

abstract class Controller {

    abstract protected function setModel(Model $m);
    abstract protected function setView(View $v);
    abstract protected function run();

    protected $view;
    protected $model;


}

class ConcreteControllerClass extends Controller {

    public function setView(View $v) 
    {
        $this->view =  $v;  //create a new view class object

    }


    public function setModel(Model $m)
    {
        $this->model = $m;
        
    }


    public function getModel() : Model          //return the Model object
    {
        return $this->model;
    }


    public function run() 
    {

    }

}