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
        /*VARs*/
        $this->view=new View();
        $this->db=require_once ROOT.'db.php';
        $this->auth=new Auth($this->db);
        $this->slug=urldecode($this->view->segment(1));
        $this->id=$this->view->segment(2);
        /*RULEs*/
        if ($method=='POST') {
            $this->post();
        } else {
            $this->get();
        }
    }
    public function get()
    {
        if (isset($_GET['create'])) {
            //mostra a tela de criação de posts
            $this->getCreate();
        } elseif (isset($_GET['update']) && $this->slug && $this->id) {
            //mostra a tela de edição de posts
            $this->getUpdate();
        } else {
            if ($this->slug && $this->id) {
                //mostra um post
                $this->getRead();
            } else {
                //mostra todos posts
                $this->showAll();
            }
        }
    }
    public function post()
    {
        if (isset($_GET['create'])) {
            $this->postCreate();
        } elseif (isset($_GET['update'])) {
            $this->postUpdate();
        } elseif (isset($_GET['delete'])) {
            $this->postDelete();
        } else {
            $this->view->out('404');
        }
    }
    public function getCreate()
    {
        /*VARs*/
        $data['user']=$this->auth->isAuth();
        $data['view']=$this->view;
        $data['method']='create';
        /*RULEs*/
        if ($data['user']) {
            $data['view']->view('posts/create', $data);
        } else {
            $data['view']->redirect('/signin');
        }
    }
    public function getRead()
    {
        /*VARs*/
        $where['AND']=[
            'id'=>$this->id,
            'slug'=>$this->slug
        ];
        $data['user']=$this->auth->isAuth();
        $data['post']=$this->db->get('posts', '*', $where);
        $data['view']=$this->view;
        /*RULEs*/
        if ($data['post'] && @$data['post']['online']=='1') {
            $this->view->out('posts/read', $data);
        } else {
            $this->view->out('404');
        }
    }
    public function getUpdate()
    {
        /*VARs*/
        $where['AND']=[
            'id'=>$this->id,
            'slug'=>$this->slug
        ];
        $data['user']=$this->auth->isAuth();
        $data['post']=$this->db->get('posts', '*', $where);
        $data['view']=$this->view;
        $data['method']='update';
        /*RULEs*/
        if ($data['user']) {
            if ($data['post']) {
                $this->view->out('posts/create', $data);
            } else {
                $this->view->out('404');
            }
        } else {
            $this->view->redirect('/signin');
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
    public function postUpdate()
    {
        /*VARs*/
        $post=$_POST;
        $post['slug']=$this->view->slug($post['title']);
        $post['updated_at']=time();
        $where=['id'=>$post['id']];
        $data['user']=$this->auth->isAuth();
        /*RULEs*/
        if ($data['user']) {
            $this->db->update('posts', $post, $where);
            if ($post['online']=='1') {
                $url='/posts/'.$post['slug'].'/'.$post['id'];
                $this->view->redirect($url);
            } else {
                $this->view->redirect('/posts');
            }
        } else {
            $this->view->redirect('/signin');
        }
    }
    public function postDelete()
    {
        //variaveis
        $user=$this->auth->isAuth();
        $postID=$this->slug;
        $where=['id'=>$postID];
        $post=$this->db->get("posts", "*", $where);
        //regras
        if ($post && @$user['id']==$post['user_id']) {
            $this->db->delete('posts', $where);
        }
        $this->view->json(['response'=>'ok']);
    }
    public function showAll()
    {
        /*VARs*/
        $data['user']=$this->auth->isAuth();
        if ($data['user']) {
            $data['view']=$this->view;
            /*RULEs*/
            if ($auth->isAuth()) {
                $where=[
                    "id[>=]" => 1
                ];
                $data['posts']=$this->db->select('posts', '*', $where);
                $this->view->view('posts/showAll', $this->slug);
            }
        } else {
            $view->redirect('/signin');
        }
    }
}
