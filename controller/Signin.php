<?php
namespace app\controller;

use Basic\Auth;
use Basic\View;

class Signin
{
    public function get()
    {
        $view=new View();
        $data=[
            'view'=>$view
        ];
        $view->view('read/signin', $data);
    }
    public function post()
    {
        $auth=require_once ROOT.'app/inc/auth.php';
        $user=$auth->signin();
        $view=new View();
        $data['View']=$View;
        if (isset($user['error'])) {
            $data['error']=array_flip($user['error']);
            $view->view('read/signin', $data);
        } else {
            $view->redirect('/posts');
        }
    }
}
