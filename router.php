<?php
$view=new Basic\View();
$segment=$view->segment();
$method=@$_SERVER['REQUEST_METHOD'];
$firstSegment=@$segment[0];
$secondSegment=@$segment[0];
if ($firstSegment=='/') {
    $Home=new app\controller\Home();
    $Home->index();
} elseif ($firstSegment=='message' && $method=='POST') {
} else {
    switch ($firstSegment) {
        /*SIGNIN*/
        case 'signin':
        $controller=new app\controller\Signin();
        $controller->index();
        break;
        /*POSTS*/
        case 'posts':
        $controller=new app\controller\Posts();
        $controller->index();
        break;
        /*DEFAULT*/
        default:
        $data=[
            'view'=>$view
        ];
        $view->view('404', $data);
        break;
    }
}
