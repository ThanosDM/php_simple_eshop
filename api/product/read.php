<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  
  include_once '../../config/Database.php';
  include_once '../../models/Product.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate e-shop product object
  $product = new Product($db);

  // Blog product query
  $result = $product->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any products
  if($num > 0) {
    // Product array
    $product_arr = array();
    // $product_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $product_item = array(
        'p_id' => $p_id,
        'p_name' => $p_name,
        'p_description' => $p_description,
        'p_code' => $p_code,
        'p_sku' => $p_sku,
        'p_price' => $p_price,
        'p_quantity' => $p_quantity,
        'p_weight' => $p_weight,
        'p_status' => $p_status
      );

      // Push to "data"
      array_push($product_arr, $product_item);
      // array_push($product_arr['data'], $product_item);
    }

    // Turn to JSON & output
    echo json_encode($product_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Products Found')
    );
  }
