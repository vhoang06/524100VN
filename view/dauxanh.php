<?php include 'menu.php'; ?>
<main>
    <section class="product-detail">
        <div class="product-detail-image">
            <img src="../media/kẹo nuggat.jpg" alt="Kẹo Nougat Hạnh Nhân">
        </div>
        <div class="product-detail-info">
            <h2>Kẹo Nougat Hạnh Nhân</h2>
            <p class="price">Giá: 100,000đ</p>
            <p class="description">
                Kẹo Nougat Đài Loan dẻo dai, béo ngậy vị sữa, kết hợp cùng hạnh nhân rang bùi béo. Rất thích hợp làm quà tặng.
            </p>
            <form action="../controller/controller.php" method="post" class="order-form">
                <input type="hidden" name="id_sp" value="2">
                <input type="hidden" name="tensp" value="Kẹo Nougat Hạnh Nhân">
                <input type="hidden" name="dongia" value="100000">
                <label for="quantity">Số lượng:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1">
                <button type="submit" name="add_to_cart">Thêm vào giỏ hàng</button>
            </form>
        </div>
    </section>
</main>
<?php include 'footer.php'; ?>