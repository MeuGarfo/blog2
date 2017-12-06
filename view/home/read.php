<?php
$data['title']='Guest';
$messageCreateForm=$View->view(VIEW_DIR.'message/create', [], false);
$messages=$View->view(VIEW_DIR.'message/list', $data, false);
$data['content']=<<<heredoc
<h2>Mensagens</h2>
heredoc;
$data['content']=$data['content'].$messages.$messageCreateForm;
$View->view(VIEW_DIR.'layout', $data);
