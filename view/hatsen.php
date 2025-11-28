<?php include 'menu.php'; ?>
<main>
    <section class="product-detail">
        <div class="product-detail-image">
            <img src="../media/rong biển.jpg" alt="Snack Rong Biển Tẩm Vị">
        </div>
        <div class="product-detail-info">
            <h2>Snack Rong Biển Tẩm Vị</h2>
            <p class="price">Giá: 145,000đ</p>
            <p class="description">
                Snack rong biển sấy giòn tan, tẩm vị cay nhẹ, giàu dinh dưỡng, món ăn vặt lý tưởng thay thế đồ chiên rán.
            </p>
            <form action="../controller/controller.php" method="post" class="order-form">
                <input type="hidden" name="id_sp" value="8">
                <input type="hidden" name="tensp" value="Snack Rong Biển Tẩm Vị">
                <input type="hidden" name="dongia" value="145000">
                <label for="quantity">Số lượng:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1">
                <button type="submit" name="add_to_cart">Thêm vào giỏ hàng</button>
            </form>
        </div>
    </section>
</main>
<?php include 'footer.php'; ?>