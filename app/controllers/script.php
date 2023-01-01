<?php
    session_start();
    require_once("../DB.php");
    require("../models/cartModel.php");
    require("../models/ProductModel.php");
    //require("../DB.php");
    if(isset($_GET['store-product-id'])){
        $product_id = $_GET['store-product-id'];
        $cart = new CartModel($product_id);
        $cart->storeProduct();
        //header('Location: "'+ $_SERVER['HTTP_REFERER'] + ' "');
        //header("Location: javascript:window.top.location.reload(true)");
        exit();
    }
    if(isset($_GET['single-store-product-id'])){
        $product_id = $_GET['single-store-product-id'];
        $cart = new CartModel($product_id);
        $cart->storeProduct();
        if (isset($_GET['quantity'])){
            $quant = $_GET['quantity'];
            $card->updateQuantity($quant);
        }
       
       // header("Location: ../controllers/orderController.php?action=viewDetail&id=".$product_id);
        exit();
    }
    if(isset($_GET['remove-product-id'])){
        $product_id = $_GET['remove-product-id'];
        echo $product_id;
        $cart = new CartModel($product_id);
        $cart->removeItem();
        //header("Location: ../views/cart.php");
        exit();
    }
    if(isset($_GET['quantity-update'])){
        $product_id = $_GET['product-id'];
        $quant = $_GET['quantity'];
        if(is_numeric($quant) && $quant>0){
            $cart = new CartModel($product_id);
            $cart->updateQuantity($quant);
        }
        //header("Location: ../views/cart.php");
        exit();
    }
    if(isset($_GET['clear-cart'])){
        CartModel::clearCart();
        //header("Location: ../views/cart.php");
        exit();
    }
    if(isset($_GET['store-product-id-user'])){
        $product_id = $_GET['store-product-id-user'];
        $cart = new CartModel($product_id);
        $cart->storeProductUser();
        //header("Location: ../views/home.php");
        exit();
    }
    if(isset($_GET['single-store-product-id-user'])){
        $product_id = $_GET['single-store-product-id-user'];
        $cart = new CartModel($product_id);
        $cart->storeProductUser();
        //header("Location: ../controllers/orderController.php?action=viewDetail&id=".$product_id);
        exit();
    }
    if(isset($_GET['remove-product-id-user'])){
        $product_id = $_GET['remove-product-id-user'];
        echo $product_id;
        $cart = new CartModel($product_id);
        $cart->removeItemUser();
        //header("Location: ../views/cart.php");
        exit();
    }
    if(isset($_GET['quantity-update-user'])){
        $product_id = $_GET['product-id-user'];
        $quant = $_GET['quantity-user'];
        if(is_numeric($quant) && $quant>0){
            $cart = new CartModel($product_id);
            $cart->updateQuantityUser($quant);
        }
        //header("Location: ../views/cart.php");
        exit();
    }
    if(isset($_GET['clear-cart-user'])){
        CartModel::clearCartUser();
        //header("Location: ../views/cart.php");
        exit();
    }
?>