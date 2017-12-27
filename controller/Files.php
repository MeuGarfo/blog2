<?php
namespace app\controller;

use Basic\View;
use Basic\Auth;

class Files
{
    public $db;
    public $auth;
    public $view;
    public function index($method)
    {
        $this->db=require_once ROOT.'db.php';
        $this->auth=new Auth($this->db);
        $this->view=new View();
        if ($method=='POST') {
            $this->post();
        } else {
            $this->get();
        }
    }
    public function get()
    {
        if (isset($_GET['create'])) {
            $this->getCreate();
        }
    }
    public function getCreate()
    {
        /*VARs*/
        $data=[
            'view'=>$this->view,
            'user'=>$this->auth->isAuth()
        ];
        /*RULEs*/
        if ($data['user']) {
            $this->view->out('files/create', $data);
        } else {
            $this->view->redirect('/signin');
        }
    }
}
