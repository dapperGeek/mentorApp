<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mentor
 *
 * @author DapperGeek0
 */
class Mentor {
    protected $name;
    protected $username;
    protected $password;

    public function __construct(string $name, string $username, string $password) 
    {
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setName(string $name)
    {
       $this->name = $name;
    }
    
    public function getUsername()
    {
        return $this->username;
    }
    
    public function setUsername(string $username)
    {
       $this->username = $username;
    }
    
    public function getPassword()
    {
        return $this->password;
    }
    
    public function setPassword(string $password)
    {
       $this->password = $password;
    }
}
