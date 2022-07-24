<!DOCTYPE html>
<html>
<head>
<title>Task1</title>
<meta charset="utf-8" />
</head>
<body>

<?php

use Shuchkin\SimpleXLSX;

    require_once 'Data/Connect/AppContext.php';
    require_once 'Data/Repositories/MySqlDBRepository.php';
    // require_once 'vendors/SimpleXLSX.php';
    require_once 'ParseExcel.php';

    const fileExcel = 'Book.xlsx';
    const fileExcelTest = 'test2.xlsx';

    // $excel1 = new SimpleXLSX();
    // $xls1 = $excel1::parseFile(fileExcel);
    // $list1 = $xls1->rows(0);

    // echo $list1[2];
    echo "<br>";
    echo "Test";
    echo "<br>";

    $connectDb = new AppContext();
    $DbRepository = new MySqlDBRepository($connectDb->appConnect);
    $DbRepository->CreateNewTable();
    $objExcelParse = new ParseExcel();
    $test = $objExcelParse->ParseOneList();

    for($i = 0; $i < count($test); $i++){
        $DbRepository->AddValues($test[$i]);

        // foreach($test[$i] as $item){
        //     echo $item;
        //     echo "<br>";
        //     echo "-----";
        //     echo "<br>";
        // }
    }
   



    // $excel = new SimpleXLSX();

    // if ( $xls = $excel::parseFile(fileExcel) ) {
        
    //     $list = $xls->rows(0);

    //     $startRow = 2;

    //     for($startRow; $startRow < count($xls->rows(0)); $startRow++ ){
    //         $startColumn = 1;
    //         $addCollectionDb = [];

    //         for($startColumn; $startColumn < count($list[1])-1; $startColumn++){

    //         if($startColumn == 7 || $startColumn == 8 || $startColumn == 9){
    //             $newData = date("H:i:s", strtotime($list[$startRow][$startColumn]));
    //             $list[$startRow][$startColumn] =  $newData;
    //         }   
    //             $addCollectionDb[] = $list[$startRow][$startColumn];
    //             echo $list[$startRow][$startColumn];
    //             echo " - ";

    //         }
    //         echo "<br/>";
    //         echo var_dump($addCollectionDb);
    //         echo "<br/>";
    // }
    // } else {
    //     echo $excel::parseError();
    // }


    // $connectDb = new AppContext();
    // $DbRepository = new  MySqlDBRepository($connectDb->appConnect);
    
    // $resCreateTable = $DbRepository->CreateNewTable();
    // if($resCreateTable){
    //     echo "Create Table!";
    // }
    // else{
    //     echo "Sorry Create Table is False";
    // }

    echo "<br>";
    echo "Footer";
    echo "<br>";

 
?>

</body>
</html>