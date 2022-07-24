<?php
class DeadlinesRepository{

public $conn;

function __construct($conn) 
{
    $this->conn = $conn;
}

function CreateNewTable() : bool
    {
        $sql = "CREATE TABLE Deadlines (id INTEGER AUTO_INCREMENT PRIMARY KEY, CourseCode VARCHAR(30), CourseName VARCHAR(130), 
        Year INTEGER(4), Semester VARCHAR(12),
        ItemDescription VARCHAR(40), Deadline VARCHAR(10)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin";
    
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

        $sql = "INSERT INTO Deadlines (id, CourseCode, CourseName, 
        Year, Semester,
        ItemDescription, Deadline) VALUES ($id+1, {$stringValue})";

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