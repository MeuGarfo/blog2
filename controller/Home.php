<?php
namespace app\controller;

use Basic\View;
use Basic\Auth;

class Home
{
    public $db;
    public $auth;
    public $view;
    public function index($method)
    {
        $this->db=require_once ROOT.'db.php';
        $this->auth=new Auth($this->db);
        $this->view=new View();
        $this->get();
    }
    public function get()
    {
        /*VARs*/

        $where=[
            'id[>]'=>0
        ];
        $messages=$this->db->select('messages', '*', $where);
        $data=[
            'view'=>$this->view,
            'messages'=>$messages,
            'user'=>$this->auth->isAuth()
        ];
        /*RULEs*/
        $this->view->out('home/read', $data);
    }
}
