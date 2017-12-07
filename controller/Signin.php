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
        if (isset($user['error'])) {
            var_dump($user['error']);
        } else {
            print 'Bem vindo '.$user['name'];
        }
    }
}
