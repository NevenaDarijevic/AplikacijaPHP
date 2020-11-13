<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="new_style.css">
    <title>HR SEKTOR</title>
    <script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
</head>
<?php
    include "radnik.php";
?>
<body>
    <div class="container">
        <form id="insert_form" method="post" action="handler.php">
        <h1>Unos novog radnika</h1>
        <h3>Unesite podatke o radniku</h3>
            <div class="form-group">
                <label for="fid">Id:</label><br>
                <input  class="form_control" type="text"name="fid" id="id_form"><span id="id_error"></span><br>
            </div>
            <div class="form-group">   
                <label for="fime">Ime:</label><br>
                <input  class="form_control" type="text"name="fime" id="ime"><span id="ime_error"></span><br>
            </div>
            <div class="form-group">
                <label for="fprezime">Prezime:</label><br>
                <input class="form_control" type="text"name="fprezime" id="prezime"><span id="prezime_error"></span><br>
            </div>
            <div class="form-group">
                <label for="fsss">Stepen strucne spreme:</label>
                    <select name="fsss">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                       
                    </select><br>
            </div>
           
            <div class="form-group">
                <label for="fgrad">Grad:</label><br>
                <input class="form_control" type="text"name="fgrad" id="grad"><span id="grad_error"></span><br><br>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="insert" value="Unesi"><br><br><br>
            </div>
        </form>
        <br>
        <a href="show.php" id="b" class="btn btn-secondary" >Prikaz baze zaposlenih radnika FIMA</a>
        <a href="index.php" id="b" class="btn btn-danger">Odjavi se</a> 
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>

    $(document).ready(function(){

        function hasNumbers(t){
        var regex = /\d/g;
        return regex.test(t);
        } 

        $("#id_error").hide();
        $("#ime_error").hide();
        $("#prezime_error").hide();
        $("#grad_error").hide();

        var id_error=false;
        var ime_error=false;
        var prezime_error=false;
        var grad_error=false;

        function provera_id(){
            var id=$("#id_form").val().length;
            if(id==0){
                id_error=true;
                $("#id_error").html(" Unesite id zaposlenog!");
                $("#id_error").show();
            }
            else{
                $("#id_error").hide();
            }
        }
        
        function provera_ime(){
            var ime=$("#ime").val();
            //alert(ime);
            if(hasNumbers(ime) || ime.length==0){
                ime_error=true;
                $("#ime_error").html(" Greska! Unesi ime!");
                $("#ime_error").show();
            }
            else{
                $("#ime_error").hide();
            }
        }

        function provera_cena(){
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

        $("#id_form").focusout(function(){
            provera_id();
        });
        
        $("#ime").focusout(function(){
            provera_ime();
        });

        $("#prezime").focusout(function(){
            provera_prezime();
        });

        $("#grad").focusout(function(){
            provera_grad();
        });


        $("#insert_form").submit(function(){
        id_error=false;
        ime_error=false;
        prezime_error=false;
        grad_error=false;

        provera_prezime();
        provera_ime();
        provera_id();
        provera_grad();

        if(id_error==false && ime_error==false && prezime_error==false && grad_error==false){
            return true;
        }
        else{
            return false;
        }

        })


    });
    
    </script>
</body>

</html>