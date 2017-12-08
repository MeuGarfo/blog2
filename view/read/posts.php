<?php
$data['title']='Posts';
$data['content']=$View->view('screen/posts', $data, false);
$View->view('layout', $data);
