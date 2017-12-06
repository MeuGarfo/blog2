<?php
$View=new Basic\View();
$segment=$View->segment();
$method=@$_SERVER['REQUEST_METHOD'];
$firstSegment=@$segment[0];
if ($firstSegment=='/') {
    $Home=new app\controller\Home();
    $Home->get();
} elseif ($firstSegment=='message' && $method=='POST') {
    $Message=new app\controller\Message();
    $Message->post();
} else {
    $data=[
        'View'=>$View
    ];
    $View->view(VIEW_DIR.'404', $data);
}
