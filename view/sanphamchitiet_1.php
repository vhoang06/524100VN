<?php include 'menu.php'; ?>
<main>
    <section class="product-detail">
        <div class="product-detail-image">
            <img src="../media/cookie.jpg" alt="Bánh Cookies Bơ Pháp">
        </div>
        <div class="product-detail-info">
            <h2>Bánh Cookies Bơ Pháp</h2>
            <p class="price">Giá: 120,000đ</p>
            <p class="description">
                Cookies bơ thơm lừng, giòn rụm, được làm theo công thức truyền thống của Pháp, tan chảy ngay trong miệng.
            </p>
            <form action="../controller/controller.php" method="post" class="order-form">
                <input type="hidden" name="id_sp" value="1">
                <input type="hidden" name="tensp" value="Bánh Cookies Bơ Pháp">
                <input type="hidden" name="dongia" value="120000">
                <label for="quantity">Số lượng:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1">
                <button type="submit" name="add_to_cart">Thêm vào giỏ hàng</button>
            </form>
        </div>
    </section>
</main>
<?php include 'footer.php'; ?>