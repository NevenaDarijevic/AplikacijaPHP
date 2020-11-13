<?php
include "konekcija.php";
class Radnik extends Baza{
    
    public function insert_radnik($table, $vrednosti){
        $upit="INSERT INTO ".$table;
        $upit.=" (".implode(",", array_keys($vrednosti)).") VALUES";
        $upit.=" ('".implode("','",array_values($vrednosti))."')";
        $rezultat_upita=$this->dblink->query($upit);
        if($rezultat_upita){
            return true;
        }
        return false;
        
    }
    
    public function select_sve($table){
        $upit="SELECT * FROM ".$table;
        $niz_redova=array();
        $rezultat_upita= $this->dblink->query($upit);
        if ($rezultat_upita!=null) {
            while ($red = $rezultat_upita->fetch_assoc()) {
                $niz_redova[]=$red; 
            }
        }
        return $niz_redova;
    }

    public function select_po_id($table, $vrednost){
        $upit= "SELECT * FROM ".$table." WHERE id="."'$vrednost'";
        $rezultat_upita=$this->dblink->query($upit);
        $red = $rezultat_upita->fetch_assoc();
        return $red;
    }

    public function update_po_id($table,$vrednosti,$id){
        $upit= "UPDATE ".$table." SET ";
        $set="";
        foreach ($vrednosti as $key => $value) {
            $set.=$key." = '".$value."' , ";
        }
        $set=substr($set,0,-2);
        $upit.=$set." WHERE id='".$id."'";
        $rezultat_upita=$this->dblink->query($upit);
        if($rezultat_upita){
            return true;
        }
        return false;
    }

}
?>
