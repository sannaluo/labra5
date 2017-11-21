<?php
session_start();
require_once('config/config.php');
?>
<?php
/**
 * Etsii annetun käyttäjän tiedot kannasta
 * @param $user
 * @param $pwd
 * @param $DBH
 * @return $row käyttäjäolio ,boolean false jos annettua käyttäjää ja salasanaa löydy
 */
function login($user, $pwd,  $DBH) {

    $hashpwd = hash('md5', $pwd.'&8gT');
    $userdata = array('username' => $user, 'pwd' => $hashpwd);

    try {
        $STH = $DBH->prepare("SELECT * FROM p_user WHERE username = '$user' AND
        pwd = '$hashpwd'");

        //HUOM! SQL-lauseessa on monta muuttuvaa) tietoa. Ne on helppo antaa
        // assosiatiivisen taulukon avulla (eli indeksit merkkijonoja)
        //HUOM! Taulukko annetaan nyt execute() metodille
        $STH->execute($userdata);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $row = $STH->fetch();
        var_dump( $row);
        if($STH->rowCount() > 0){
            return $row;
        } else {
            return false;
        }
    } catch(PDOException $e) {
        echo "Login DB error.";
        file_put_contents('log/DBErrors.txt', 'Login: '.$e->getMessage()."\n", FILE_APPEND);
    }
}


SSLon();
//Tänne tullaan kun ilogSign.php lomakkeella painetaan Kirjaudu painiketta
//Kayttaja/salasana kannassa?
//user oliossa kayttajatiedot jos ok, muuten false

$user = login($_POST['username'], $_POST['pwd'], $DBH);
//print_r($user);
if(!$user){
    $_SESSION['loggausvirhe'] = 'jep';
    echo('xd');
    //Aiheuttaa alert() pääsivulla
   // redirect('index.php');

} else {
    unset($_SESSION['loggausvirhe']);
    //Jos käyttäjä tunnistettiin, talletetaan tiedot sessioon esim. kassalle siirtymistä
    //varten on hyvä tietää asiakastiedot
    $_SESSION['kirjautunut'] = 'yes';
	$_SESSION['username'] = $_POST['username'];
	$_SESSION['email']=$user->email;

	//$_SESSION['email'] = $user->email;
	print_r($_SESSION);
	//Jos loggaus onnistuu niin palataan paasivulle
	redirect('tosiIndex.php');
}

?>
