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
    <h1>Products</h1>
  </div>

  <div id="product-paginated-list" data-current-page="1" aria-live="polite">
    <?php
    $json = file_get_contents("http://localhost/simple_shop_api/api/product/read.php");
    $data=array();
    $data = json_decode($json, true);
    //print_r ($data);
    foreach ($data as $product) { 
      ?>
      <span class="product-card">
          <h5>ID: <?php echo $product["p_id"]; ?> </h5>
          <h5>Name: <?php echo $product["p_name"]; ?> </h5>
          <h5>Description: <?php echo $product["p_description"]; ?> </h5>
          <h5>Code: <?php echo $product["p_code"]; ?> </h5>
          <h5>SKU: <?php echo $product["p_sku"]; ?> </h5>
          <h5>Price: <?php echo $product["p_price"]; ?> </h5>
          <h5>Available: <?php echo $product["p_quantity"]; ?> </h5>
          <h5>Weight: <?php echo $product["p_weight"]; ?> </h5>
          <h5>Status: <?php echo $product["p_status"]; ?> </h5>
          <form id="deleteProductApiForm">
              <input type="text" class="p_id_input" style="display:none;" value="<?php echo $product["p_id"]; ?>"><br>
              <button id="deleteProduct_btn" class="deleteProduct_btn">Delete</button>
          </form>
          <button><a class='product_look' href='single-product.php?p_id=<?php echo $product["p_id"]; ?>'>Learn More</a></button>
          <button><a class='product_look' href='update-product.php?p_id=<?php echo $product["p_id"]; ?>'>Update</a></button>
      </span>
      <?php
      }
    ?>
  </div>

  <nav class="pagination-container">
    <button class="pagination-button" id="prev-button" aria-label="Previous page" title="Previous page"><i class="fas fa-arrow-left"></i></button>
    <div id="pagination-numbers"> </div>
    <button class="pagination-button" id="next-button" aria-label="Next page" title="Next page"><i class="fas fa-arrow-right"></i></button>
  </nav>
</main>

<script>
  const paginationNumbers = document.getElementById('pagination-numbers');
const paginatedList = document.getElementById('product-paginated-list');
const listItems = paginatedList.querySelectorAll('.product-card');
const nextButton = document.getElementById('next-button');
const prevButton = document.getElementById('prev-button');

const paginationLimit = 3;
const pageCount = Math.ceil(listItems.length / paginationLimit);
let currentPage = 1;

const disableButton = (button) => {
  button.classList.add('disabled');
  button.setAttribute('disabled', true);
};

const enableButton = (button) => {
  button.classList.remove('disabled');
  button.removeAttribute('disabled');
};

const handlePageButtonsStatus = () => {
  if (currentPage === 1) {
    disableButton(prevButton);
  } else {
    enableButton(prevButton);
  }

  if (pageCount === currentPage) {
    disableButton(nextButton);
  } else {
    enableButton(nextButton);
  }
};

const handleActivePageNumber = () => {
  document.querySelectorAll('.pagination-number').forEach((button) => {
    button.classList.remove('active');
    const pageIndex = Number(button.getAttribute('page-index'));
    if (pageIndex == currentPage) {
      button.classList.add('active');
    }
  });
};

const appendPageNumber = (index) => {
  const pageNumber = document.createElement('button');
  pageNumber.className = 'pagination-number';
  pageNumber.innerHTML = index;
  pageNumber.setAttribute('page-index', index);
  pageNumber.setAttribute('aria-label', 'Page ' + index);

  paginationNumbers.appendChild(pageNumber);
};

const getPaginationNumbers = () => {
  for (let i = 1; i <= pageCount; i++) {
    appendPageNumber(i);
  }
};

const setCurrentPage = (pageNum) => {
  currentPage = pageNum;

  handleActivePageNumber();
  handlePageButtonsStatus();

  const prevRange = (pageNum - 1) * paginationLimit;
  const currRange = pageNum * paginationLimit;

  listItems.forEach((item, index) => {
    item.classList.add('hidden');
    if (index >= prevRange && index < currRange) {
      item.classList.remove('hidden');
    }
  });
};

window.addEventListener('load', () => {
  getPaginationNumbers();
  setCurrentPage(1);

  prevButton.addEventListener('click', () => {
    setCurrentPage(currentPage - 1);
  });

  nextButton.addEventListener('click', () => {
    setCurrentPage(currentPage + 1);
  });

  document.querySelectorAll('.pagination-number').forEach((button) => {
    const pageIndex = Number(button.getAttribute('page-index'));

    if (pageIndex) {
      button.addEventListener('click', () => {
        setCurrentPage(pageIndex);
      });
    }
  });
});

</script>
</body>
</html>
