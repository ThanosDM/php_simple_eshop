<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Product.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog product object
  $product = new Product($db);

  // Get raw data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $product->p_id = $data->p_id;
  $product->p_name = $data->p_name;
  $product->p_description = $data->p_description;
  $product->p_code = $data->p_code;
  $product->p_sku = $data->p_sku;
  $product->p_price = $data->p_price;
  $product->p_quantity = $data->p_quantity;
  $product->p_weight = $data->p_weight;
  $product->p_status = $data->p_status;

  // Update product
  if($product->update()) {
    echo json_encode(
      array('message' => 'Product Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Product Not Updated')
    );
  }
