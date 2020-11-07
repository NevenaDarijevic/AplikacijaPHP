<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="new_style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Inventar</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
    include "kafa.php";
    $obj=new Kafa;
?>
<body>
    <div class="container">
        <h1>Nase kafe</h1>
    <div class="container">
        <table id="myTable" class="table table-bordered">
            <tr>
                <th title="Ne mozes sortirati po ID">ID</th>
                <th title="Sortiraj po imenu">Kafa <i class="fas fa-sort"></i></th>
                <th title="Sortiraj po zemlji porekla">Zemlja porekla <i class="fas fa-sort"></i></th>
                <th title="Sortiraj po ceni">Cena <i class="fas fa-sort"></i></th>
                <th title="Sortiraj po kolicini">Kolicina <i class="fas fa-sort"></i></th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>

            <?php
                $redovi=$obj->select_sve("kafe");
                foreach($redovi as $red){
                    $id=$red["id"];
                   // echo $id;
            ?>
                <tr>
                    <td><?php echo $red["id"];?></td>
                    <td><?php echo $red["naziv"];?></td>
                    <td><?php echo $red["zemlja_porekla"];?></td>
                    <td><?php echo $red["cena"];?></td>
                    <td><?php echo $red["kolicina"];?></td>
                    <td><a href="izmena.php?update=1&id=<?php echo $id;?>" class="btn btn-primary">Izmeni</a></td>
                    <td><button  class="btn btn-danger" id="<?php echo $red["id"];?>" onClick="obrisi(this);"> Obrisi </button></td>
                </tr>
            <?php
                }
            ?>
        </table><br><br><br>
        <a href="unos.php" class="btn btn-secondary">Vrati se</a>
    </div>


<script type="text/javascript">
    th=document.getElementsByTagName('th');
    th[0].addEventListener('click',function(){
        alert("Ne mozete sortirati po ID");
    })
    for(let c=1;c<th.length;c++){
        th[c].addEventListener('click',item(c))
    }
    function item(c){
        return function(){
            sortTable(c)
        }
    }

    function sortTable(c){
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.getElementById("myTable");
        switching = true;
        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("TD")[c].innerHTML;
                y = rows[i + 1].getElementsByTagName("TD")[c].innerHTML;
                if(isNaN(x) && isNaN(y)){
                    if (x.toLowerCase() > y.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
                else{
                    x_n=Number(x);
                    y_n=Number(y)
                    if (x_n>y_n) {
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }
    }

        function obrisi(x){
            var el=x;
            var id=x.id;
            $.ajax({
                url: 'delete.php',
                type: 'POST',
                data: {'id':id},
                success: function(response){
                    if(response){
                        $(el).closest('tr').fadeOut(800,function(){
                            $(this).remove();
                        })
                    }
                    else{
                        alert("greska")
                    }
                   
                }
            });
        };

</script>
</body>


</html>