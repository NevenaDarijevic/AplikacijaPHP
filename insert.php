<?php
include "hr.php";
$k=new HRZaposleni;

if(isset($_POST["fime"]) && isset($_POST["fprezime"]) && isset($_POST["femail"]) && isset($_POST["fuser"]) && isset($_POST["fpass"])){
    if($_POST["fime"]!=null && $_POST["fprezime"]!=null && $_POST["femail"]!=null && $_POST["fuser"]!=null && $_POST["fpass"]!=null){    
        $novi_hr=array(
            "ime"=> $_POST["fime"],
            "prezime"=> $_POST["fprezime"],
            "email"=> $_POST["femail"],
            "korisnicko_ime"=> $_POST["fuser"],
            "lozinka"=> $_POST["fpass"]  
        );
        if($k->insert_hr($novi_hr)){
            echo "Dobrodosli! Uspesna registracija!";
        }
        else {
            echo "Doslo je do greske! Probajte sa prijavom, ne registracijom!";
        }    
    }

    else{
        echo "Molimo Vas da popunite sva polja!";
    }

    $_POST = array();
    exit();
}

?>