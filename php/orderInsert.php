<?php
include_once'conn.php';
if(isset($_POST['submit'])){
   if (!empty($_POST['nameC']) || isset($_POST['nameC'])){
    $streetC= $_POST['streetC'];
   }else{
    $streetC="error";
   }




$buildingC= $_POST['buildingC'];
$localC= $_POST['localC'];
$postCodeC= $_POST['postCodeC'];
$cityC= $_POST['cityC'];
$nipC= $_POST['nipC'];
$countryC= $_POST['countryC'];
$datetimeO= $_POST['datetimeO'];
$describeO= $_POST['describeO'];
$name1= $_POST['name1'];
$name2= $_POST['name2'];
$name3= $_POST['name3'];
$name4= $_POST['name4'];
$name5= $_POST['name5'];
$name6= $_POST['name6'];
$name7= $_POST['name7'];
$cena1= $_POST['cena1'];
$cena2= $_POST['cena2'];
$cena3= $_POST['cena3'];
$cena4= $_POST['cena4'];
$cena5= $_POST['cena5'];
$cena6= $_POST['cena6'];
$cena7= $_POST['cena7'];
$ilosc1= $_POST['ilosc1'];
$ilosc2= $_POST['ilosc2'];
$ilosc3= $_POST['ilosc3'];
$ilosc4= $_POST['ilosc4'];
$ilosc5= $_POST['ilosc5'];
$ilosc6= $_POST['ilosc6'];
$ilosc7= $_POST['ilosc7'];
$Vat1= $_POST['Vat1'];
$Vat2= $_POST['Vat2'];
$Vat3= $_POST['Vat3'];
$Vat4= $_POST['Vat4'];
$Vat5= $_POST['Vat5'];
$Vat6= $_POST['Vat6'];
$Vat7= $_POST['Vat7'];


//walidacja Vat ilosc cena
for($x=1;$x<=7;$x++){
    if(!is_numeric(${"cena$x"})){
        ${"cena$x"}=0;
    }
    if(!is_numeric(${"ilosc$x"})){
        ${"cena$x"}=0;
    }
    if(!is_numeric(${"Vat$x"})){
        ${"cena$x"}=0;
    }

    
    
}

//zastosowanie pętli for() do obliczania całej warości
  for($x=1;$x<=7;$x++){
      $allValue+=${"cena$x"}*${"ilosc$x"};   
 }
 

$sqlInsert= "INSERT INTO new_order(nameC, streetC, buildingC, localC, postCodeC, cityC, nipC, countryC, datetimeO, describeO, name1, cena1,  ilosc1, vat1, name2, cena2, ilosc2, vat2, name3, cena3, 
 ilosc3, vat3, name4, cena4, ilosc4, vat4, name5, cena5, ilosc5,  vat5, name6, cena6, ilosc6, vat6, name7, cena7, ilosc7, vat7, active,allValue) 
VALUES ('$nameC','$streetC','$buildingC','$localC','$postCodeC','$cityC','$nipC','$countryC','$datetimeO','$describeO','$name1','$cena','$ilosc1','$Vat1','$name2','$cena2','$ilosc2','$Vat2','$name3','$cena3','$ilosc3','$Vat3',
'$name4','$cena4','$ilosc4','$Vat4','$name5','$cena5','$ilosc5','$Vat5','$name6','$cena6','$ilosc6','$Vat6','$name7','$cena7','$ilosc7','$Vat7','1','$allValue');";

mysqli_query($conn, $sqlInsert);

header("Location: ../index.php?signup=success");
exit;
}
else{
    header("Location: ../index.php?signup=wrong");
    exit;
}
