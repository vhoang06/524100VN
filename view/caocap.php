<?php include 'menu.php'; ?>
<main>
    <section class="product-detail">
        <div class="product-detail-image">
            <img src="../media/bánh kẹo nhập khẩu.jpg" alt="Hộp Quà Đặc Sản Quốc Tế">
        </div>
        <div class="product-detail-info">
            <h2>Hộp Quà Đặc Sản Quốc Tế</h2>
            <p class="price">Giá: 800,000đ</p>
            <p class="description">
                Tuyển chọn 6 loại bánh kẹo nhập khẩu từ Nhật, Bỉ, Đài Loan, đóng gói trong hộp quà sang trọng, thích hợp biếu đối tác.
            </p>
            <form action="../controller/controller.php" method="post" class="order-form">
                <input type="hidden" name="id_sp" value="11">
                <input type="hidden" name="tensp" value="Hộp Quà Đặc Sản Quốc Tế">
                <input type="hidden" name="dongia" value="800000">
                <label for="quantity">Số lượng:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1">
                <button type="submit" name="add_to_cart">Thêm vào giỏ hàng</button>
            </form>
        </div>
    </section>
</main>
<?php include 'footer.php'; ?>