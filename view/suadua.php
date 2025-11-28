<?php include 'menu.php'; ?>
<main>
    <section class="product-detail">
        <div class="product-detail-image">
            <img src="../media/kẹo dẻo.jpg" alt="Kẹo Gummy Trái Cây Hỗn Hợp">
        </div>
        <div class="product-detail-info">
            <h2>Kẹo Gummy Trái Cây Hỗn Hợp</h2>
            <p class="price">Giá: 115,000đ</p>
            <p class="description">
                Kẹo dẻo Gummy hình thú/trái cây, vị chua ngọt tự nhiên từ nước ép trái cây cô đặc. Món khoái khẩu của trẻ em.
            </p>
            <form action="../controller/controller.php" method="post" class="order-form">
                <input type="hidden" name="id_sp" value="5">
                <input type="hidden" name="tensp" value="Kẹo Gummy Trái Cây Hỗn Hợp">
                <input type="hidden" name="dongia" value="115000">
                <label for="quantity">Số lượng:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1">
                <button type="submit" name="add_to_cart">Thêm vào giỏ hàng</button>
            </form>
        </div>
    </section>
</main>
<?php include 'footer.php'; ?>