<?php
$data['title']='Criar post';
$data['content']=$view->view('form/postCreate', $data, false);
$view->view('layout', $data);
