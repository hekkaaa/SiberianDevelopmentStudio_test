<?php

use Shuchkin\SimpleXLSX;

class ParseExcel
{

    function ParseOneList(){

        require_once 'vendors/SimpleXLSX.php';

        $excel = new SimpleXLSX();
        $globalArray = [];
        $numberEmptyColumnsWithEndRow = 1;
        $page = 0;

        if ( $xls = $excel::parseFile(fileExcel) ) {
           
            $list = $xls->rows($page);
    
            $startRow = 2;
    
            for($startRow; $startRow < count($xls->rows($page)); $startRow++ ){
                $startColumn = 1;
                $addCollectionDb = [];
    
                for($startColumn; $startColumn < count($list[1])-$numberEmptyColumnsWithEndRow; $startColumn++){
    
                if($startColumn == 7 || $startColumn == 8 || $startColumn == 9){
                    $newData = date("H:i:s", strtotime($list[$startRow][$startColumn]));
                    $list[$startRow][$startColumn] =  $newData;
                }   
                    $addCollectionDb[] = $list[$startRow][$startColumn];
                }
                
                $globalArray[] = $addCollectionDb;
            }

            return $globalArray;
        } 
        else {
            echo $excel::parseError();
        }

    }

    function ParseTwoList(){

        require_once 'vendors/SimpleXLSX.php';

        $excel = new SimpleXLSX();
        $globalArray = [];
        $page = 1;
        $numberEmptyColumnsWithEndRow = 4;

        if ( $xls = $excel::parseFile(fileExcel) ) {
            
            $list = $xls->rows($page);
           
            $startRow = 2;
    
            for($startRow; $startRow < count($xls->rows($page)); $startRow++ ){
                $startColumn = 1;
                $addCollectionDb = [];
    
                for($startColumn; $startColumn < count($list[1])-$numberEmptyColumnsWithEndRow; $startColumn++){
    
                if($startColumn == 6){
                    $newData = date("d.m.Y", strtotime($list[$startRow][$startColumn]));
                    $list[$startRow][$startColumn] =  $newData;
                }   
                    $addCollectionDb[] = $list[$startRow][$startColumn];
                }
                
                $globalArray[] = $addCollectionDb;
            }

            return $globalArray;
        } 
        else {
            echo $excel::parseError();
        }
    }

    function ParseThirdList(){

        require_once 'vendors/SimpleXLSX.php';

        $excel = new SimpleXLSX();
        $globalArray = [];
        $page = 2;
        $numberEmptyColumnsWithEndRow = 2;
        $startRow = 3;

        if ( $xls = $excel::parseFile(fileExcel) ) {
            
            $list = $xls->rows($page);
    
            for($startRow; $startRow < count($xls->rows($page)); $startRow++ ){
                $startColumn = 1;
                $addCollectionDb = [];
    
                for($startColumn; $startColumn < count($list[1])-$numberEmptyColumnsWithEndRow; $startColumn++){
    
                if($startColumn == 2){
                    $newData = date("H:i:s", strtotime($list[$startRow][$startColumn]));
                    $list[$startRow][$startColumn] =  $newData;
                }   
                    $addCollectionDb[] = $list[$startRow][$startColumn];
                }
                
                $globalArray[] = $addCollectionDb;
            }

            return $globalArray;
        } 
        else {
            echo $excel::parseError();
        }
    }

    function ParseFourList(){

        require_once 'vendors/SimpleXLSX.php';

        $excel = new SimpleXLSX();
        $globalArray = [];
        $page = 3;
        $numberEmptyColumnsWithEndRow = 6;
        $startRow = 21;

        $xls = $excel::parseFile(fileExcel);
        $list = $xls->rows($page);
        return $list;
        
        // if ( $xls = $excel::parseFile(fileExcel) ) {
            
        //     $list = $xls->rows($page);
    
        //     for($startRow; $startRow < count($xls->rows($page)); $startRow++ ){
        //         $startColumn = 1;
        //         $addCollectionDb = [];
    
        //         for($startColumn; $startColumn < count($list[1])-$numberEmptyColumnsWithEndRow; $startColumn++){
    
        //         if($startColumn == 9){
        //             $newData = date("H:i:s", strtotime($list[$startRow][$startColumn]));
        //             $list[$startRow][$startColumn] =  $newData;
        //         }   
        //             $addCollectionDb[] = $list[$startRow][$startColumn];
        //         }
                
        //         $globalArray[] = $addCollectionDb;
        //     }

        //     return $globalArray;
        // } 
        // else 
        // {
        //     echo $excel::parseError();
        // }
    }
}
?>