
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>latihan1</title>
</head>
<body>
<table border="1"cellpadding="10" cellspacing"0">
    <?php
    for($i=1;$i<=3;$i++){
        echo "<tr>";
        for($j=1;$j<=5;$j++){
            echo "<td>$i,$j<td>";
        }
    }
    ?>


</table>    
</body>
</html>
<?php
//pengulangan
//for,while,do..while,foreach
for($i=0;$i<5;$i++){
    echo "hello world<br>";
}
$i=0;
while ($i<5){
     echo "hello";
     $i++;
}


?>
