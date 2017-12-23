<?php
$view=new Basic\View();
$segment=$view->segment();
$method=@$_SERVER['REQUEST_METHOD'];
switch (@$segment[0]) {
    /*home*/
    case '/':
    $controller=new app\controller\Home();
    $controller->index($method);
    break;
    /*logout*/
    case 'logout':
    $controller=new app\controller\Logout();
    $controller->index($method);
    break;
    /*posts*/
    case 'posts':
    $controller=new app\controller\Posts();
    $controller->index($method);
    break;
    /*signin*/
    case 'signin':
    $controller=new app\controller\Signin();
    $controller->index($method);
    break;
    /*404*/
    default:
    $data['view']=$view;
    $view->view('404', $data);
    break;
}
