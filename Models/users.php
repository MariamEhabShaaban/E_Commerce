<?php

namespace Models;

class Users
{
    private $db;
    private $errors = [];

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function get_user($email, $password)
    {
        $user = $this->db->query('SELECT * FROM users WHERE email=? ', [$email])->find();
        if ($user) {
            $pass = password_verify($password, $user['password']);
            if ($pass)
                return $user;
            else {
                $this->errors['password'] = 'Incorrect Password';
                return false;
            }
        }
        $this->errors['email'] = 'This email is not found';
        return false;
    }

    public function unique($email)
    {
        $user = $this->db->query('SELECT * FROM users WHERE email=? ', [$email])->find();

        return $user ? false : true;
    }

    public function add_user($email, $password)
    {
        //hashing password
        $password = password_hash($password, PASSWORD_DEFAULT);
        $user = $this->db->query('INSERT INTO users (email,password,role) VALUES(?,?,?)', [$email, $password, 'user']);
        return $user ? true : false;

    }


    public function error()
    {
        return $this->errors;
    }
}