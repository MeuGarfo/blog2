<?php
namespace app\controller;

use Basic\Auth;
use Basic\View;

class Signin
{
    public function get()
    {
        /*INCs*/
        /*VARs*/
        $view=new View();
        $data['view']=$view;
        /*RULEs*/
        $view->view('read/signin', $data);
    }
    public function post()
    {
        /*INCs*/
        $db=require_once ROOT.'db.php';
        /*VARs*/
        $auth=new Auth($db);
        $view=new View();
        $user=$auth->signin();
        $data['view']=$view;
        /*RULEs*/
        if (isset($user['error'])) {
            $data['error']=array_flip($user['error']);
            $view->view('read/signin', $data);
        } else {
            $view->redirect('/posts');
        }
    }
}
