<?php
    class Post{
        //DB stuff
        private $conn;
        private $table = 'item_mobile_games';

        //Post Properties
        public $id;
        public $category_id;
        public $category_name;
        public $item_name;
        public $stock;

        public function __construct($db){
            $this->conn = $db;
        }

        //Get Posts
        public function read(){
            //create query
            $query = 'SELECT * FROM ' . $this->table .' ORDER BY id';

            //Perpare statement
            $stmt = $this->conn->prepare($query);

            //Execute query
            $stmt->execute();

            return $stmt;
        }

        public function read_single(){
            //create query
            $query = 'SELECT * FROM ' . $this->table .' WHERE id = ?';

            //Perpare statement
            $stmt = $this->conn->prepare($query);
            
            //Bind ID
            $stmt->bindParam(1, $this->id);

            //Execute query
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            //Set properties
            $this->id = $row['id'];  
            $this->category_id = $row['category_id'];  
            $this->category_name = $row['category_name'];  
            $this->item_name = $row['item_name'];  
            $this->stock = $row['stock'];  
        }

        //Create Post
        public function create(){
            //Create query
            $query = 'INSERT INTO ' . $this->table . ' SET id = :id, category_id = :category_id, category_name = :category_name, item_name = :item_name, stock = :stock';

            //Prepate statement
            $stmt = $this->conn->prepare($query);
            
            //Clean data
            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->category_id = htmlspecialchars(strip_tags($this->category_id));
            $this->category_name = htmlspecialchars(strip_tags($this->category_name));
            $this->item_name = htmlspecialchars(strip_tags($this->item_name));
            $this->stock = htmlspecialchars(strip_tags($this->stock));

            //Bind data
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':category_id', $this->category_id);
            $stmt->bindParam(':category_name', $this->category_name);
            $stmt->bindParam(':item_name', $this->item_name);
            $stmt->bindParam(':stock', $this->stock);

            //Execute data
            if($stmt->execute()) {
                return true;
            }

            //if error message
            printf("Error: %s. \n", $stmt->error);

            return false;
        }

        //Update post
        public function update(){
            //Create query
            $query = 'UPDATE ' . $this->table . ' SET id = :id, category_id = :category_id, category_name = :category_name, item_name = :item_name, stock = :stock WHERE id = :id';

            //Prepate statement
            $stmt = $this->conn->prepare($query);
            
            //Clean data
            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->category_id = htmlspecialchars(strip_tags($this->category_id));
            $this->category_name = htmlspecialchars(strip_tags($this->category_name));
            $this->item_name = htmlspecialchars(strip_tags($this->item_name));
            $this->stock = htmlspecialchars(strip_tags($this->stock));

            //Bind data
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':category_id', $this->category_id);
            $stmt->bindParam(':category_name', $this->category_name);
            $stmt->bindParam(':item_name', $this->item_name);
            $stmt->bindParam(':stock', $this->stock);

            //Execute data
            if($stmt->execute()) {
                return true;
            }

            //if error message
            printf("Error: %s. \n", $stmt->error);

            return false;
        }

        //Delete Post
        public function delete(){
            $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

            //Prepare Statement
            $stmt = $this->conn->prepare($query);
            
            //Clean Data
            $this->id = htmlspecialchars(strip_tags($this->id));
            
            //Bind data
            $stmt->bindParam(':id', $this->id);

            //Execute data
            if($stmt->execute()) {
                return true;
            }

            //if error message
            printf("Error: %s. \n", $stmt->error);

            return false;
        }
    }