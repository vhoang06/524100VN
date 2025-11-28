<?php include 'menu.php'; ?>
<main>
    <section class="product-detail">
        <div class="product-detail-image">
            <img src="../media/combo 4 loại.jpg" alt="Hộp Quà Ăn Vặt Hiện Đại">
        </div>
        <div class="product-detail-info">
            <h2>Hộp Quà Ăn Vặt Hiện Đại</h2>
            <p class="price">Giá: 450,000đ</p>
            <p class="description">
                Hộp quà gồm 4 món bánh kẹo đa dạng (Cookies, Nougat, Gummy, Snack), phong cách hiện đại, phù hợp cho mọi lứa tuổi.
            </p>
            <form action="../controller/controller.php" method="post" class="order-form">
                <input type="hidden" name="id_sp" value="9">
                <input type="hidden" name="tensp" value="Hộp Quà Ăn Vặt Hiện Đại">
                <input type="hidden" name="dongia" value="450000">
                <label for="quantity">Số lượng:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1">
                <button type="submit" name="add_to_cart">Thêm vào giỏ hàng</button>
            </form>
        </div>
    </section>
</main>
<?php include 'footer.php'; ?>