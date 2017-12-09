<?php
namespace app\controller;

use Basic\Auth;
use Basic\View;

class Posts
{
    public function get($slug=null)
    {
        /*INCs*/
        require_once ROOT.'db.php';
        require_once APP.'inc/auth.php';
        require_once APP.'inc/view.php';
        /*VARs*/
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
