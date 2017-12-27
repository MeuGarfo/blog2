<?php
namespace app\controller;

use Basic\View;
use Basic\Auth;
use Basic\Upload;

class Files
{
    public $db;
    public $auth;
    public $view;
    public $user;
    public function index($method)
    {
        $this->db=require_once ROOT.'db.php';
        $this->auth=new Auth($this->db);
        $this->view=new View();
        $this->user=$this->auth->isAuth();
        if ($method=='POST') {
            $this->post();
        } else {
            $this->get();
        }
    }
    public function get()
    {
        if (isset($_GET['create']) && $this->user) {
            $this->getCreate();
        }
    }
    public function getCreate()
    {
        /*VARs*/
        $data=[
            'view'=>$this->view,
            'user'=>$this->user
        ];
        /*RULEs*/
        $this->view->out('files/create', $data);
    }
    public function post()
    {
        if (isset($_GET['create']) && $this->user) {
            $this->postCreate();
        }
    }
    public function postCreate()
    {
        $upload=new Upload();
        $exts=[
            'gif',
            'jpg',
            'pdf',
            'png'
        ];
        $file=$upload->upload('file', $exts);
        if (isset($file['error'])) {
            print '<pre>';
            print_r($file['error']);
        } else {
            print 'arquivo enviado com sucesso<br>';
            $destination=ROOT.'file/'.$file['name'];
            $upload->move($file['temp'], $destination);
            print $_ENV['site_url'].'/file/'.$file['name'];
        }
    }
}