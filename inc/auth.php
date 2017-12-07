<?php
$db=require_once ROOT.'db.php';
return new Basic\Auth($db);
