<?php
include "hr.php";
$k=new HRZaposleni;

if(isset($_POST["fuser"]) && isset($_POST["fpass"])){
    if($_POST["fuser"]!=null && $_POST["fpass"]!=null){    
        $podaci=array(
            "username"=> $_POST["fuser"],
            "password"=> $_POST["fpass"]
        );

        if($k->ima_pristup($podaci)){
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