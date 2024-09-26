<?php

$routes = [
    '' => ['controller' => 'home', 'method' => 'index'],

    //login and signup routes
    'home' => ['controller' => 'home', 'method' => 'index'],
    'Contact' => ['controller' => 'home', 'method' => 'ContactUs'],
    'signup' => ['controller' => 'SignupController', 'method' => 'index'],
    'register' => ['controller' => 'SignupController', 'method' => 'register'],
    'login' => ['controller' => 'LoginController', 'method' => 'index'],
    'log' => ['controller' => 'LoginController', 'method' => 'login'],
    'logout' => ['controller' => 'LoginController', 'method' => 'logout'],

    //admin routes
    'dashboard' => ['controller' => 'Admin', 'method' => 'index'],
    'addproduct' => ['controller' => 'Admin', 'method' => 'Add'],   
    'ViewAdmin' => ['controller' => 'Admin', 'method' => 'AdminView'],
    'addAdmin' => ['controller' => 'Admin', 'method' => 'addAdmin'],
    'updateAdmin' => ['controller' => 'Admin', 'method' => 'editAdmin'],
    'deleteAdmin' => ['controller' => 'Admin', 'method' => 'deleteAdmin'],


    //product routes
    'add' => ['controller' => 'ProductController', 'method' => 'addProduct'],
    'viewproduct' => ['controller' => 'ProductController', 'method' => 'showProducts'],
    'deleteproduct' => ['controller' => 'ProductController', 'method' => 'deleteProduct'],
    'updateproduct' => ['controller' => 'ProductController', 'method' => 'updateProduct'],


    //add to cart
    'addtocart' => ['controller' => 'CartController', 'method' => 'addToCart'],

     // categroy Product Show
    'Men' => ['controller' => 'ProductController', 'method' => 'showMenProducts'],
    'Women' => ['controller' => 'ProductController', 'method' => 'showWomenProducts'],
    'ProductPage' => ['controller' => 'ProductController', 'method' => 'productPage'], 


]
?>
