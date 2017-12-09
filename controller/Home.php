<?php
namespace app\controller;

use Basic\View;

class Home
{
    public function get()
    {
        /*REQUIREs*/
        require_once ROOT.'db.php';
        require_once ROOT.'inc/view.php';
        /*VARs*/
        $where=[
            'id[>]'=>0
        ];
        $messages=$db->select('messages', '*', $where);
        $data=[
            'view'=>$view,
            'messages'=>$messages
        ];
        /*CODEs*/
        $view->view('read/home', $data);
    }
}
