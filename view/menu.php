
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Web Bán Bánh kẹo</title>
    <link rel="stylesheet" href="..\view\style.css">
</head>
<body>
<menu>
    <div class="logo">
        <a href="trangchu.php"><img src="../media/tải xuống.png" alt="Logo"></a>
    </div>
    <nav>
        <ul>
            <li><a href="trangchu.php">TRANG CHỦ</a></li>
            <li><a href="gioithieu.php">GIỚI THIỆU</a></li>
            <li><a href="sanpham.php">SẢN PHẨM</a></li>
            <li><a href="tintuc.php">TIN TỨC</a></li>
            <li><a href="lienhe.php">LIÊN HỆ</a></li>
            <li><a href="../view/dangnhap.php">ĐĂNG NHẬP</a></li>
            <li><a href="giohang.php">Giỏ hàng (<?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>)</a></li>
        </ul>
    </nav>
</nav>
    <div class="search-box">
        <form action="sanpham.php" method="get">
            <input type="text" name="q" placeholder="Tìm kiếm...">
            <button type="submit">🔍</button>
        </form>
    </div>
</menu>
</body>
</html>