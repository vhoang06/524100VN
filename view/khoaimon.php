<?php include 'menu.php'; ?>
<main>
    <section class="product-detail">
        <div class="product-detail-image">
            <img src="../media/flan.jpg" alt="Bánh Flan Trứng Caramel">
        </div>
        <div class="product-detail-info">
            <h2>Bánh Flan Trứng Caramel</h2>
            <p class="price">Giá: 125,000đ</p>
            <p class="description">
                Bánh Flan trứng mềm mịn, tan chảy, kèm theo lớp sốt caramel đắng nhẹ thơm lừng. Cực kỳ được yêu thích.
            </p>
            <form action="../controller/controller.php" method="post" class="order-form">
                <input type="hidden" name="id_sp" value="6">
                <input type="hidden" name="tensp" value="Bánh Flan Trứng Caramel">
                <input type="hidden" name="dongia" value="125000">
                <label for="quantity">Số lượng:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1">
                <button type="submit" name="add_to_cart">Thêm vào giỏ hàng</button>
            </form>
        </div>
    </section>
</main>
<?php include 'footer.php'; ?>