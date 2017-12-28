<?php
$data['title']=$post['title'];
$updateLink='';
if ($user) {
    $url='/posts/'.$post['slug'].'/'.$post['id'].'?update';
    $updateLink='<a href="'.$url.'">Editar</a> | ';
}
$postCreatedAt=strftime("%A, %d de %B de %Y %H:%M", $post['created_at']);
$postCreatedAt=ucfirst($postCreatedAt);
$data['content']=<<<heredoc

<p><small>{$updateLink}{$postCreatedAt}</small></p>
<h2>{$post['title']}</h2>
{$post['content']}
heredoc;
$view->view('layout', $data);
