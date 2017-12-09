<?php
namespace app\controller;

use Basic\Auth;
use Basic\View;

class Signin
{
    public function get()
    {
        /*REQUIREs*/
        require_once ROOT.'inc/view.php';
        /*VARs*/
        $data=[
            'view'=>$view
        ];
        /*CODEs*/
        $view->view('read/signin', $data);
    }
    public function post()
    {
        /*REQUIREs*/
        require_once ROOT.'app/inc/auth.php';
        require_once ROOT.'inc/view.php';
        /*VARs*/
        $user=$auth->signin();
        $data['View']=$view;
        /*CODEs*/
        if (isset($user['error'])) {
            $data['error']=array_flip($user['error']);
            $view->view('read/signin', $data);
        } else {
            $view->redirect('/posts');
        }
    }
}
