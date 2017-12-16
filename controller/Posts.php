<?php
namespace app\controller;

use Basic\Auth;
use Basic\View;

class Posts
{
    public $view;
    public $db;
    public $slug;
    public $id;
    public $auth;
    public function index($method)
    {
        $this->view=new View();
        $this->db=require_once ROOT.'db.php';
        $this->auth=new Auth($this->db);
        if ($method=='POST') {
            $this->post();
        } else {
            $this->get();
        }
    }
    public function get()
    {
        /*VARs*/
        $this->slug=$this->view->segment(1);
        $this->id=$this->view->segment(2);
        /*RULEs*/
        if (isset($_GET['create'])) {
            $this->getCreate();
        } elseif ($this->slug && $this->id) {
            $this->getPosts($this->slug, $this->id);
        } else {
            $this->showAll($slug);
        }
    }
    public function getPosts($slug, $id)
    {
        /*VARs*/
        $where['AND']=[
            'id'=>$this->id,
            'slug'=>$this->slug
        ];
        $data['user']=$this->auth->isAuth();
        $data['posts']=$this->db->get('posts', '*', $where);
        /*RULEs*/
        if ($data['posts']) {
            $this->view->out('posts/read', $data);
        } else {
            $this->view->out('404');
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
        $data['user']=$this->auth->isAuth();
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
