<?php
//KONEKCIJA SA BAZOM "BAZAZAPOSLENIH"
class Baza{
     public $hostname = "localhost";
    public  $username = "root";
     public $password = "";
     public $dbname="bazazaposlenih";
     public  $dblink;
     function __construct(){
     $this->dblink=mysqli_connect($this->hostname,$this->username,$this->password,$this->dbname);
     if(mysqli_connect_errno()){
         echo "neuspesna konekcija";
         exit();
     }else{
        $this->dblink->set_charset("utf8");
     }
    }
     /*
     function __construct(){
   // $conn = mysqli_connect($hostname, $username, $password, $dbname);
  
   
       $this->conn=mysqli_connect($hostname,$username,$password,$dbname);
    if($this->conn->connect_errno)
    {
        echo("Konekcija neuspesna");
        exit();  
    }
    $this->conn->set_charset("utf8");
    }
    /*
    function __construct(){
        $this->dblink = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
        if($this->dblink->connect_errno){
            echo("Konekcija neuspesna");
            exit();
        }
    
        $this->dblink->set_charset("utf8");
    }*/
    /*
//funkcije
function __construct(){ //konstruktor
    $this->dbname="bazazaposlenih";
   //moze dolar ispred dbname i ne mora
     $this->Connect(); //poziv funkcije odozdo
//mora preko this jer su properties
 }
 function Connect(){
     //musqli vraca niz objekata
     //za konekciju sa bazom, mysqli je model za konkeciju sa bazom
     $this->dblink= new mysqli($this->hostname,$this->username, $this->password,$this->dbname);
     //proveravamo da li se desila greska na dblinku
     //erno da li je bilo greske, error gresku tacnu
     if($this->dblink->connect_errno){
         printf("Konekcija neuspesna %s\n", $this->dblink->connect_error);
         exit(); //za nastavljanje dalje ako je sve okej ???
     }
     // postavljamo utf
     $this->dblink->set_charset("utf8");
 }
 */

}



?>