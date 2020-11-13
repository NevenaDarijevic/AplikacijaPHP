<?php
//ZA BRISANJE RADNIKA IZ BAZE
include "show.php";
if(isset($_POST['id'])) {
    $id=$_POST['id'];
    $upit="DELETE FROM radnici WHERE id="."'$id'";
    $rezultat_upita=$obj->dblink->query($upit);
    if ($rezultat_upita) {
        return true;
        
    } else {
        return false;
        
    }
}
?>