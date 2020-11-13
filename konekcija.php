<?php
//KONEKCIJA SA BAZOM "BAZAZAPOSLENIH"
class Baza{
     public $hostname = "localhost";
    public  $username = "root";
     public $password = "";
     public $dbname="bazazaposlenih";
     public  $dblink;
     //konstruktor
     function __construct(){
     $this->dblink=mysqli_connect($this->hostname,$this->username,$this->password,$this->dbname);
     if(mysqli_connect_errno()){
         echo "Neuspesna konekcija";
         exit();
     }else{
        $this->dblink->set_charset("utf8");
     }
    }
     

}



?>