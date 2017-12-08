<?php
namespace app\controller;

use Basic\Auth;
use Basic\View;

class Posts
{
    public function get($slug=null)
    {
        /*VARs*/
        $auth=require_once ROOT.'app/inc/auth.php';
        $db=require_once ROOT.'db.php';
        die(var_dump($db));
        $data['user']=$auth->isAuth();
        $view=new View();
        $data['view']=$view;
        /*CODEs*/
        if (is_null($slug)) {
            $where=["id[>=]" => 1];
            $data['posts']=$db->select('posts', '*', $where);
            $view->view('read/posts', $data);
        }
    }
    public function post()
    {
    }
}
