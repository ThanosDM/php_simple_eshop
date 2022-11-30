<!DOCTYPE html>
<html lang="en">
<head>
		<?php include 'template_parts/header.php'; ?>
</head>
<body>

<main>
<header class="main_header">
  <nav>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="http://localhost/simple_shop_api/client/">Simple E-Shop</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="http://localhost/simple_shop_api/client/">Products</a></li>
          <li><a href="http://localhost/simple_shop_api/client/add-product.php">Add Product</a></li>
        </ul>
      </div>
    </nav>
  </nav>
</header>

<div class="product_main_title">
  <h1>Product Details</h1>
</div>

  <?php
  $url = "http://localhost/simple_shop_api/api/product/read_single.php?p_id=";
  $_p_id = $_GET['p_id'];
  $final_url = $url . $_p_id;
  $json = file_get_contents(strval($final_url));
  $data=array();
  $data = json_decode($json, true);
    ?>
    <span class="single-product">
        <h5>ID: <?php echo $data["p_id"]; ?> </h5>
        <h5>Name: <?php echo $data["p_name"]; ?> </h5>
        <h5>Description: <?php echo $data["p_description"]; ?> </h5>
        <h5>Code: <?php echo $data["p_code"]; ?> </h5>
        <h5>SKU: <?php echo $data["p_sku"]; ?> </h5>
        <h5>Price: <?php echo $data["p_price"]; ?> </h5>
        <h5>Available: <?php echo $data["p_quantity"]; ?> </h5>
        <h5>Weight: <?php echo $data["p_weight"]; ?> </h5>
        <h5>Status: <?php echo $data["p_status"]; ?> </h5>
    </span>
    <?php
  ?>

</main>

</body>
</html>
