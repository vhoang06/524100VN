<?php include 'menu.php'; ?>

<body style="background: #f5f5f5;">
    <div class="simple-login-form">
        <h2>Đăng Ký Tài Khoản</h2>

        <form action="../controller/control.php" method="POST">
            <input type="text" id="ten" name="ten" placeholder="Họ và Tên" required>
            <input type="text" id="diachi" name="diachi" placeholder="Địa chỉ">
            <input type="email" id="email" name="email" placeholder="Email">
            <input type="text" id="sodienthoai" name="sodienthoai" placeholder="Số điện thoại">

            <button type="submit" name="sub_user" class="btn-primary">Tạo tài khoản</button>
        </form>

        <div class="register-simple-link">
            Đã có tài khoản? <a href="dangnhap.php">Đăng nhập ngay</a>
        </div>
    </div>
</body>

<?php include 'footer.php'; ?>
