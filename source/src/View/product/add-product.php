<form action="" method="post">

    <h2>Thêm mặt hàng</h2>
    <table>
        <tr>
            <th><label for="name">Tên hàng:</label></th>
            <th><input name="product_name" type="text" id="name"></th>
        </tr>
        <tr>
            <th><label for="type">Loại hàng:</label></th>
            <th><select name="product_line" id="type">
                    <?php foreach ($productLines as $key => $producLine): ?>
                        <option value="<?php echo $producLine['name'] ?>"><?php echo $producLine['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </th>
        </tr>
        <tr>
            <th><label for="price">Giá</label></th>
            <th><input name="product_price" type="text" id="price"></th>
        </tr>
        <tr>
            <th><label for="quantity">Số lượng</label></th>
            <th><input name="product_quantity" type="number" id="quantity"></th>
            <input  name="product_date" type="hidden" value="<?php echo date("Y-m-d")?>">
        </tr>
        <tr>
            <th><label for="des">Mô tả</label></th>
            <th><textarea name="product_des" id="des" cols="30" rows="10"></textarea></th>
        </tr>
    </table>

    <button type="submit">Nhập mặt hàng</button>
    <button type="button"><a href="index.php?page=products">Thoát</a></button>
</form>

