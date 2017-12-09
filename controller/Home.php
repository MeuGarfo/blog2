<?php
namespace app\controller;

use Basic\View;

class Home
{
    public function get()
    {
        /*INCs*/
        require_once ROOT.'db.php';
        require_once APP.'inc/view.php';
        /*VARs*/
        $where=[
            'id[>]'=>0
        ];
        $messages=$db->select('messages', '*', $where);
        $data=[
            'view'=>$view,
            'messages'=>$messages
        ];
        /*RULEs*/
        $view->view('read/home', $data);
    }
}
