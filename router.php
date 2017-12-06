<?php
$View=new Basic\View();
$segment=$View->segment();
$method=@$_SERVER['REQUEST_METHOD'];
$firstSegment=@$segment[0];
if ($firstSegment=='/') {
    $Home=new app\controller\Home();
    $Home->get();
} elseif ($firstSegment=='message' && $method=='POST') {
} else {
    switch ($firstSegment) {
        case 'signin':
        /*SIGNIN*/
        $controller=new app\controller\Signin();
        if ($method=='POST') {
            $controller->post();
        } else {
            $controller->get();
        }
        break;
        default:
        $data=[
            'View'=>$View
        ];
        $View->view('404', $data);
        break;
    }
}
