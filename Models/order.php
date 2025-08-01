<?php

namespace Models;

class Order{
    private $db;


    public function __construct($db)
    {

        $this->db = $db;


    }

    public function add_order($user_id,$cost){
          $add= $this->db->query('INSERT INTO orders (`user_id`,`date`,`cost`) VALUES (?,?,?)',[$user_id,date('Y-m-d'),$cost]);

          return $add;
    }


    public function get_orders($user_id){

        $orders = $this->db->query('SELECT * FROM orders WHERE user_id = ?',[$user_id])->getAll();

        return $orders;


    }




}