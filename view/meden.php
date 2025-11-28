<?php include 'menu.php'; ?>
<main>
    <section class="product-detail">
        <div class="product-detail-image">
            <img src="../media/bánh dứa.jpg" alt="Bánh Dứa Đài Loan Đặc Biệt">
        </div>
        <div class="product-detail-info">
            <h2>Bánh Dứa Đài Loan Đặc Biệt</h2>
            <p class="price">Giá: 135,000đ</p>
            <p class="description">
                Bánh dứa vỏ bơ thơm lừng, nhân mứt dứa dẻo chua ngọt, món quà biếu nổi tiếng từ Đài Loan.
            </p>
            <form action="../controller/controller.php" method="post" class="order-form">
                <input type="hidden" name="id_sp" value="7">
                <input type="hidden" name="tensp" value="Bánh Dứa Đài Loan Đặc Biệt">
                <input type="hidden" name="dongia" value="135000">
                <label for="quantity">Số lượng:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1">
                <button type="submit" name="add_to_cart">Thêm vào giỏ hàng</button>
            </form>
        </div>
    </section>
</main>
<?php include 'footer.php'; ?>