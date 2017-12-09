<?php
namespace app\controller;

use Basic\Auth;
use Basic\View;

class Signin
{
    public function get()
    {
        /*INCs*/
        require_once APP.'inc/view.php';
        /*VARs*/
        $data=[
            'view'=>view()
        ];
        /*RULEs*/
        view()->view('read/signin', $data);
    }
    public function post()
    {
        /*INCs*/
        $db=require_once ROOT.'db.php';
        /*VARs*/
        $auth=new Basic\Auth($db);
        $view=new Basic\View();
        $user=$auth->signin();
        $data['View']=view();
        /*RULEs*/
        if (isset($user['error'])) {
            $data['error']=array_flip($user['error']);
            view()->view('read/signin', $data);
        } else {
            $view->redirect('/posts');
        }
    }
}
