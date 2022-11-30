<?php 
  class Product {
    // DB connection
    private $conn;
    private $table = 'products';

    // Product Properties
    public $p_id;
    public $p_name;
    public $p_description;
    public $p_code;
    public $p_sku;
    public $p_price;
    public $p_quantity;
    public $p_weight;
    public $p_status;

    // DB Constructor 
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Products
    public function read() {
      // Create query
      $query = 'SELECT * FROM ' . $this->table;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Product
    public function read_single() {
          // Create query
          $query = 'SELECT * FROM ' . $this->table . ' WHERE p_id = ? LIMIT 0,1';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind ID
          $stmt->bindParam(1, $this->p_id);

          // Execute query
          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          $this->p_id = $row['p_id'];
          $this->p_name = $row['p_name'];
          $this->p_description = $row['p_description'];
          $this->p_code = $row['p_code'];
          $this->p_sku = $row['p_sku'];
          $this->p_price = $row['p_price'];
          $this->p_quantity = $row['p_quantity'];
          $this->p_weight = $row['p_weight'];
          $this->p_status = $row['p_status'];
    }

    // Create Product
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET p_name = :p_name, p_description = :p_description, p_code = :p_code, p_sku = :p_sku, 
                                                        p_price = :p_price, p_quantity = :p_quantity, p_weight = :p_weight, p_status = :p_status';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->p_name = htmlspecialchars(strip_tags($this->p_name));
          $this->p_description = htmlspecialchars(strip_tags($this->p_description));
          $this->p_code = htmlspecialchars(strip_tags($this->p_code));
          $this->p_sku = htmlspecialchars(strip_tags($this->p_sku));
          $this->p_price = htmlspecialchars(strip_tags($this->p_price));
          $this->p_quantity = htmlspecialchars(strip_tags($this->p_quantity));
          $this->p_weight = htmlspecialchars(strip_tags($this->p_weight));
          $this->p_status = htmlspecialchars(strip_tags($this->p_status));
          
          // Bind data
          $stmt->bindParam(':p_name', $this->p_name);
          $stmt->bindParam(':p_description', $this->p_description);
          $stmt->bindParam(':p_code', $this->p_code);
          $stmt->bindParam(':p_sku', $this->p_sku);
          $stmt->bindParam(':p_price', $this->p_price);
          $stmt->bindParam(':p_quantity', $this->p_quantity);
          $stmt->bindParam(':p_weight', $this->p_weight);
          $stmt->bindParam(':p_status', $this->p_status);

          // Execute query
          if($stmt->execute()) {
            return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update Product
    public function update() {
        // Create query
        $query = 'UPDATE ' . $this->table . ' 
                            SET p_name = :p_name, p_description = :p_description, p_code = :p_code, p_sku = :p_sku, 
                            p_price = :p_price, p_quantity = :p_quantity, p_weight = :p_weight, p_status = :p_status
                            WHERE p_id = :p_id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->p_id = htmlspecialchars(strip_tags($this->p_id));
        $this->p_name = htmlspecialchars(strip_tags($this->p_name));
        $this->p_description = htmlspecialchars(strip_tags($this->p_description));
        $this->p_code = htmlspecialchars(strip_tags($this->p_code));
        $this->p_sku = htmlspecialchars(strip_tags($this->p_sku));
        $this->p_price = htmlspecialchars(strip_tags($this->p_price));
        $this->p_quantity = htmlspecialchars(strip_tags($this->p_quantity));
        $this->p_weight = htmlspecialchars(strip_tags($this->p_weight));
        $this->p_status = htmlspecialchars(strip_tags($this->p_status));
        
        // Bind data
        $stmt->bindParam(':p_id', $this->p_id);
        $stmt->bindParam(':p_name', $this->p_name);
        $stmt->bindParam(':p_description', $this->p_description);
        $stmt->bindParam(':p_code', $this->p_code);
        $stmt->bindParam(':p_sku', $this->p_sku);
        $stmt->bindParam(':p_price', $this->p_price);
        $stmt->bindParam(':p_quantity', $this->p_quantity);
        $stmt->bindParam(':p_weight', $this->p_weight);
        $stmt->bindParam(':p_status', $this->p_status);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }

    // Delete Product
    public function delete() {
          // Create query
          $query = 'DELETE FROM ' . $this->table . ' WHERE p_id = :p_id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->p_id = htmlspecialchars(strip_tags($this->p_id));

          // Bind data
          $stmt->bindParam(':p_id', $this->p_id);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }
    
  }