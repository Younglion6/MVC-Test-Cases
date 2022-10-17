<?php

abstract class Controller
{

    protected $view = null;
    protected $model = null;


    public function setView(View $v) 
    {
        
        $this->view = $v;  //create a new view class object

    }


    public function setModel(Observable_Model $m)
    {
        $this->model = $m;
        
    }

    abstract public function run();

}