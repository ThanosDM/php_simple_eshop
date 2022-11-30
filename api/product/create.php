<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Product.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog product object
  $post = new Product($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $post->p_name = $data->p_name;
  $post->p_description = $data->p_description;
  $post->p_code = $data->p_code;
  $post->p_sku = $data->p_sku;
  $post->p_price = $data->p_price;
  $post->p_quantity = $data->p_quantity;
  $post->p_weight = $data->p_weight;
  $post->p_status = $data->p_status;

  // Create product
  if($post->create()) {
    echo json_encode(
      array('message' => 'Product Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Product Not Created')
    );
  }
