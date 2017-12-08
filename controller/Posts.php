<?php
namespace app\controller;

use Basic\Auth;
use Basic\View;

class Posts
{
    public function get($slug=null)
    {
        $auth=ROOT.'app/inc/auth.php';
        $data['user']=$auth->isAuth();
        $view=new View();
        $data['view']=$view;
        if (is_null($slug)) {
            $db=require_once ROOT.'db.php';
            $where=["id[>=]" => 1];
            $data['posts']=$db->select('posts', '*', $where);
            $view->view('read/posts', $data);
        }
    }
    public function post()
    {
    }
}
