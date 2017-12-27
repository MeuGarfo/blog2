<?php
$data['title']=$post['title'];
$data['content']=<<<heredoc
<h1>{$post['title']}</h1>
{$post['content']}
heredoc;
$view->view('layout', $data);
