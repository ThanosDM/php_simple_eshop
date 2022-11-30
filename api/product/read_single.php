<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Product.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog product object
  $product = new Product($db);

  // Get ID
  $product->p_id = isset($_GET['p_id']) ? $_GET['p_id'] : die();

  // Get product
  $product->read_single();

  // Create array
  $product_arr = array(
    'p_id' => $product->p_id,
    'p_name' => $product->p_name,
    'p_description' => $product->p_description,
    'p_code' => $product->p_code,
    'p_sku' => $product->p_sku,
    'p_price' => $product->p_price,
    'p_quantity' => $product->p_quantity,
    'p_weight' => $product->p_weight,
    'p_status' => $product->p_status
  );

  // Make JSON
  print_r(json_encode($product_arr));