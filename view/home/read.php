<?php
$data['title']='Blog';
$data['content']=$view->out('inc/homeRead', $data, false);
$view->view('layout', $data);
