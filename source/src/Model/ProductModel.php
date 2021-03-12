<?php
namespace App\Model;
use PDO;

class ProductModel
{
    protected $database;

    public function __construct(){
        $db = new DBConnect();
        $this->database = $db->connect();
    }

    public function getAll(){
        $sql = "SELECT * FROM products";
        $stmt = $this->database->query($sql);
        return $stmt->fetchAll();
    }

    public function addProduct($productName,$productLine,$productPrice,$productQuantity,$productDate,$productDes){
        $sql = "INSERT INTO products(product_name,product_line,product_price,product_quantity,product_date,product_des) VALUES (:product_name,:product_line,:product_price,:product_quantity,:product_date,:product_des)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':product_name',$productName);
        $stmt->bindParam(':product_line',$productLine);
        $stmt->bindParam(':product_price',$productPrice);
        $stmt->bindParam(':product_quantity',$productQuantity);
        $stmt->bindParam(':product_date',$productDate);
        $stmt->bindParam(':product_des',$productDes);
        $stmt->execute();
    }

    public function getProductById($id){
        $sql = "SELECT * FROM products WHERE product_id=:product_id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':product_id',$id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function searchProduct($search){
        $sql = "SELECT * FROM products WHERE product_name=:product_name";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':product_name',$search);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function updateProduct($productId,$productName,$productLine,$productPrice,$productQuantity,$productDate,$productDes){
        $sql = "UPDATE products SET product_name=:product_name,product_line=:product_line,product_price=:product_price,product_quantity=:product_quantity,product_date=:product_date,product_des=:product_des WHERE product_id=:product_id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':product_id',$productId);
        $stmt->bindParam(':product_name',$productName);
        $stmt->bindParam(':product_line',$productLine);
        $stmt->bindParam(':product_price',$productPrice);
        $stmt->bindParam(':product_quantity',$productQuantity);
        $stmt->bindParam(':product_date',$productDate);
        $stmt->bindParam(':product_des',$productDes);
        $stmt->execute();
    }

    public function deleteProduct($id){
        $sql = "DELETE FROM products WHERE product_id=:product_id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':product_id',$id);
        $stmt->execute();
    }

    public function getProductLine(){
        $sql = "SELECT * FROM product_type";
        $stmt = $this->database->query($sql);
        return $stmt->fetchAll();
    }
}