<?php

namespace Models;

class Product
{

    private $db;
    public function __construct($db)
    {

        $this->db = $db;
    }

    //add car

    public function add_product($name, $price)
    {



        $this->db->query('INSERT INTO products (`name`,`price`) VALUES (?,?)', [$name, $price]);

        return $this->db->lastInsertId() ?? false;

    }


    public function store_image($ext, $id)
    {

        $store = $this->db->query('UPDATE products SET image =? WHERE id= ?', [$ext, $id]);
        return $store ? true : false;


    }

    public function get_all_products()
    {
        $products = $this->db->query('SELECT * FROM products')->getAll();
        return $products;
    }

    public function get_product($id)
    {
        $product = $this->db->query('SELECT * FROM products WHERE id=?', [$id])->find();
        return $product;
    }

    public function delete_product($id)
    {


        $delete = $this->db->query('DELETE FROM products WHERE id=?', [$id]);
        return $delete ? true : false;

    }



    //update


    public function update_product($name, $price, $id)
    {



        $update = $this->db->query('UPDATE products SET name = ?, price = ? WHERE id = ?
', [$name, $price, $id]);
        return $update ? true : false;

    }



}