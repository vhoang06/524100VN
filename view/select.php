<?php 
session_start();
include '../model/model.php';
$get_data = new data_contact();
$products = $get_data->select_sp();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="../view/style.css">
</head>
<body>
    <?php include 'menu.php'; ?>
    <main>
        <section class="product-list">
            <h2>Danh sách sản phẩm</h2>
            <?php if ($products && mysqli_num_rows($products) > 0): ?>
                <table class="product-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($product = mysqli_fetch_assoc($products)): ?>
                            <tr>
                                <td><?php echo $product['ID_SP']; ?></td>
                                <td><?php echo htmlspecialchars($product['tensp']); ?></td>
                                <td><?php echo $product['soluong']; ?></td>
                                <td><?php echo number_format($product['dongia']); ?>đ</td>
                                <td>
                                    <a href="update.php?id=<?php echo $product['ID_SP']; ?>" class="edit-btn">Sửa</a>
                                    <form action="../controller/controller.php" method="post" style="display:inline;">
                                        <input type="hidden" name="id_sp" value="<?php echo $product['ID_SP']; ?>">
                                        <input type="hidden" name="tensp" value="<?php echo htmlspecialchars($product['tensp']); ?>">
                                        <input type="hidden" name="dongia" value="<?php echo $product['dongia']; ?>">
                                        <input type="number" name="quantity" value="1" min="1" style="width: 50px;">
                                        <button type="submit" name="add_to_cart" class="add-cart-btn">Thêm giỏ</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Không có sản phẩm nào.</p>
            <?php endif; ?>

            <!-- Form để thêm sản phẩm mới -->
            <h3>Thêm sản phẩm mới</h3>
            <form action="../controller/controller.php" method="post" class="update-form">
                <div class="form-group">
                    <label for="new_tensp">Tên sản phẩm:</label>
                    <input type="text" id="new_tensp" name="tensp" required>
                </div>
                <div class="form-group">
                    <label for="new_dongia">Đơn giá:</label>
                    <input type="number" id="new_dongia" name="dongia" min="0" required>
                </div>
                <div class="form-group">
                    <label for="new_quantity">Số lượng:</label>
                    <input type="number" id="new_quantity" name="quantity" value="1" min="1" required>
                </div>
                <button type="submit" name="add_to_cart" class="btn-update">Thêm vào giỏ và database</button>
            </form>
        </section>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>