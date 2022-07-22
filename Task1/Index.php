<!DOCTYPE html>
<html>
<head>
<title>Task1</title>
<meta charset="utf-8" />
</head>
<body>

<?php

    $mass = [["1", "2", "3"],["4", "5", "6"],["7", "8", "9"],["10", "11", "12"]];
    $newmass = [];

    for($i = 0; $i < count($mass[0]); $i++){

        for($j = 0; $j < count($mass); $j++){
            $newmass[$i][$j] = $mass[$j][$i] . " ";
        }
    }

    echo "Result";
    echo "<br>";

    for($s = 0; $s < count($newmass); $s++){
        for($q = 0; $q < count($newmass[$s]); $q++){
            echo $newmass[$s][$q];
        }
        echo "<br>";
    }
?>

</body>
</html>