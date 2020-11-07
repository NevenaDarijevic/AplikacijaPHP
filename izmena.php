<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="new_style.css">
    <title>HR SEKTOR FIMA</title>
    <script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
</head>
<?php
    include "radnik.php";
    $obj=new Radnik;
    $id=$_GET['id'];
    $red=$obj->select_po_id("radnik",$id);

?>
<body>
    <div class="container">
        <h1>Izmena podataka o zaposlenim radnicima</h1>

    </div>
    <div class="container">
        <h3>Izmeni podatke radnika</h3>
        <form id="update_form" method="post" action="handler.php">
        <div class="form-group">
            <label for="fid">Id:</label><br>
            <input type="text"name="fid" class="form_control" value="<?php echo $id;?>" readonly>
            <p style="color:red;">Id se ne moze naknadno menjati.<br> Za pomoc konaktirajte administratora.</p>
        </div>
        <div class="form-group">
            <label for="fime">Ime:</label><br>
            <input type="text"name="fime" class="form_control" value="<?php echo $red["ime"];?>" id="ime"><span id="ime_error"></span><br>
        </div>
        <div class="form-group">
            <label for="fsss">Stepen strucne spreme:</label>
                <select name="fss">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    
                </select><br>
        </div>
        <div class="form-group">
            <label for="fprezima">Prezime:</label><br>
            <input type="text" name="fprezime" class="form_control" value="<?php echo $red["prezime"];?>" id="prezime"><span id="prezime_error"></span><br>
        </div>
        <div class="form-group">
            <label for="fgrad">Grad:</label><br>
            <input type="text" name="fgrad" class="form_control" value="<?php echo $red["grad"];?>" id="grad"><span id="grad_error"></span><br>
        </div> 
            <input  class="btn btn-primary" type="submit" name="update" value="Izmeni zaposlenog"><br><br><br>

            <a href="show.php" class="btn btn-secondary">Prikazi bazu</a>     

        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function(){

    function hasNumbers(t){
    var regex = /\d/g;
    return regex.test(t);
    } 

    $("#ime_error").hide();
    $("#prezime_error").hide();
    $("#grad_error").hide();

    var ime_error=false;
    var prezime_error=false;
    var grad_error=false;

    function provera_ime(){
        var ime=$("#ime").val();
        if(hasNumbers(ime) || ime.length==0){
            ime_error=true;
            $("#ime_error").html(" Greska! Unesi ime!");
            $("#ime_error").show();
        }
        else{
            $("#ime_error").hide();
        }
    }

    function provera_prezime(){
        var prezime=$("#prezime").val();
        if(hasNumbers(prezime) || prezime.length==0){
            prezime_error=true;
            $("#prezime_error").html(" Greska! Unesi prezime!");
            $("#prezime_error").show();
        }
        else{
            $("#prezime_error").hide();
        }
    }

    function provera_grad(){
        var grad=$("#grad").val();
            if(hasNumbers(grad) || grad.length==0){
                grad_error=true;
                $("#grad_error").html(" Greska! Unesi grad!");
                $("#grad_error").show();
            }
            else{
                $("#grad_error").hide();
            }
        }

        $("#ime").focusout(function(){
            provera_ime();
        });

        $("#prezime").focusout(function(){
            provera_prezime();
        });

        $("#grad").focusout(function(){
            provera_grad();
        });


        $("#update_form").submit(function(){
        
            ime_error=false;
            prezime_error=false;
            grad_error=false;

            provera_prezime();
            provera_ime();
            
            provera_grad();

            if(ime_error==false && prezime_error==false && grad_error==false){
                return true;
            }
            else{
                return false;
            }
        });
    });
    </script>

</body>

</html>