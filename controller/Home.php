<?php
namespace app\controller;

use Basic\View;

class Home
{
    public function get()
    {
        $view=new View();
        $db=require_once ROOT.'db.php';
        $where=[
            'id[>]'=>0
        ];
        $messages=$db->select('messages', '*', $where);
        if ($messages) {
            $data=[
                'view'=>$view,
                'messages'=>$messages
            ];
            $view->view('read/home', $data);
        }
        $data=[
            'view'=>$view,
            'messages'=>$messages
        ];
        $view->view('read/home', $data);
    }
}
