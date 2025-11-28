<?php
    session_start();
    if(empty($_SESSION['txtuser'])) {
        header("Location: ../VIEW/login.php");
        exit(); 
    }
?>
<?php
    include('../model/model.php'); 
    $get_data = new data_contact; 
    $i_sp = null;

    if (!isset($_GET['sua'])) {
        die("Lỗi: Không có ID được cung cấp để cập nhật.");
    }

    $result = $get_data->select_sp_by_id($_GET['sua']);
    $i_sp = mysqli_fetch_assoc($result);

    if (!$i_sp) {
        die("Lỗi: Không tìm thấy bản ghi để cập nhật.");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật sản phẩm</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/update_css.css">
</head>
<body>
    <div class="form-container">
        <form method="POST" action="../CONTROLLER/control.php?sua=<?php echo $i_sp['ID_SP']; ?>">
            <h2 class="form-title">CẬP NHẬT SẢN PHẨM</h2>
            
            <div class="form-group">
                <label for="tensp">Tên sản phẩm:</label>
                <input type="text" id="tensp" name="tensp" value="<?php echo htmlspecialchars($i_sp['tensp']); ?>" required>
            </div>

            <div class="form-group">
                <label for="soluong">Số lượng:</label>
                <input type="text" id="soluong" name="soluong" value="<?php echo htmlspecialchars($i_sp['soluong']); ?>" required>
            </div>

            <div class="form-group">
                <label for="dongia">Đơn giá:</label>
                <input type="text" id="dongia" name="dongia" value="<?php echo htmlspecialchars($i_sp['dongia']); ?>" required>
            </div>

            <input type="submit" name="update" value="Cập Nhật" class="submit-btn">
            <a href="select.php" class="back-link">Hiển thị danh sách</a>
        </form>
    </div>
</body>
</html>