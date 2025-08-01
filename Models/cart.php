<?php

namespace Models;



class Cart
{
    private $db;


    public function __construct($db)
    {

        $this->db = $db;


    }


    public function addTo_cart($name, $price,$user_id)
    {
        // Check if the product already exists in the cart
        $item = $this->get_productFromCart($name,$user_id);


        if ($item) {
            // Update the quantity 
            $newQuantity = $item['quantity'] + 1;
            $this->db->query('UPDATE cart SET quantity = ? WHERE product = ? AND user_id=?', [$newQuantity, $name,$user_id]);
            return $item['id']; 
        } else {
            // Insert new item
            $this->db->query('INSERT INTO cart (product, price, quantity,user_id) VALUES (?, ?, ?,?)', [$name, $price, 1,$user_id]);
            return $this->db->lastInsertId() ?? false;
        }
    }

    public function decreaseQuantity($name,$user_id)
    {

        $item = $this->db->query('SELECT quantity FROM cart WHERE product = ? AND user_id=?', [$name,$user_id])->find();


        if ($item) {
            if ($item['quantity'] > 1) {

                $newQuantity = $item['quantity'] - 1;
                $this->db->query('UPDATE cart SET quantity = ? WHERE product = ?  AND user_id=?', [$newQuantity, $name,$user_id]);
            } else {

                $this->db->query('DELETE FROM cart WHERE product = ? AND user_id=?', [$name,$user_id]);
            }
        }
    }


    public function clearCart($user_id)
    {
        return $this->db->query('DELETE FROM cart WHERE user_id=?',[$user_id]);
    }

    public function get_productFromCart($name,$user_id)
    {
        return $this->db->query('SELECT quantity FROM cart WHERE product = ? AND user_id=?', [$name,$user_id])->find();
    }


    public function get_cart($user_id)
    {
        return $this->db->query('SELECT *,(price * quantity) AS total FROM cart WHERE user_id=?',[$user_id])->getAll();
    }

    public function total($user_id){
        $res= $this->db->query('SELECT SUM(price * quantity) AS total FROM cart WHERE user_id=?',[$user_id])->find();
        return $res['total'] ?? 0;
    }



}