<?php
namespace app\controller;

use Basic\Auth;
use Basic\View;

class Signin
{
    public function get()
    {
        /*VARs*/
        $db=require_once ROOT.'db.php';
        $view=new View();
        $auth=new Auth($db);
        $data['view']=$view;
        /*RULEs*/
        if ($auth->isAuth()) {
            $view->redirect('/posts');
        } else {
            $view->view('read/signin', $data);
        }
    }
    public function post()
    {
        /*VARs*/
        $db=require_once ROOT.'db.php';
        $auth=new Auth($db);
        $view=new View();
        $data['view']=$view;
        /*RULEs*/
        if ($auth->isAuth()) {
            $view->redirect('/posts');
        } else {
            $user=$auth->signin();
            if (isset($user['error'])) {
                $data['error']=array_flip($user['error']);
                $view->view('read/signin', $data);
            } else {
                $view->redirect('/posts');
            }
        }
    }
}
