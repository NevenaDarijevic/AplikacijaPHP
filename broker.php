<?php

class Baza{
    public $hostname = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname="bazazaposlenih";
    public $dblink;
    function __construct(){
        $this->dblink = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
        if($this->dblink->connect_errno){
            echo("Konekcija neuspesna");
            exit();
        }
    
        $this->dblink->set_charset("utf8");
    }
}



?>