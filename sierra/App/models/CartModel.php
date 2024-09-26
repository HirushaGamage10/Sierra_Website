<?php

class CartModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function addProductToCart($user_id, $product_id, $product_name, $product_price, $size, $color, $quantity) {
        $query = "INSERT INTO cart (user_id, product_id, product_name, product_price, size, color, quantity) 
                  VALUES (:user_id, :product_id, :product_name, :product_price, :size, :color, :quantity)";
        $this->db->query($query);

        
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':product_id', $product_id);
        $this->db->bind(':product_name', $product_name);
        $this->db->bind(':product_price', $product_price);
        $this->db->bind(':size', $size);
        $this->db->bind(':color', $color);
        $this->db->bind(':quantity', $quantity);

        
        $this->db->execute();
    }
}
