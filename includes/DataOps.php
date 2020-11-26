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
        $result = [];
        $result['success'] = false;

        $password = password_hash($password, PASSWORD_BCRYPT);

        $table = $level == 1 ? 'mentors' : 'mentees';

        $sql = "INSERT into `$table` (`name`, `username`, `password`) VALUES ('$name','$username','$password')";
        $handle = $this->db->query($sql);

        if (isset($handle))
        {
        // Get the newly registered user
            $lastID = $this->db->insert_id;
            $getSql = "SELECT * from $table where id = $lastID";
            $selectUser = $this->db->query($getSql);

            $row = $selectUser->fetch_assoc();

            $result['id'] = $lastID;
            $result['name'] = $name;
            $result['username'] = $username;
            $result['auth'] =  0;
            $result['success'] = true;
            $result['message'] = 'Registration OK';
        }
        else
        {
            $result['message'] = 'Registration Error, please retry';
        }

        return $result;
    }

    /**
     * @param int $level
     * @param string $username
     * @param string $password
     * @return array
     * User login database implementation
     */
    public function loginUser(int $level, string $username, string $password)
    {
        $result = [];
        $result['success'] = false;
        $table = $level == 1 ? 'mentors' : 'mentees';

        $getUser = "SELECT * FROM `$table` WHERE `username` = '$username'";
        $handle = $this->db->query($getUser);

        // if username exists in database
        if ($handle->num_rows > 0)
        {
            $row = $handle->fetch_assoc();

            // verify password, if password matches
            if (password_verify($password, $row['password']))
            {
                $result['id'] = $row['id'];
                $result['name'] = $row['name'];
                $result['username'] = $row['username'];
                $result['auth'] = $level == 1 ? $row['auth'] : 0;
                $result['success'] = true;
                $result['message'] = 'Login OK';
            }
            else{// if there's password mismatch
                $result['message'] = 'Password incorrect';
            }
        }
        else{ // if user doesn't exist in records
            $result['message'] = 'User not found';
        }

        return $result;
    }

    /**
     * @return array
     * Retrieve all records from mentees table
     */
    public function getAllMentees()
    {
        $data = [];
        $getSql = "SELECT * FROM `mentees`";
        $handle = $this->db->query($getSql);
        while ($row = $handle->fetch_assoc())
        {
            $data[] = $row;
        }

        return $data;
    }

    public function GetMyMentors(int $id)
    {
        $data = [];

        $getSql = "SELECT asg.*, me.name as `mentorName` 
        from assignment asg 
        left join mentors me on asg.mentorID = me.id 
        where asg.menteeID = $id";

        $handle = $this->db->query($getSql);
        while ($row = $handle->fetch_assoc())
        {
            $data[] = $row;
        }
        return $data;
    }

    public function getMyMentees(int $id)
    {
        $data = [];

        $getSql = "SELECT asg.*, me.name as `menteeName` 
        from assignments asg 
        left join mentees me on asg.menteeID = me.id 
        where asg.mentorID = $id";

        $handle = $this->db->query($getSql);
        while ($row = $handle->fetch_assoc())
        {
            $data[] = $row;
        }
        return $data;
    }

    /**
     * @param int $id
     * @return array
     * Retrieve all mentors assigned to a mentee
     */
    public function getAssignedMentors(int $id)
    {
        $data = [];
        $getSql = "SELECT asg.*, me.name as `mentorName` 
         from assignments asg 
         left join mentors me on asg.mentorID = me.id 
         where asg.menteeID = $id";
        $handle = $this->db->query($getSql);
        while ($row = $handle->fetch_assoc())
        {
            $data[] = $row;
        }
        return $data;
    }

    public function getMentee(int $id)
    {
        $getSql = "SELECT * FROM `mentees` where id = $id";
        $handle = $this->db->query($getSql);
        return $handle->fetch_assoc();
    }

    /**
     * @param int $id
     * @return array
     * Retrieve all non assigned mentors for a mentee
     */
    public function getUnassignedMentors(int $id)
    {
        $data = [];

        $getSql = "SELECT * FROM `mentors` where `id` NOT IN (SELECT `mentorID` from `assignments` where `menteeID` = $id)";
        $handle = $this->db->query($getSql);
        while ($row = $handle->fetch_assoc())
        {
            $data[] = $row;
        }
        return $data;

    }

    public function assignMentor(Assignment $assignment)
    {
        $data = [];

        $insertSql = "INSERT INTO `assignments` (`mentorID`, `menteeID`) VALUES (" . $assignment->getMentorID() . "," . $assignment->getMenteeID() . ")";
//        $handle = $this->db->query($insertSql);

        if ($this->db->query($insertSql))
        {
            $data['success'] = true;
        }
        else
        {
            $data['result'] = false;
        }

        return $data;
    }
}