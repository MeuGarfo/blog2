<?php
$data['title']='Entrar';
$data['content']=$View->view('form/signin', $data, false);
$View->view('layout', $data);
