<?php
namespace App\Controller;
use App\Model\ProductModel;

class ProductController
{
    protected $productModel;

    public function __construct(){
        $this->productModel = new ProductModel();
    }

    public function getAll(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $products = $this->productModel->getAll();
            include "src/View/product/product-list.php";
        }elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $search = $_REQUEST['search'];
            $products = $this->productModel->searchProduct($search);
            include "src/View/product/search-product.php";
        }
    }

    public function addProduct(){
        if ($_SERVER['REQUEST_METHOD'] == "GET"){
            $productLines = $this->productModel->getProductLine();
            include "src/View/product/add-product.php";
        }elseif ($_SERVER['REQUEST_METHOD'] == "POST"){
            $productName = $_REQUEST['product_name'];
            $productLine = $_REQUEST['product_line'];
            $productPrice = $_REQUEST['product_price'];
            $productDate = $_REQUEST['product_date'];
            $productQuantity = $_REQUEST['product_quantity'];
            $productDes = $_REQUEST['product_des'];
            if (!empty($productName) && !empty($productLine) && !empty($productQuantity) && !empty($productPrice) && !empty($productDate) && !empty($productDes)){
                $this->productModel->addProduct($productName,$productLine,$productPrice,$productQuantity,$productDate,$productDes);
            }
        }
    }

    public function updateProduct(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $id = (int)$_REQUEST['id'];
            $product = $this->productModel->getProductById($id);
            $productLines = $this->productModel->getProductLine();
//            var_dump($product);
            include "src/View/product/update-product.php";
        }elseif ($_SERVER["REQUEST_METHOD"] == "POST"){
            $productId = (int)$_REQUEST['product_id'];
            $productName = $_REQUEST['product_name'];
            $productLine = $_REQUEST['product_line'];
            $productPrice = $_REQUEST['product_price'];
            $productDate = $_REQUEST['product_date'];
            $productQuantity = $_REQUEST['product_quantity'];
            $productDes = $_REQUEST['product_des'];

            if (!empty($productId) && !empty($productName) && !empty($productLine) && !empty($productQuantity) && !empty($productPrice) && !empty($productDate) && !empty($productDes)){
                $this->productModel->updateProduct($productId,$productName,$productLine,$productPrice,$productQuantity,$productDate,$productDes);
            }
        }

    }

    public function deleteProduct(){
        $id = (int)$_REQUEST['id'];
        if (!empty($id)){
            $this->productModel->deleteProduct($id);
        }

    }
}