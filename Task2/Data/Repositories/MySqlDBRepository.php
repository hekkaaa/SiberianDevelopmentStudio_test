<?php
class MySqlDBRepository{

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
        Teacher VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci, DayOfWeek VARCHAR(40), Year INTEGER(4), 
        Semester VARCHAR(12), StartTime VARCHAR(8), EndTime VARCHAR(8), Duration VARCHAR(8));";

    
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
        finally
        {
            // $this->conn->close();
        }
    }

    function AddValues($Item){
       
        $stringValue = '';
        foreach($Item as $string){
          
            $stringValue = $stringValue . '\'' . $string . '\'' . ',';
        }
        echo "<br>";
        echo "+++++";
        echo "<br>";
        $stringValue = trim($stringValue,',');
        echo  $stringValue;
        echo "------";
        echo "<br>";
     

        $sql = "INSERT INTO ListLessons (id, CourseCode, CourseName, 
        Teacher, DayOfWeek, Year, 
        Semester, StartTime, EndTime, Duration) VALUES ('2', {$stringValue})";
            if($this->conn->query($sql)){
                echo "Данные успешно добавлены";
            } else{
                echo "Ошибка: " . $this->conn->error;
            }
            // $this->conn->close();
    }
}

?>