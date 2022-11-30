<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
    <script src="template_parts/js/ajaxCall.js"></script>

      <style>
        body {
          text-align: center;
          font-family: "Helvetica", sans-serif;
        }
        h1 {
          font-size: 2em;
          font-weight: bold;
        }
        .box {
          border-radius: 5px;
          background-color: #eee;
          padding: 20px 5px;
        }
        button {
          color: white;
          background-color: #4791d0;
          border-radius: 5px;
          border: 1px solid #4791d0;
          padding: 5px 10px 8px 10px;
        }
        button:hover {
          background-color: #0F5897;
          border: 1px solid #0F5897;
        }

		#addProductApiForm input, textarea , button{
			margin: 5px;
			min-width: 20%;
		}
      </style>
</head>
<body>

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

<div class="addProductAlignment">
  <h1>Create Product</h1> 
  <form id="addProductApiForm">
    <input type="text" name="p_name" placeholder="product name" autocomplete="on" ><br>
    <textarea name="p_description" id="" cols="30" rows="10" placeholder="product description" autocomplete="on" ></textarea><br>
    <input type="text" name="p_code" placeholder="product code" autocomplete="on" ><br>
    <input type="text" name="p_sku" placeholder="product sku" autocomplete="on" ><br>
    <input type="text" name="p_price" placeholder="product price" autocomplete="on" ><br>
    <input type="text" name="p_quantity" placeholder="product quantity" autocomplete="on" ><br>
    <input type="text" name="p_weight" placeholder="product weight" autocomplete="on" ><br>
    <input type="text" name="p_status" placeholder="product status" autocomplete="on" ><br>
    <button id="addProduct"> Add Product </button>
  </form>
</div>

</body>
</html>

