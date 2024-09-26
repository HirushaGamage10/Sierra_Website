<?php

class ProductController extends Controller {

    public function addProduct() {
        if (isset($_POST['submit'])) {

            $product_name = $_POST['product_name'];
            $product_category = $_POST['product_category'];
            $product_price = $_POST['product_price'];
            $product_stock = $_POST['product_stock'];
            $product_description = $_POST['product_description'];
            $size = implode(',', $_POST['size']);
            $color = implode(',', $_POST['color']);

            $filename = $_FILES["product_image_1"]["name"];
            $file_tmp = $_FILES["product_image_1"]["tmp_name"];
            $upload_dir = "uploads/";
            $folder = $upload_dir . $filename;

            
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

          
            if (copy($file_tmp, $folder)) {  
                $display_message = "File uploaded successfully!";
                $product = $this->model('ProductModel');
                $product->addProduct($product_name, $product_category, $product_price, $product_stock, $product_description, $size, $color, $folder); 
                header("Location: " . BASE_URL . "/addproduct");
                exit;  
            } else {
                $display_message = "File upload failed!";
            }
        }
    }

    public function showProducts() {
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
    
        if (!isset($_SESSION['role'])) {
            header("Location: " . BASE_URL . "/home");
            exit();
        }
    
        
        if ($_SESSION['role'] == 'admin') {
            $_SESSION['page_title'] = "Add Product";
            $product = $this->model('ProductModel'); 
            $products = $product->getProducts();    
            $data['products'] = $products;
            $this->view('Admin/ViewProduct', $data);

        } else {
            header("Location: " . BASE_URL . "/home");
            exit();
        }
    }



    public function deleteProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];

            $product = $this->model('ProductModel');
            $product->deleteProductById($id);

            header("Location: " . BASE_URL . "/viewproduct");
            exit();
        }
        }
    }


    public function updateProduct() {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $product_name = $_POST['product_name'];
            $product_category = $_POST['product_category'];
            $product_price = $_POST['product_price'];
            $product_stock = $_POST['product_stock'];
            $product_description = $_POST['product_description'];
            $size = implode(',', $_POST['size']);
            $color = implode(',', $_POST['color']);

            $filename = $_FILES["product_image_1"]["name"];
            $file_tmp = $_FILES["product_image_1"]["tmp_name"];
            $upload_dir = "uploads/";
            $folder = $upload_dir . $filename;

            
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
    
            if (copy($file_tmp, $folder)){
            $product = $this->model('ProductModel');
            $product->updateProductById($id, $product_name, $product_category, $product_price, $product_stock, $product_description, $size, $color, $folder);
            header("Location: " . BASE_URL . "/viewproduct");
            exit();
            }
        }
    }
        
    public function showMenProducts() {
        $product = $this->model('ProductModel');
        $products = $product->getMenProducts();
        $data['products'] = $products;
        $data['page_title'] = "Men";
        $this->view('MenView', $data);
    }


    public function showWomenProducts() {
        $product = $this->model('ProductModel');
        $products = $product->getWomenProducts();
        $data['products'] = $products;
        $data['page_title'] = "Women";
        $this->view('WomenView', $data);
    }


    public function ProductPage()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $productModel = $this->model('ProductModel');
        $product = $productModel->getProductById($id);
        
        if ($product) {
            $product->sizes = explode(',', $product->size);   
            $product->colors = explode(',', $product->color);
            $data['product'] = $product;
            $this->view('ProductPage', $data);
        } else {
            
            header("Location: " . BASE_URL . "/home");
            exit();
        }
    } else {
        header("Location: " . BASE_URL . "/home");
        exit();
    }
}





   
}
    
    

