<?php
$data['title']='Sucesso';
$data['content']=<<<heredoc
<h2>{$data['title']}</h2>
<p><a href="{$file}">{$file}</a></p>
heredoc;
$view->view('layout', $data);
