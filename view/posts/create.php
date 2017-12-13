<?php
$data['title']='Criar post';
$data['content']=$view->view('inc/postsForm', $data, false);
$view->view('layout', $data);
