<?php
include "radnik.php";
$k=new Radnik;
//HANDLER OMOGUCAVA IZMENU I UBACIVANJE RADNIKA U BAZU
if(isset($_POST["insert"])){
        $radnik=array(
            "id"=> $_POST["fid"],
            "ime"=> $_POST["fime"],
            "stepenstrucnespreme"=> $_POST["fsss"],
            "prezime"=> $_POST["fprezime"],
            "grad"=> $_POST["fgrad"]  
        );
        if($k->insert_radnik("radnici",$radnik)){
            echo "<script>
                    alert('Uspesno ste ubacili radnika u bazu zaposlenih!');
                    window.location.href='unos.php';
                </script>";
        }
        else{
            echo "<script>
                alert('Niste uspeli da ubacite radnika u bazu!');
                window.location.href='unos.php';
                </script>";
        }
    $_POST = array();
    exit();
        
}

if(isset($_POST["update"])){
        $id=$_POST["fid"];
        $radnik=array(
            "ime"=> $_POST["fime"],
            "stepenstrucnespreme"=> $_POST["fsss"],
            "prezime"=> $_POST["fprezime"],
            "grad"=> $_POST["fgrad"]  
        );
        if($k->update_po_id("radnici",$radnik,$id)){
            echo "<script>
                    alert('Uspesno ste izmenili podatke o radniku!');
                    window.location.href='show.php';
                </script>";
        }
        else{
            echo "<script>
                    alert('Niste uspeli da izmenite podatke o radniku!');
                    window.location.href='show.php';
                </script>";
        }
    $_POST = array();
    exit();
}

?>