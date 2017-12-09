<?php
namespace app\controller;

use Basic\Auth;
use Basic\View;

class Posts
{
    public function get($slug=null)
    {
        /*INCs*/
        $db=require_once ROOT.'db.php';
        /*VARs*/
        $auth=new Auth($db);
        $view=new View();
        $data['user']=$auth->isAuth();
        $data['view']=$view;
        /*RULEs*/
        if (is_null($slug)) {
            $where=[
                "id[>=]" => 1
            ];
            $data['posts']=$db->select('posts', '*', $where);
            $view->view('read/posts', $data);
        }
    }
    public function post()
    {
    }
}
