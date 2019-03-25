<?php

$uname='root';
$pass='';

try{
$dblog = new PDO('mysql:host=localhost;dbname=bplogin', $uname,$pass);
}catch(PDOException $e)
{
    echo "couldn't connect to database. Contact serveradmin!";
}

