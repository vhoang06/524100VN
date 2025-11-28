<?php include 'menu.php'; ?>
<main>
    <section class="product-detail">
        <div class="product-detail-image">
            <img src="../media/bánh kẹo và trà.jpg" alt="Hộp Quà Thư Giãn & Trà">
        </div>
        <div class="product-detail-info">
            <h2>Hộp Quà Thư Giãn & Trà</h2>
            <p class="price">Giá: 600,000đ</p>
            <p class="description">
                Combo 4 món bánh Cookies/Flan/Mochi và 1 hộp trà thảo mộc organic cao cấp, tạo không gian thư giãn và ấm áp.
            </p>
            <form action="../controller/controller.php" method="post" class="order-form">
                <input type="hidden" name="id_sp" value="10">
                <input type="hidden" name="tensp" value="Hộp Quà Thư Giãn & Trà">
                <input type="hidden" name="dongia" value="600000">
                <label for="quantity">Số lượng:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1">
                <button type="submit" name="add_to_cart">Thêm vào giỏ hàng</button>
            </form>
        </div>
    </section>
</main>
<?php include 'footer.php'; ?>