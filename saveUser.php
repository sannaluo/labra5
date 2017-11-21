<?php
session_start();
require_once('config/config.php');

SSLon();

$userdata = unserialize($_SESSION['lomakedata']);  //tekstimuodosta takaisin taulukoksi
//$data['email'] = $userdata['email'];

$email = $userdata['email'];
$username = $userdata['username'];
$pwd = $userdata['pwd'];
//var_dump( $userdata);
//var_dump($_SESSION['lomakedata']);

try {
$STH = $DBH->prepare("SELECT * FROM p_user WHERE email= '$email'");   //myös username tähän ettei samoja usernameja
$STH->execute($userdata);
$row = $STH->fetch();  //Löytyiko sama email osoite?

if($STH->rowCount() == 0){ //Jos ei niin rekisteröidään
// lisää suola '!!'
$pwd = md5($userdata['pwd'].'&8gT');  //hashataan salasana suolalla

try {
$STH2 = $DBH->prepare("INSERT INTO p_user (username, email, pwd, admin)
VALUES ('$username', '$email','$pwd', 0);");
if($STH2->execute($userdata)){
try {
//Jos käyttäjän tallennus onnistui asetetaan hänet loggautuneeksi
//eli kirjoitetaan käyttäjätiedot myös sessiomuuttujiin
$sql = "SELECT * FROM p_user WHERE id = ".$DBH->lastInsertId().";";
$STH3 = $DBH->query($sql);
$STH3->setFetchMode(PDO::FETCH_OBJ);
$user = $STH3->fetch();
/*
    $_SESSION['kirjautunut'] = 'yes';
    $_SESSION['username'] = $user->username;
    $_SESSION['email'] = $user->email;
*/
    session_destroy();
redirect('index.php');  //Palaa heti index.php sivulle

} catch(PDOException $e) {
    echo 'Käyttäjän tietojen hakuerhe';
    file_put_contents('log/DBErrors.txt', 'tallennaKayttaja 3:
    '.$e->getMessage()."\n", FILE_APPEND);
    }
    }
} catch(PDOException $e) {
    echo 'Tietojen lisäyserhe';
    file_put_contents('log/DBErrors.txt', 'tallennaKayttaja 2: '.$e->getMessage()."\n",
    FILE_APPEND);
    }
} else {
    echo 'Käyttäjä on jo olemassa.';
    echo '<a href="register.php" class="button punainen">Takaisin</a>';
}
} catch(PDOException $e) {	echo 'Tietokantaerhe.';
file_put_contents('log/DBErrors.txt', 'tallennaKayttaja 1: '.$e->getMessage()."\n", FILE_APPEND);

}

//echo $userdata['email'];
?>
