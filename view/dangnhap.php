<?php include 'menu.php'; ?>

<body style="background: #f5f5f5;">
    <div class="simple-login-form">
        <h2>Đăng Nhập</h2>

        <form action="../controller/controller.php" method="POST">
            <input type="text" id="txtuser" name="txtuser" placeholder="Tên đăng nhập" required>
            <input type="password" id="txtpass" name="txtpass" placeholder="Mật khẩu" required>

            <button type="submit" name="sub_login" class="btn-primary">Đăng Nhập</button>
        </form>

        <div class="register-simple-link">
            Chưa có tài khoản? <a href="dangky.php">Đăng ký ngay</a>
        </div>
    </div>
</body>

<?php include 'footer.php'; ?>
