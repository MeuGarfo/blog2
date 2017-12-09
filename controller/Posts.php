<?php
namespace app\controller;

use Basic\Auth;
use Basic\View;

class Posts
{
    public function get($slug=null)
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
                $view->view('read/posts', $data);
            }
        } else {
            $view->redirect('/signin');
        }
    }
    public function post()
    {
    }
}
