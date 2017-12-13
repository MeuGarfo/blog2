<?php
$data['title']='Criar post';
$data['content']=$view->view('inc/postsCreate', $data, false);
$view->view('layout', $data);
