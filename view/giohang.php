<?php 
session_start();
include 'menu.php';
?>

<style>
/* Tông màu chủ đạo: Xanh Navy Đậm (#2c3e50) và Cam Tươi (#f39c12) */

.cart-page {
    max-width: 1000px; /* Chiều rộng tối ưu */
    margin: 40px auto;
    padding: 40px 20px;
    background: #ffffff; /* Nền trắng sạch sẽ */
    border-radius: 12px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.08); /* Đổ bóng nhẹ hiện đại */
}

.cart-page h2 {
    color: #2c3e50; /* Xanh Navy đậm */
    text-align: center;
    margin-bottom: 35px;
    font-size: 32px;
    border-bottom: 2px solid #f39c12; /* Đường kẻ dưới màu cam */
    display: inline-block;
    padding-bottom: 10px;
    width: auto;
}

.cart-page p {
    text-align: center;
    font-size: 18px;
    color: #555;
}

.continue-shopping {
    color: #f39c12; /* Cam Tươi */
    text-decoration: none;
    font-weight: bold;
    transition: color 0.2s;
}

.continue-shopping:hover {
    color: #d35400;
}

.cart-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 30px;
    background: #fdfdfd;
}

.cart-table th, .cart-table td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #e9ecef;
}

.cart-table th {
    background-color: #f8f9fa; /* Nền đầu bảng */
    color: #2c3e50;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 15px;
}
.cart-table td:nth-child(2), /* Giá */
.cart-table td:nth-child(4) { /* Tổng */
    font-weight: 600;
    color: #f39c12; /* Màu cam cho giá */
}

.quantity-input {
    width: 70px;
    padding: 8px;
    text-align: center;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 16px;
    outline-color: #f39c12;
    transition: border-color 0.2s;
}

.remove-btn {
    color: #e74c3c; /* Màu đỏ cho nút xóa */
    text-decoration: none;
    font-weight: 600;
    padding: 5px 10px;
    border: 1px solid #e74c3c;
    border-radius: 4px;
    transition: all 0.2s;
}
.remove-btn:hover {
    color: #fff;
    border-color: #c0392b;
    background: #c0392b;
}

.cart-table tfoot td {
    font-size: 20px;
    font-weight: bold;
    color: #2c3e50;
    border-top: 3px solid #2c3e50; /* Dòng kẻ đậm cho tổng tiền */
}

.cart-actions {
    display: flex;
    justify-content: flex-end;
    gap: 20px;
    padding-top: 10px;
}

.btn-update, .btn-checkout {
    padding: 14px 30px;
    border: none;
    border-radius: 8px;
    font-size: 17px;
    font-weight: 700;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.1s;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.btn-update {
    background-color: #3498db; /* Xanh Dương cho Cập nhật */
    color: white;
}

.btn-update:hover {
    background-color: #2980b9;
    transform: translateY(-2px);
}

.btn-checkout {
    background-color: #f39c12; /* Cam Tươi cho Thanh toán (Primary) */
    color: white;
}

.btn-checkout:hover {
    background-color: #d35400;
    transform: translateY(-2px);
}
</style>
<main>
    <section class="cart-page">
        <h2>Giỏ Hàng Của Bạn</h2>
        
        <?php if (empty($_SESSION['cart'])): ?>
            <p>Giỏ hàng hiện tại trống. <a href="sanpham.php" class="continue-shopping">Tiếp tục mua sắm</a></p>
        <?php else: ?>
            <form action="../controller/controller.php" method="post" class="cart-form">
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $total = 0;
                        foreach ($_SESSION['cart'] as $key => $item): 
                            $subtotal = $item['price'] * $item['quantity'];
                            $total += $subtotal;
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['name']); ?></td>
                                <td><?php echo number_format($item['price']); ?>đ</td>
                                <td>
                                    <input type="number" name="quantity[<?php echo $key; ?>]" value="<?php echo $item['quantity']; ?>" min="1" class="quantity-input">
                                </td>
                                <td style="color: #f39c12; font-weight: 600;"><?php echo number_format($subtotal); ?>đ</td>
                                <td><a href="../controller/controller.php?remove_from_cart=<?php echo $key; ?>" class="remove-btn">Xóa</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"><strong>Tổng tiền:</strong></td>
                            <td colspan="2" style="font-size: 22px; color: #2c3e50;"><?php echo number_format($total); ?>đ</td>
                        </tr>
                    </tfoot>
                </table>
                
                <div class="cart-actions">
                    <button type="submit" name="update_cart" class="btn-update">Cập nhật giỏ hàng</button>
                    <button type="submit" name="checkout" class="btn-checkout">Thanh toán</button>
                </div>
            </form>
        <?php endif; ?>
    </section>
</main>

<?php include 'footer.php'; ?>