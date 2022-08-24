<?php 
$men = '';
$lyg = '';
$nelyg = '';
$maximum = '';
$minimum = '';
$average = '';
if(isset($_POST['uzdarbis'])) {
    $alga = $_POST['uzdarbis'];
    $pakeltaAlga = $_POST['pakeltasuzdarbis'];
   


    // pirma uzduotis
    $menesiai = 0;
    $padidinta = $alga;
    while ($padidinta < ($alga*2)){
       $padidinta += $pakeltaAlga;
       $menesiai++;
            
    }
    $men="Pakelta alga bus dvigubai didesnė už algą po $menesiai mėnesių";
}  
   //  antra uzduotis
    if (isset($_POST['skaicius'])) {
        $skaicius = $_POST['skaicius'];
   
    $lyginis = 0;
    $nelyginis = 0;
    $num = 0;
    while ($skaicius > 0) {
   
    $num = $skaicius % 10;
    $skaicius = (int)($skaicius/10);

    if($num %2 == 0){
        $lyginis++;
    } else {
        $nelyginis++;
        
    }   
}
$lyg= "Lyginių skaičių suma : $lyginis";
$nelyg= "Nelyginių skaičių suma : $nelyginis";

    } 
// trecia uzduotis
  if  (isset($_POST['upload'])) {
    move_uploaded_file(
        $_FILES['filename']['tmp_name'], 
        'C:/xampp/htdocs/Paskaita4WhileLoop/'.$_FILES['filename']['name']);
       
        
        
        $failas='C:/xampp/htdocs/Paskaita4WhileLoop/'.$_FILES['filename']['name'];
        $f=fopen($failas, "r");
       
        if ($f) {
            $array = explode("\n", fread($f, filesize($failas)));
            $maximum="Didžiausia oro temperatūra ". (max( $array)). " °C";
            $minimum="Mažiausia oro temperatūra ".(min($array)). " °C";
            $array = array_filter($array);
            $average ="Vidutinė oro temperatūra " .(int) (array_sum($array)/count($array)). " °C";

         }
      
        fclose($f);
      
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>While</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 800px;
            margin: 50px auto;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        .inputai {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        input {
            width: 250px;
            padding: 5px;
            
            margin-bottom: 10px;
        }
        button {
            width: 100px;
            background-color: green;
            color: white;
            border-radius: 15px;
            border-style: none;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post" >
            <h1>Atlyginimo skaičiuoklė</h1>
            <div class="inputai">
                <input type="text" name="uzdarbis" placeholder="Įveskite uždarbį" required>
                <input type="text" name="pakeltasuzdarbis" placeholder="Įveskite padidinto uždarbio sumą" required>
                <button type="submit">Skaičiuoti</button>
                <hr>
                <?php  echo  $men; ?>
                <hr>
            </div>
        </form>
        <form action="" method="post" >

            <h1>Lyginių ir Nelyginių skaičių skaičiuoklė</h1>
            <div class="inputai">
                <input type="text" name="skaicius" placeholder="Įveskite skaičių">
                <button type="submit">Skaičiuoti</button>
                <hr>
                           <?php echo  $lyg;  ?><br>
                           <?php echo  $nelyg; ?>
                <hr>
            </div>
        </form>

            <form action="" method="post" enctype="multipart/form-data">

            <h1>Temperatūrų išvedimas</h1>
            <div class="inputai">
                <input type="hidden" name="upload" value="1">
                <input type="file" name="filename">
                <button>Patvirtinti</button><br>
                <?php echo  $maximum; ?><br> 
                 <?php echo $minimum; ?><br>
                 <?php echo $average; ?>
                 
            </div>
        </form>
    </div>''

</body>
</html>