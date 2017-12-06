<?php
$data['title']='Blog';
$messageCreateForm=$View->view('message/create', [], false);
$messages=$View->view('message/list', $data, false);
$data['content']=<<<heredoc
<h2>Mensagens</h2>
heredoc;
$data['content']=$data['content'].$messages.$messageCreateForm;
$View->view('layout', $data);
