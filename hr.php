<?php
include "konekcija.php";
//KLASA HR ZAPOSLENI ZA SVOJIM METODAMA
class HRZaposleni extends Baza{
    
    //metoda koja ubacuje novog hr zaposlenog, U INSERT FORMI ZA REGISTRACIJU
    public function insert_hr($vrednosti){
        if($this->postoji_u_bazi($vrednosti["korisnicko_ime"])==true){
            return false;
        }

        $upit="INSERT INTO hrzaposleni";
        $upit.=" (".implode(",", array_keys($vrednosti)).") VALUES";
        $upit.=" ('".implode("','",array_values($vrednosti))."')";
        $rezultat_upita=$this->dblink->query($upit);
        if($rezultat_upita){
            return true;
        }
        return false;
        
    }
//metoda koja vraca sve hr zaposlene iz baze
    public function select_sve(){
        $upit="SELECT * FROM hrzaposleni";
        $niz_redova=array();
        $rezultat_upita= $this->dblink->query($upit);
        if ($rezultat_upita!=null) {
            while ($red = $rezultat_upita->fetch_assoc()) {
                $niz_redova[]=$red; 
            }
        }
        return $niz_redova;
    }

    //da li taj zaposleni se nalazi u bazi i ima pristup,  ZA LOGIN FORMU
    public function ima_pristup($podaci){
        $redovi=$this->select_sve();
        foreach($redovi as $red){
            if($red["korisnicko_ime"]==$podaci["username"] && $red["lozinka"]==$podaci["password"]){
                return true;
            
            }
        }
        return false;
    }
    //da li vec postoji u bazi, jer ako postoji, necemo ponovo izvrsiti insert

    public function postoji_u_bazi($username){
        $redovi=$this->select_sve();
        foreach($redovi as $red){
            if($red["korisnicko_ime"]==$username){
                return true;
            
            }
        }
        return false;
    }


}
?>