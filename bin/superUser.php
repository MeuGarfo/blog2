<?php
$db=require_once '../db.php';
$user['name']=$_ENV['su_name'];
$user['email']=$_ENV['su_email'];
$user['password']=$_ENV['su_password'];
$user['type']='super';
if ($db->get('users', '*', ['email'=>$user['email']])) {
    print 'o email já está em uso por outro usuário'.PHP_EOL;
} else {
    $Auth=new Basic\Auth($db);
    $user=$Auth->signup($user);
    if (isset($user['error'])) {
        print 'erro ao criar super usuário:'.PHP_EOL;
        var_dump($user);
    } else {
        print 'super usuário criado com sucesso.'.PHP_EOL;
    }
}
