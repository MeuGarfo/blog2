<?php
namespace app\controller;

use Basic\View;

class Home
{
    public function get()
    {
        $View=new View();
        $db=require_once ROOT.'db.php';
        $where=[
            'id[>]'=>0
        ];
        $messages=$db->select('messages', '*', $where);
        if ($messages) {
            $data=[
                'View'=>$View,
                'messages'=>$messages
            ];
            $View->view('home/read', $data);
        }
        $data=[
            'View'=>$View,
            'messages'=>$messages
        ];
        $View->view('home/read', $data);
    }
}
