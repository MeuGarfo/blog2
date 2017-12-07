<?php
$data['title']='Entrar';
$data['content']=$View->view('form/signin', null, false);
$View->view('layout', $data);
