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
        $sql = "CREATE TABLE Users (id INTEGER AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30), age INTEGER);";

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
            $this->conn->close();
        }
       

        
        
    }
}

?>