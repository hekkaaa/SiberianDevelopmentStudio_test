<?php
class AppContext{
     
    public $appConnect;

    function __construct()
    {
        $this->appConnect = new mysqli("localhost", "root", "qwertyqwerty", "Test1", 3307);
        if($this->appConnect->connect_error){
            die("Ошибка: " . $this->appConnect->connect_error);
        }
        echo "<br>";
        echo "Подключение успешно установлено";
        echo "<br>";
    }
}

?>