<?php
$data['title']='Sucesso';
$data['content']=<<<heredoc
<h2>Sucesso</h2>
<p>Seu arquivo foi enviado com sucesso</p>
<p><a href="{$file}">{$file}</a></p>
heredoc;
$view->view('layout', $data);
