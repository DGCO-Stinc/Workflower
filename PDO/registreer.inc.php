<?php
if(isset($_POST['register'])) {

    if (isset($_POST['email']) && $_POST['email'] != ' ') {
        $email = strtolower(filter_var($_POST['email'], FILTER_SANITIZE_STRING));
    }

    if (isset($_POST['pass']) && $_POST['pass'] != ' ') {
        $pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
        $pass = password_hash($pass, PASSWORD_DEFAULT);
    }
    if (isset($_POST['naam']) && $_POST['naam'] != ' ') {
        $naam = filter_var($_POST['naam'], FILTER_SANITIZE_STRING);
    }
    if (isset($_POST['achternaam']) && $_POST['achternaam'] != ' ') {
        $achternaam = filter_var($_POST['achternaam'], FILTER_SANITIZE_STRING);
    }

    if (isset($_POST['woonplaats']) && $_POST['woonplaats'] != ' ') {
        $woonplaats = filter_var($_POST['woonplaats'], FILTER_SANITIZE_STRING);
    }
    if (isset($_POST['postcode']) && $_POST['postcode'] != ' ') {
        $postcode = filter_var($_POST['postcode'], FILTER_SANITIZE_STRING);
        $postcode = strtolower(preg_replace('/\s+/', '', $postcode));
    }
    if (isset($_POST['straat']) && $_POST['straat'] != ' ') {
        $straat = filter_var($_POST['straat'], FILTER_SANITIZE_STRING);
    }


    require('dblc.inc.php');

    $query = "SELECT email FROM login WHERE email = '?'";
    $stmt = $dblog->prepare($query);
    $stmt->execute(array($email));

    if($stmt->rowCount() != null) {
        header("location: /registreer.php?error=aae");
        exit();
    }else{
        $query = 'INSERT INTO login (email,pass,bool_admin) VALUES (?,?,?)';
        $stmt = $dblog->prepare($query);
        $stmt->execute(array($email, $pass,false));

        $query = 'INSERT INTO klantgegevens (naam,achternaam,woonplaats,postcode,straatnaam) VALUES (?,?,?,?,?)';
        $stmt = $dblog->prepare($query);
        $stmt->execute(array($naam, $achternaam, $woonplaats, $postcode, $straat));

        header("location: /index.php");
        exit();
    }

}else
    {
        print("ERROR: YOU ACCESSED A PAGE WITHOUT THE NECESSARY STEPS<br>You are to be taken back to the home page in 5sec");
        sleep(5);
        header('LOCATION: /index.php');
        exit();
    }