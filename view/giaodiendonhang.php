<?php
    session_start();
    if(empty($_SESSION['txtuser'])) {
        header("Location: ../view/dangnhap.php");
        exit(); 
    }
?>
<body>
    <div class="form-container">
        <form action="../controller/controller.php" method="POST">
            <h1>Thêm mới sản phẩm</h1>
            <div class="form-group">
                <label for="tensp">Tên sản phẩm:</label>
                <input type="text" id="tensp" name="tensp" required>
            </div>
            <div class="form-group">
                <label for="soluong">Số lượng:</label>
                <input type="text" id="soluong" name="soluong" required>
            </div>
            <div class="form-group">
                <label for="dongia">Đơn giá:</label>
                <input type="text" id="dongia" name="dongia" required>
            </div>
            <input type="submit" name="sub" value="Thêm mới" class="submit-btn">
        </form>
    </div>
</body>
</html>