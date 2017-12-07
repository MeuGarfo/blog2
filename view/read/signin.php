<?php
$data['title']='Entrar';
$formSignin=$View->view('form/signin', null, false);
$data['content']=<<<heredoc
<h2>Entrar</h2>
heredoc;
$data['content']=$data['content'].$formSignin;
$View->view('layout', $data);
