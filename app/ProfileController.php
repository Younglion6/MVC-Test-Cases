<?php

class ProfileController extends Controller 
{
    public function run()
    {
        SessionManager::create();

        $sess = new SessionManager();
        $sess->remove('user');
        //create the model object
        $v = new View();
        $v->setTemplate(TPL_DIR . '/profile.tpl.php');

        //set the model and the view
        $this->setModel(new ProfileModel());
        $this->setView($v);

        $this->model->attach($this->view);

        //checks if user can access the page
        $user = $sess->get('user');

        if($sess->accessible($user, 'profile')) {
            $data - $this->model->getAll();

            $this->model->updateThechangedData($data);

            $this->model->notify();

        }
        else {
            $v->setTemplate(TPL_DIR . '/login.tpl.php');
            $v->display();
        }
    }
}