<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Assignment
 *
 * @author DapperGeek0
 */
class Assignment {
    protected $mentorID;
    protected $menteeID;
    
    public function __construct(int $mentorID, int $menteeID)
    {
        $this->mentorID = $mentorID;
        $this->menteeID = $menteeID;
    }

    public function getMentorID()
    {
        return $this->mentorID;
    }

    public function getMenteeID()
    {
        return $this->menteeID;
    }
}
