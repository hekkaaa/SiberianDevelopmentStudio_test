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
    require_once 'Data/Repositories/ListOfLessonRepository.php';
    require_once 'Data/Repositories/DeadlinesRepository.php'; 
    require_once 'Data/Repositories/WeeklyScheduleRepository.php'; 
    require_once 'Data/Repositories/SemesterCalendarRepository.php';
    require_once 'ParseExcel.php';

    const fileExcel = 'Book.xlsx';
    const fileExcelTest = 'test2.xlsx';

    echo "<br>";
    echo "Test";
    echo "<br>";

    $connectDb = new AppContext();
    $objExcelParse = new ParseExcel();

    // $DbRepository = new ListOfLessonRepository($connectDb->appConnect);
    // $resCreate = $DbRepository->CreateNewTable();
    // if($resCreate)
    // {
    //     $ListofLessonParseArray = $objExcelParse->ParseOneList();
    
    //     for($i = 0; $i < count($ListofLessonParseArray); $i++)
    //     {
    //         $DbRepository->AddValues($i, $ListofLessonParseArray[$i]);
    //     }
    // }
    // else
    // {   
    //     echo "<br>";
    //     echo "Создать ListOfLesson таблицу не удалось.";
    // }
    
    // *********

    // $DbRepository = new DeadlinesRepository($connectDb->appConnect);
    // $resCreate = $DbRepository->CreateNewTable();

    // if($resCreate)
    // {
    //     $DeadlinesParseArray = $objExcelParse->ParseTwoList();
    
    //     for($i = 0; $i < count($DeadlinesParseArray); $i++)
    //     {
    //         $DbRepository->AddValues($i, $DeadlinesParseArray[$i]);
    //     }
    // }
    // else
    // {   
    //     echo "<br>";
    //     echo "Создать Deadlines таблицу не удалось.";
    // }

    // *********

    // $DbRepository = new WeeklyScheduleRepository($connectDb->appConnect);
    // $resCreate = $DbRepository->CreateNewTable();

    // if($resCreate)
    // {
    //     $WeeklyScheduleParseArray = $objExcelParse->ParseThirdList();
    
    //     for($i = 0; $i < count($WeeklyScheduleParseArray); $i++)
    //     {   
    //        $DbRepository->AddValues($i, $WeeklyScheduleParseArray[$i]);
    //     }

    // }
    // else
    // {   
    //     echo "<br>";
    //     echo "Создать WeeklySchedule таблицу не удалось.";
    // }


    // *********
    $DbRepository = new SemesterCalendarRepository($connectDb->appConnect);
    // $resCreate = $DbRepository->CreateNewTable();
    $SemesterCalendarParseArray = $objExcelParse->ParseFourList();
    echo var_dump($SemesterCalendarParseArray);

    // if($resCreate)
    // {
    //     $SemesterCalendarParseArray = $objExcelParse->ParseThirdList();
    
    //     for($i = 0; $i < count($SemesterCalendarParseArray); $i++)
    //     {   
            
    //        $DbRepository->AddValues($i, $SemesterCalendarParseArray[$i]);
    //     }
    // }
    // else
    // {   
    //     echo "<br>";
    //     echo "Создать WeeklySchedule таблицу не удалось.";
    // }


   
    //
    // $sssss = $DbRepository->SelectItem();
    // foreach($sssss as $row){
    //      echo var_dump($row);
    //     // $userid = $row["id"];
    //     // $username = $row["name"];
    //     // $userage = $row["age"];
    // }

    echo "<br>";
    echo "Footer";
    echo "<br>";
?>

</body>
</html>