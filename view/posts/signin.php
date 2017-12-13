<?php
$data['title']='Entrar';
$data['content']=$view->view('form/signin', $data, false);
$view->view('layout', $data);
