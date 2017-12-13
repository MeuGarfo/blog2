<?php
$data['title']='Posts';
$data['content']=$view->view('screen/posts', $data, false);
$view->view('layout', $data);
