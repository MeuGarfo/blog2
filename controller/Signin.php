<?php
namespace app\controller;

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
}
