<?php
session_start();

//Lomakkeen syöttötiedot $data[] taulukossa
$data = $_POST['data'];
//Laitetaan syötetyt tiedot sessioon jemmaan, jotta voidaan palata muuttamaan annettuja arvoja
$_SESSION['lomakedata'] = serialize($data);
var_dump( $data);
var_dump($_SESSION['lomakedata']);
//Ovatko nimi ja email oikein? Nyt tarkistus palvelimella
if(filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {  //valmis php funktio
    if(preg_match("/^[a-öA-Ö ]*$/",$data['username'])) { //Sallitaan kirjaimia ja välilyöntejä

        echo '<a href="saveUser.php" class="button sininen">Tallenna</a>';
        echo '<br>';
    }else {
        echo("<h3>VAIN KIRJAIMIA JA VÄLILYÖNTEJÄ HYVÄKSYTÄÄN KÄYTTÄJÄNIMESSÄ: <br />"
            .$data['username'] ."</h3>");
    }
}else{
    echo("<h3>LAITON SÄHKÖPOSTIOSOITE: <br />"
        .$data['email']."</h3>");
}
echo '<a href="register.php" class="button punainen">Takaisin</a>';
?>
