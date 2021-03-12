<div>
    <h2>Danh sách mặt hàng</h2>
    <div>
        <form method="post" action="index.php?page=products">
            <label for="search">Nhập tên hàng</label> <input name="search" type="text">
            <button type="submit">tìm kiếm</button>
        </form>
        <button><a href="index.php?page=add-products">Thêm mặt hàng</a></button>
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

