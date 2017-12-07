<?php
$data['title']='Blog';
$data['content']=<<<heredoc
hello world
heredoc;
$View->view('layout', $data);
