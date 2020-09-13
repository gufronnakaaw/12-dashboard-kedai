<?php 
session_start();
// this file will require class and instance class
require 'Config.php';
require 'Database.php';
require 'Flasher.php';

// class auth
require '../Model/Auth.php';
$auth = new Auth;

// class supplier
require '../Model/Supplier.php';
$supplier = new Supplier;

// class Product
require '../Model/Product.php';
$product = new Product;

// class Stock
require '../Model/Stock.php';
$stock = new Stock;

// 
?>