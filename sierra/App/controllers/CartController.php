<?php

class CartController extends Controller
{
    public function addToCart() {
 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $product_id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $size = $_POST['size'];
            $color = $_POST['color'];
            $quantity = $_POST['quantity'];
            

            
            $cartModel = $this->model('CartModel');

            
            $cartModel->addProductToCart(null, $product_id, $product_name, $product_price, $size, $color, $quantity);
    
           
            header("Location: " . BASE_URL . "/ProductPage?id=" . $product_id);
            exit();
        }
    }
}
?>