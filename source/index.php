<?php
ob_start();

use App\Controller\ProductController;

require __DIR__ .'/vendor/autoload.php';

$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : '';
$productController = new ProductController();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="index.php?page=products">Danh sach san pham</a>
    <?php
        switch ($page)
        {
            case 'products':
                $productController->getAll();
                break;
            case 'add-products':
                $productController->addProduct();
                break;
            case 'delete-product':
                $productController->deleteProduct();
                break;
        }
        ob_end_flush();
    ?>

</body>
</html>

