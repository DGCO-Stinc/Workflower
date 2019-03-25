<?php
require_once('dblc.inc.php');

if(isset($_POST['uname']))
{
    $uname = filter_var($_POST['uname']);
}

if(isset($_POST['pass']) && $_POST['pass'] != ' ')
{
    $pass = filter_var($_POST['pass'],FILTER_SANITIZE_STRING);
    echo $pass;
}

global $dblog;
    $query = "SELECT * FROM login WHERE login.email = ?";
    $stmt = $dblog->prepare($query);
    $stmt->execute($uname);
$loginfo = $stmt->fetch(PDO::FETCH_OBJ);
if(password_verify($pass,$loginfo->pass))
{
    session_start();
    $_SESSION['userID'] = $loginfo->klant_id;
    header('Location: /index.php?login=success');
}else
    {
        echo "fout met inloggen!";
    }

//if(password correct)
//{
//  session_start();
// $_SESSION['logged_in'] = true;
//}