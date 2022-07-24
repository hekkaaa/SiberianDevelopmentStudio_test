<?php
class ListOfLessonRepository{

    public $conn;

    function __construct($conn) 
    {
        $this->conn = $conn;
    }

/**
 * Create Table
 *
 * @return bool;
 */
    function CreateNewTable() : bool
    {
        $sql = "CREATE TABLE ListLessons (id INTEGER AUTO_INCREMENT PRIMARY KEY, CourseCode VARCHAR(30), CourseName VARCHAR(130), 
        Teacher VARCHAR(50), DayOfWeek VARCHAR(40), Year INTEGER(4), 
        Semester VARCHAR(12), StartTime VARCHAR(8), EndTime VARCHAR(8), Duration VARCHAR(8)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin";
    
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
            return false;
        }
        catch(Throwable $ex)
        {   
            return false;
        }
    }

    function AddValues($id, $Item)
    {
       
        $stringValue = '';
        foreach($Item as $string)
        {
          
            $stringValue = $stringValue . '\'' . $string . '\'' . ',';
        }
        $stringValue = trim($stringValue,',');

        $sql = "INSERT INTO ListLessons (id, CourseCode, CourseName, 
        Teacher, DayOfWeek, Year, 
        Semester, StartTime, EndTime, Duration) VALUES ($id+1, {$stringValue})";

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

    function SelectItem(){
        $sql = "SELECT * FROM ListLessons";
        $result = $this->conn->query($sql);
        return $result;
    }
}

?>