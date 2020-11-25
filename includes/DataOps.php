<?php


class DataOps
{
    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    public function getException($errorMessage)
    {
        //$_SERVER['REMOTE_ADDR'],date("d-m-Y h:i:s A"),time()
        return $this->showMsg("Error!", "A system error has occured, we will fix it<br/>" . $errorMessage, 1);
    }

    public function redirect_to($host){
        header("location:".$host);
    }

    public function registerUser(int $level, string $name, string $username, string $password)
    {
        $success = false;
        $password = password_hash($password, PASSWORD_BCRYPT);
        $table = $level == 1 ? 'mentors' : 'mentees';
        $sql = "INSERT into `$table` (`name`, `username`, `password`) VALUES ('$name','$username','$password')";
        $handle = $this->db->prepare($sql);
        if ($handle->execute())
        {
            $success = true;
        }
        return $success;
    }
}