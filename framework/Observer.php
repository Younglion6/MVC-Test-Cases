<?php

interface Observer {

    public function add(Model $subject);
    public function remove($subject);
    public function notify();
}


    class Model implements Observer {
        private $models;

        public function add(Model $subject) {
            array_push($this->models = $subject);
        }

        public function notify() {
        
        }

    }
