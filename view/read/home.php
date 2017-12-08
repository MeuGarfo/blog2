<?php
$data['title']='Blog';
$data['content']=<<<heredoc
hello world
heredoc;
$view->view('layout', $data);
