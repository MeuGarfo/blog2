<?php
namespace app\controller;

use Basic\Auth;
use Basic\View;

class Signin
{
    public function get()
    {
        $View=new View();
        $data=[
            'View'=>$View
        ];
        $View->view('read/signin', $data);
    }
    public function post()
    {
        $auth=require_once ROOT.'app/inc/auth.php';
        $user=$auth->signin();
        $View=new View();
        $data['View']=$View;
        if (isset($user['error'])) {
            $data['error']=array_flip($user['error']);
            $View->view('read/signin', $data);
        } else {
            $View->redirect('/posts');
        }
    }
}
