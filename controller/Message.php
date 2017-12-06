<?php
namespace app\controller;

class Message
{
    public function post()
    {
        $data=[
            'name'=>@$_POST['name'],
            'message'=>@$_POST['message'],
            'created_at'=>time()
        ];
        $db=require_once ROOT.'db.php';
        if ($db->insert('messages', $data)) {
            header("Location: /");
        }
    }
}
