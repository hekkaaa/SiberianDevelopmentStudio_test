<?php
class SemesterCalendarRepository
{
    
public $conn;

function __construct($conn) 
{
    $this->conn = $conn;
}

function CreateNewTable() : bool
    {
        $sql = "CREATE TABLE SemesterCalendar (id INTEGER AUTO_INCREMENT PRIMARY KEY, Dayd VARCHAR(130), StartTime VARCHAR(130), 
        CourseName VARCHAR(100)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin";
    
        try
        {
            if($this->conn->query($sql))
            {   
                return true;
            } 
            else
            {   
                return false;
            }
        }
        catch(mysqli_sql_exception $ex)
        {   
            echo $ex;
            return false;
        }
        catch(Throwable $ex)
        {   
            echo $ex;
            return false;
        }
    }

    function AddValues($id, $Item)
    {
        $stringValue = '';
        foreach($Item as $string){
          
            $stringValue = $stringValue . '\'' . $string . '\'' . ',';
        }
        $stringValue = trim($stringValue,',');

        $sql = "INSERT INTO SemesterCalendar (id, Dayd, StartTime, CourseName) VALUES ($id+1, {$stringValue})";

        try
        {
            if($this->conn->query($sql))
            {
                echo "Данные успешно добавлены";
                echo "<br>";
            } 
            else
            {
                echo "Ошибка: " . $this->conn->error;
            }
        }
        catch(mysqli_sql_exception)
        {   
            $id = $id + 1;
            echo "Данные в Id {$id} уже присуствуют";
            echo "<br>";
        }
    }
}
?>