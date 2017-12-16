<?php
namespace app\controller;

use Basic\Auth;
use Basic\View;

class Posts
{
    public $view;
    public $db;
    public function index($method)
    {
        $this->view=new View();
        $this->db=require_once ROOT.'db.php';
        if ($method=='POST') {
            $this->post();
        } else {
            $this->get();
        }
    }
    public function get($slug=null, $id=null)
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
        $auth=new Auth($this->db);
        $data['user']=$auth->isAuth();
        $data['view']=$this->view;
        /*RULEs*/
        if ($data['user']) {
            $data['view']->view('posts/create', $data);
        } else {
            $data['view']->redirect('/signin');
        }
    }
    public function postCreate()
    {
        /*VARs*/
        $auth=new Auth($this->db);
        $data['user']=$auth->isAuth();
        $data['view']=$this->view;
        $post=$_POST;
        $data['user']=$auth->isAuth();
        $post['user_id']=$data['user']['id'];
        $post['created_at']=time();
        $post['updated_at']=time();
        /*RULEs*/
        $post['slug']=$data['view']->slug($post['title']);
        if ($data['user']) {
            $this->db->insert('posts', $post);
            $id=$this->db->id();
            $url='/posts/'.$post['slug'].'/'.$id;
            $data['view']->redirect($url);
        } else {
            $data['view']->redirect('/signin', $data);
        }
    }
    public function showAll($slug)
    {
        /*VARs*/
        $auth=new Auth($this->db);
        $data['user']=$auth->isAuth();
        if ($data['user']) {
            $data['view']=$this->view;
            /*RULEs*/
            if (is_null($slug) && $auth->isAuth()) {
                $where=[
                    "id[>=]" => 1
                ];
                $data['posts']=$this->db->select('posts', '*', $where);
                $this->view->view('posts/showAll', $data);
            }
        } else {
            $view->redirect('/signin');
        }
    }
}
