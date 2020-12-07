<?php
//KADA KLIKNEMO NA REGISTRACIJU DOLAZIMO OVDE
include "hr.php";
$k=new HRZaposleni; //inicijalizujemo novog hr zaposlenog

//ako su uneti potrebni podaaci
if(isset($_POST["fime"]) && isset($_POST["fprezime"]) && isset($_POST["femail"]) && isset($_POST["fuser"]) && isset($_POST["fpass"])){
    if($_POST["fime"]!=null && $_POST["fprezime"]!=null && $_POST["femail"]!=null && $_POST["fuser"]!=null && $_POST["fpass"]!=null){    
        $novi_hr=array(
            "ime"=> $_POST["fime"],
            "prezime"=> $_POST["fprezime"],
            "email"=> $_POST["femail"],
            "korisnicko_ime"=> $_POST["fuser"],
            "lozinka"=> $_POST["fpass"]  
        ); //pokupili smo vrednosti
        if($k->insert_hr($novi_hr)){ //ako je uspesno izvrsen insert(metoda iz hr.php)
            echo "Dobrodosli! Uspesna registracija!";
        }
        else {
            echo "Doslo je do greske! Probajte sa prijavom, ne registracijom!";
        }    
    }

    else{
        echo "Molimo Vas da popunite sva polja!";
    }
//refersh niza
    $_POST = array();
    exit();
}

?>