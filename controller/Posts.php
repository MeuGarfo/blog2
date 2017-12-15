<?php
namespace app\controller;

use Basic\Auth;
use Basic\View;

class Posts
{
    public function index($method)
    {
        if ($method=='POST') {
            $this->post();
        } else {
            $this->get();
        }
    }
    public function get($slug=null)
    {
        if (is_null($slug) && isset($_GET['create'])) {
            $this->getCreate();
        } else {
            $this->showAll($slug);
        }
    }
    public function post($slug=null)
    {
        if (is_null($slug) && isset($_GET['create'])) {
            $this->postCreate();
        }
    }
    public function getCreate()
    {
        /*VARs*/
        $db=require_once ROOT.'db.php';
        $auth=new Auth($db);
        $data['user']=$auth->isAuth();
        $data['view']=new View();
        /*RULEs*/
        if ($data['user']) {
            $data['view']->view('posts/create', $data);
        } else {
            $data['view']->redirect('/signin');
        }
    }
    public function postCreate()
    {
        print 'post create';
    }
    public function showAll($slug)
    {
        /*VARs*/
        $db=require_once ROOT.'db.php';
        $auth=new Auth($db);
        $view=new View();
        $data['user']=$auth->isAuth();
        if ($data['user']) {
            $data['view']=$view;
            /*RULEs*/
            if (is_null($slug) && $auth->isAuth()) {
                $where=[
                    "id[>=]" => 1
                ];
                $data['posts']=$db->select('posts', '*', $where);
                $view->view('posts/showAll', $data);
            }
        } else {
            $view->redirect('/signin');
        }
    }
}
