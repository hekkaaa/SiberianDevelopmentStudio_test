<!DOCTYPE html>
<html>
<head>
<title>Task1</title>
<meta charset="utf-8" />
</head>
<body>

<?php
    require_once 'Data/Connect/AppContext.php';
    require_once 'Data/Repositories/MySqlDBRepository.php';

    echo "Test";
    echo "<br>";

    $connectDb = new AppContext();
    $DbRepository = new  MySqlDBRepository($connectDb->appConnect);
    
    $resCreateTable = $DbRepository->CreateNewTable();
    if($resCreateTable){
        echo "Create Table!";
    }
    else{
        echo "Sorry Create Table is False";
    }

    echo "<br>";
    echo "Footer";
    echo "<br>";
 
?>

</body>
</html>