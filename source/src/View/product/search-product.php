<div>
    <h2>Kết quả tìm kiếm mặt hàng</h2>
    <div>
        <button><a href="index.php?page=products">Xem Danh sach mặt hàng</a></button>
    </div>
    <div>
        <table>
            <tr>
                <th>#</th>
                <th>Tên hàng</th>
                <th>Loại hàng</th>
                <th></th>
            </tr>
            <?php foreach ($products as $key => $product): ?>
                <tr>
                    <th><?php echo $product['product_id'] ?></th>
                    <th><?php echo $product['product_name'] ?></th>
                    <th><?php echo $product['product_line'] ?></th>
                    <th><a href="index.php?page=update-product&id=<?php echo $product['product_id'] ?>">Chỉnh sửa</a>|
                        <a  onclick="return confirm('Are you sure?');" href="index.php?page=delete-product&id=<?php echo $product['product_id'] ?>">Xóa</a></th>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

