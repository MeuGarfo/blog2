<?php
$data['title']='Entrar';
$data['content']=$view->view('inc/signinForm', $data, false);
$view->view('layout', $data);
