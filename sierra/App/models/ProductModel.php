<?php

class ProductModel {
    private $db;

    public function __construct() {
        $this->db = new Database(); 
    }

    public function addProduct($product_name, $product_category, $product_price, $product_stock, $product_description, $size, $color, $folder) {
        
        $query = "INSERT INTO products (product_name, product_category, product_price, product_stock, product_description, size, color, product_image_1) 
                  VALUES (:product_name, :product_category, :product_price, :product_stock, :product_description, :size, :color, :folder)";
        $this->db->query($query);

        
        $this->db->bind(':product_name', $product_name);
        $this->db->bind(':product_category', $product_category);
        $this->db->bind(':product_price', $product_price);
        $this->db->bind(':product_stock', $product_stock);
        $this->db->bind(':product_description', $product_description);
        $this->db->bind(':size', $size);
        $this->db->bind(':color', $color);
        $this->db->bind(':folder', $folder);

        $this->db->execute();
    }



    public function getProducts() {
        $this->db->query("SELECT id, product_name, product_category, product_price, product_stock, product_description, size, color, product_image_1 FROM products");
        $result = $this->db->resultSet();
        return $result;  
    }

    public function deleteProductById($id)
    {
        $this->db->query("DELETE FROM products WHERE id = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();   
    }



    public function updateProductById($id, $product_name, $product_category, $product_price, $product_stock, $product_description, $size, $color, $folder) {
        $query = "UPDATE products SET product_name = :product_name, product_category = :product_category, product_price = :product_price , product_stock = :product_stock, product_description = :product_description, size = :size, color = :color, product_image_1 = :folder WHERE id = :id";
        $this->db->query($query);
    
        // Bind parameters
        $this->db->bind(':id', $id);
        $this->db->bind(':product_name', $product_name);
        $this->db->bind(':product_category', $product_category);
        $this->db->bind(':product_price', $product_price);
        $this->db->bind(':product_stock', $product_stock);
        $this->db->bind(':product_description', $product_description);
        $this->db->bind(':size', $size);
        $this->db->bind(':color', $color);
        $this->db->bind(':folder', $folder);
    
        // Execute the query
        $this->db->execute();
    }

    public function updateProductdetails($id) {
        $this->db->query("SELECT * FROM products WHERE id = :id");
        $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;
    }
    
    public function getMenProducts() {
        $this->db->query("SELECT id, product_name, product_category, product_price, product_stock, product_description, size, color, product_image_1 FROM products WHERE product_category ='Men'");
        $result = $this->db->resultSet();
        return $result;
    }

    public function getWomenProducts() {
        $this->db->query("SELECT id, product_name, product_category, product_price, product_stock, product_description, size, color, product_image_1 FROM products WHERE product_category ='Women'");
        $result = $this->db->resultSet();
        return $result;
    }

    public function getProductById($id)
{
    $this->db->query("SELECT * FROM products WHERE id = :id");
    $this->db->bind(':id', $id);
    $product = $this->db->single();
    return $product;
}



    

}
