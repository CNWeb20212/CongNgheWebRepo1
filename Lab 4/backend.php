<?php
    $table_name = "Products";
    $db = connectDB("localhost", "root", "", "firstdb");

    if (!$db){
//        echo "Failed to connect db <br/>";
    } else {
//        echo "Success to connect db <br/>";
    }

    //createTable($db, $table_name);
            
    function connectDB($server, $username, $password, $dbname){
        $conn = new mysqli($server, $username, $password, $dbname);
        if (!$conn){
            return null;
        } else {
            return $conn;
        }
    }
   
    
    
    function createTable($db, $tbname){
        $query = "create table $tbname(
                    ProductID INT UNSIGNED NOT NULL
                    PRIMARY KEY AUTO_INCREMENT,
                    Product_desc VARCHAR(50),
                    Cost INT,
                    Weight INT,
                    Numb INT)";

        if($db->query($query)){
            return true;
        } else {
            return false;
        }
    }
    
    
    
    
    function insert($db, $table_name, $product_desc, $cost, $weight, $number){
        $query = "insert into $table_name values(null, \"$product_desc\", $cost, $weight, $number)";
        if($db->query($query)){
            return true;
        } else {
            return false;
        }
    }
    
    function selectAll($db, $table){
        $query = "select * from $table";
        return $db->query($query);
    }
    
    
   
            




