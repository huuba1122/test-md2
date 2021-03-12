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
        $products = $this->productModel->getAll();
        var_dump($products);
        include "src/View/product/product-list.php";
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

    public function deleteProduct(){
        $id = (int)$_REQUEST['id'];
        if (!empty($id)){
            $this->productModel->deleteProduct($id);
        }

    }
}