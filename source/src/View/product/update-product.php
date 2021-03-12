<form action="index.php?page=update-product" method="post">

    <h2>Chỉnh sửa mặt hàng <?php echo $product[0]['product_name'] ?></h2>
    <table>
        <tr>
            <th><label for="name">Tên hàng:</label></th>
            <th><input name="product_name" type="text" id="name" value="<?php echo $product[0]['product_name'] ?>"></th>
        </tr>
        <tr>
            <th><label for="type">Loại hàng:</label></th>
            <th><select name="product_line" id="type">
                    <?php foreach ($productLines as $key => $producLine): ?>
                        <option <?php if ($producLine['name'] == $product[0]['product_line']) : ?> selected <?php endif; ?> value="<?php echo $producLine['name'] ?>"><?php echo $producLine['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </th>
        </tr>
        <tr>
            <th><label for="price">Giá</label></th>
            <th><input name="product_price" type="text" id="price" value="<?php echo $product[0]['product_price'] ?>"></th>
        </tr>
        <tr>
            <th><label for="quantity">Số lượng</label></th>
            <th><input name="product_quantity" type="number" id="quantity" value="<?php echo $product[0]['product_quantity'] ?>"></th>
            <input  name="product_date" type="text" value="<?php echo date("Y-m-d")?>">
            <input  name="product_id" type="text" value="<?php echo $product[0]['product_id']?>">
        </tr>
        <tr>
            <th><label for="des">Mô tả</label></th>
            <th><textarea name="product_des" id="des" cols="30" rows="10"><?php echo $product[0]['product_des'] ?></textarea></th>
        </tr>
    </table>

    <button type="submit">Sửa mặt hàng</button>
    <button type="button"><a href="index.php?page=products">Thoát</a></button>
</form>


