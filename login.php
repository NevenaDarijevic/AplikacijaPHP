<?php
include "hr.php";
$k=new HRZaposleni; //inicijalizujemo novog hr zaposlenog
//ako je sve setovano i razlicito od null
if(isset($_POST["fuser"]) && isset($_POST["fpass"])){
    if($_POST["fuser"]!=null && $_POST["fpass"]!=null){    
        $podaci=array(
            "username"=> $_POST["fuser"],
            "password"=> $_POST["fpass"]
        ); //pokupili smo podatke

        if($k->ima_pristup($podaci)){ //proveravamo ima li pristup pozivom ove metode iz hr.php
            echo "ok";
        }
        else{
            echo "Ne postoji HR zaposleni sa tim podacima. Probaj opet!";
        }
    }    
    else{
        echo "Molimo Vas da popunite sva polja!";
    }


    $_POST = array();
    exit();
}


?>