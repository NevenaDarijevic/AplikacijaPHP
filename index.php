<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="new_style.css"> <!-- koriscenje new_style.css-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!--AJAX koji nam omogucava registraciju i prijavu HR zaposlenog-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> <!--koriscenje bootstrapa-->
    <title>HR SEKTOR FIMA</title>
    
</head>
<?php
    include "radnik.php";
?>
<body>
<div class="container">
        <form id="login_form">
        <h1>Prijava</h1>
        <div class="form-group">
            <label for="fuser">Korisnicko ime:</label><br>
            <input type="text"name="fuser" class="form_control"><br>
        </div>
            
        <div class="form-group">
            <label for="fpass">Lozinka:</label><br>
            <input type="password"name="fpass" class="form_control"><br><br>
        </div>
        <div class="form-group">
            <button type="submit" id="b" name="login"  class="btn btn-secondary" >Uloguj se</button>
        </div>
        </form><br>
    
        <form id="reg_form" >
            <h1>Registracija</h1>

            <div class="form-group">
            <label for="fime">Ime:</label><br>
            <input class="form_control" type="text" name="fime" ><br>
            </div>

            <div class="form-group">
            <label for="fprezime">Prezime:</label><br>
            <input class="form_control" type="text" name="fprezime" ><br><br>
            </div>

            <div class="form-group">
            <label for="femail">E-mail:</label><br>
            <input class="form_control" type="text" name="femail" ><br><br>
            </div>

            <div class="form-group">
            <label for="fuser">Korisnicko ime:</label><br>
            <input class="form_control" type="text" name="fuser" ><br>
            </div>

            <div class="form-group">
            <label for="fpass">Lozinka:</label><br>
            <input class="form_control" type="password" name="fpass" ><br><br>
            </div>

            <div class="form-group">
            <input type="submit" id="b" class="btn btn-secondary" value="Registruj se" >
            </div>
            
        </form><br>
      
</div>
<!-- SKRIPTA 1- KAD SE ISPUNI FORMA ZA REGISTRACIJU POZIVA SE insert.php koja ubacuje novog HR zaposlenog-->
<script>

        $('#reg_form').submit(function(event){
            event.preventDefault();
            const $podaci = $(this);
            var podaciZaSlanje = $podaci.serialize();
            document.getElementById("reg_form").reset();
            $.ajax({
                url: 'insert.php',
                type: 'POST',
                data: podaciZaSlanje,
                success: function(response){
                    if(response){
                        alert(response);
                    }
                }
            });
        });
        //PRILIKOM ULOGOVANJA HR ZAPOSLENOG PROVERAVA SE IZ login.php DA LI POSTOJI TAKAV ZAPOSLENI DA BI MOGAO DA NASTAVI DALJE
        $('#login_form').submit(function(event){
            event.preventDefault();
            const $podaci = $(this);
            var podaciZaSlanje = $podaci.serialize();
            document.getElementById("login_form").reset();
            $.ajax({
                url: 'login.php',
                type: 'POST',
                data: podaciZaSlanje,
                success: function(response){
                    if(response=='ok'){
                        //UKOLIKO ZAPOSLENI POSTOJI OTVARA MU SE STRANICA ZA UNOS NOVOG RADNIKA U BAZU
                        window.location.href='unos.php';
                    }
                    else{
                        alert(response)
                        
                    }
                }
            });
        });

</script>

</body>

</html>