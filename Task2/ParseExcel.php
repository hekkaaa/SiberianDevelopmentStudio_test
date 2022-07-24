<?php

use Shuchkin\SimpleXLSX;

class ParseExcel
{

    function ParseOneList(){

        require 'vendors/SimpleXLSX.php';
        // require 'Data/Repositories/MySqlDBRepository.php';

        $excel = new SimpleXLSX();
        $globalArray = [];

        if ( $xls = $excel::parseFile(fileExcel) ) {
            
            $list = $xls->rows(0);
    
            $startRow = 2;
            
    
            for($startRow; $startRow < count($xls->rows(0)); $startRow++ ){
                $startColumn = 1;
                $addCollectionDb = [];
    
                for($startColumn; $startColumn < count($list[1])-1; $startColumn++){
    
                if($startColumn == 7 || $startColumn == 8 || $startColumn == 9){
                    $newData = date("H:i:s", strtotime($list[$startRow][$startColumn]));
                    $list[$startRow][$startColumn] =  $newData;
                }   
                    $addCollectionDb[] = $list[$startRow][$startColumn];
                    // echo $list[$startRow][$startColumn];
                    // echo " - ";
    
                }
                
                $globalArray[] = $addCollectionDb;
                // echo "<br/>";
                // echo var_dump($addCollectionDb);
                // echo "<br/>";
            }

            return $globalArray;
        } 
        else {
            echo $excel::parseError();
        }

    }

}
?>