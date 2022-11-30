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
        <h1>Update Product</h1>
        </div>

        <?php
        $url = "http://localhost/simple_shop_api/api/product/read_single.php?p_id=";
        $_p_id = $_GET['p_id'];
        $final_url = $url . $_p_id;
        $json = file_get_contents(strval($final_url));
        $data=array();
        $data = json_decode($json, true);
            ?>
            <div>
                <form id="updateProductApiForm">
                    ID: <input type="text" name="p_id" placeholder="id" autocomplete="on" value="<?php echo $data["p_id"]; ?>" readonly="readonly"><br>
                    Name: <input type="text" name="p_name" placeholder="product name" autocomplete="on" value="<?php echo $data["p_name"]; ?>"><br>
                    Description: <textarea name="p_description" id="" cols="30" rows="10" placeholder="<?php echo $data["p_description"]; ?>" autocomplete="on"></textarea><br>
                    Code: <input type="text" name="p_code" placeholder="product code" autocomplete="on" value="<?php echo $data["p_code"]; ?>"><br>
                    SKU: <input type="text" name="p_sku" placeholder="product sku" autocomplete="on" value="<?php echo $data["p_sku"]; ?>"><br>
                    Price: <input type="text" name="p_price" placeholder="product price" autocomplete="on" value="<?php echo $data["p_price"]; ?>"><br>
                    Weight: </h5><input type="text" name="p_quantity" placeholder="product quantity" autocomplete="on" value="<?php echo $data["p_quantity"]; ?>"><br>
                    Weight: <input type="text" name="p_weight" placeholder="product weight" autocomplete="on" value="<?php echo $data["p_weight"]; ?>"><br>
                    Status: <input type="text" name="p_status" placeholder="product status" autocomplete="on" value="<?php echo $data["p_status"]; ?>"><br>
                    <button id="updateProduct"> Update Product </button>
                </form>
            </div>
    </main>
</body>
</html>
