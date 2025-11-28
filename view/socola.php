<?php include 'menu.php'; ?>
<main>
    <section class="product-detail">
        <div class="product-detail-image">
            <img src="../media/chocolate.jpg" alt="Chocolate Truffle Nguyên Chất">
        </div>
        <div class="product-detail-info">
            <h2>Chocolate Truffle Nguyên Chất</h2>
            <p class="price">Giá: 140,000đ</p>
            <p class="description">
                Viên Chocolate Truffle làm từ 70% cacao Bỉ, đậm vị và tan chảy ngay trong miệng. Lựa chọn hoàn hảo cho người sành socola.
            </p>
            <form action="../controller/controller.php" method="post" class="order-form">
                <input type="hidden" name="id_sp" value="4">
                <input type="hidden" name="tensp" value="Chocolate Truffle Nguyên Chất">
                <input type="hidden" name="dongia" value="140000">
                <label for="quantity">Số lượng:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1">
                <button type="submit" name="add_to_cart">Thêm vào giỏ hàng</button>
            </form>
        </div>
    </section>
</main>
<?php include 'footer.php'; ?>