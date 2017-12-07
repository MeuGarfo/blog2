<?php
$data['title']='Entrar';
$formSignin=$View->view('inc/formSigninRead', null, false);
$data['content']=<<<heredoc
<h2>Entrar</h2>
heredoc;
$data['content']=$data['content'].$formSigninRead;
$View->view('layout', $data);
