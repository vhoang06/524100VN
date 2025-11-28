<?php include 'menu.php'; ?>
<main>
    <section class="product-detail">
        <div class="product-detail-image">
            <img src="../media/mochi xoài.jpg" alt="Bánh Mochi Kem Lạnh Vị Xoài">
        </div>
        <div class="product-detail-info">
            <h2>Bánh Mochi Kem Lạnh Vị Xoài</h2>
            <p class="price">Giá: 130,000đ</p>
            <p class="description">
                Bánh Mochi nhân kem lạnh vị xoài tươi mát, vỏ dẻo mịn kiểu Nhật. Món tráng miệng độc đáo và được ưa chuộng.
            </p>
            <form action="../controller/controller.php" method="post" class="order-form">
                <input type="hidden" name="id_sp" value="3">
                <input type="hidden" name="tensp" value="Bánh Mochi Kem Lạnh Vị Xoài">
                <input type="hidden" name="dongia" value="130000">
                <label for="quantity">Số lượng:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1">
                <button type="submit" name="add_to_cart">Thêm vào giỏ hàng</button>
            </form>
        </div>
    </section>
</main>
<?php include 'footer.php'; ?>