<?php
session_start();

if (!file_exists('../model/model.php')) {
    die("Lỗi: Không tìm thấy file model.php");
}
include('../model/model.php');

$get_data = null;
try {
    $get_data = new data_contact();
} catch (Exception $e) {
    die("Lỗi khởi tạo đối tượng: " . $e->getMessage());
}
if ($get_data === null) {
    die("Lỗi: Không thể khởi tạo đối tượng data_contact");
}

// Thêm sản phẩm mới
if (isset($_POST['sub'])) {
    $tensp = trim($_POST['tensp'] ?? '');
    $soluong = intval($_POST['soluong'] ?? 0);
    $dongia = intval($_POST['dongia'] ?? 0);
    
    if (empty($tensp) || $soluong < 0 || $dongia < 0) {
        echo "<script>alert('Thông tin không hợp lệ!'); window.history.back();</script>";
    } else {
        $insert = $get_data->insert_tmsp($tensp, $soluong, $dongia);
        if ($insert) {
            echo "<script>alert('Nhập thành công'); window.location.href='../VIEW/select.php';</script>";
        } else {
            echo "<script>alert('Không thực thi được: " . mysqli_error($conn) . "');</script>";
        }
    }
    exit();
}

// Xóa sản phẩm
if (isset($_GET['xoa'])) {
    $id = intval($_GET['xoa'] ?? 0);
    if ($id > 0) {
        $delete = $get_data->delete_sp_id($id);
        if ($delete) {
            echo "<script>alert('Xóa thành công'); window.location.href='../VIEW/select.php';</script>";
        } else {
            echo "<script>alert('Không thực thi được: " . mysqli_error($conn) . "');</script>";
        }
    } else {
        echo "<script>alert('ID không hợp lệ!'); window.history.back();</script>";
    }
    exit();
}

// Cập nhật sản phẩm
if (isset($_GET['sua'])) {
    $id = intval($_GET['sua'] ?? 0);
    $tensp = trim($_POST['tensp'] ?? '');
    $soluong = intval($_POST['soluong'] ?? 0);
    $dongia = intval($_POST['dongia'] ?? 0);
    
    if ($id <= 0 || empty($tensp) || $soluong < 0 || $dongia < 0) {
        echo "<script>alert('Thông tin không hợp lệ!'); window.history.back();</script>";
    } else {
        $update = $get_data->update_sp_id($tensp, $soluong, $dongia, $id);
        if ($update) {
            echo "<script>alert('Sửa thành công'); window.location.href='../VIEW/select.php';</script>";
        } else {
            echo "<script>alert('Không thực thi được: " . mysqli_error($conn) . "');</script>";
        }
    }
    exit();
}

// Thêm vào giỏ hàng
if (isset($_POST['add_to_cart'])) {
    if (!isset($_SESSION['id_nd'])) {
        echo "<script>alert('Bạn cần đăng nhập để thêm vào giỏ hàng!'); window.location.href='../view/dangnhap.php';</script>";
        exit();
    }

    $id_sp = intval($_POST['id_sp'] ?? 0);
    $quantity = intval($_POST['quantity'] ?? 0);
    $tensp = trim($_POST['tensp'] ?? '');
    $dongia = intval($_POST['dongia'] ?? 0);

    if ($quantity <= 0) {
        echo "<script>alert('Số lượng không hợp lệ!'); window.history.back();</script>";
        exit();
    }

    $result = $get_data->select_sp_by_id($id_sp);
    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
        if ($quantity > $product['soluong']) {
            echo "<script>alert('Số lượng vượt quá tồn kho!'); window.history.back();</script>";
            exit();
        }
        $tensp = $product['tensp'];
        $dongia = $product['dongia'];
    } else {
        if (empty($tensp) || $dongia <= 0) {
            echo "<script>alert('Vui lòng nhập tên và giá cho sản phẩm mới!'); window.history.back();</script>";
            exit();
        }
        $insert = $get_data->insert_tmsp($tensp, $quantity, $dongia);
        if ($insert) {
            $id_sp = mysqli_insert_id($conn);
        } else {
            echo "<script>alert('Lỗi khi thêm sản phẩm mới: " . mysqli_error($conn) . "'); window.history.back();</script>";
            exit();
        }
    }

    if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $id_sp) {
            $item['quantity'] += $quantity;
            $found = true;
            break;
        }
    }

    if (!$found) {
        $_SESSION['cart'][] = [
            'id' => $id_sp,
            'name' => $tensp,
            'price' => $dongia,
            'quantity' => $quantity
        ];
    }

    echo "<script>alert('Thêm vào giỏ hàng thành công!'); window.location.href='../view/giohang.php';</script>";
    exit();
}

// Cập nhật giỏ hàng
if (isset($_POST['update_cart'])) {
    error_log("POST data: " . print_r($_POST, true)); // Debug
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        if (!empty($_POST['quantity']) && is_array($_POST['quantity'])) {
            foreach ($_POST['quantity'] as $key => $qty) {
                $qty = intval($qty);
                if (isset($_SESSION['cart'][$key])) {
                    if ($qty <= 0) {
                        unset($_SESSION['cart'][$key]);
                    } else {
                        $_SESSION['cart'][$key]['quantity'] = $qty;
                    }
                } else {
                    error_log("Key $key not found in cart");
                }
            }
        } else {
            error_log("No valid quantity data in POST");
        }
    } else {
        $_SESSION['cart'] = [];
        error_log("Cart session is invalid or empty");
    }
    echo "<script>alert('Cập nhật giỏ hàng thành công!'); window.location.href='../view/giohang.php';</script>";
    exit();
}

// Xóa sản phẩm khỏi giỏ
if (isset($_GET['remove_from_cart'])) {
    if (!isset($_SESSION['id_nd'])) {
        echo "<script>alert('Bạn cần đăng nhập để xóa sản phẩm khỏi giỏ hàng!'); window.location.href='../view/dangnhap.php';</script>";
        exit();
    }
    $index = intval($_GET['remove_from_cart'] ?? -1);
    if ($index >= 0 && isset($_SESSION['cart'][$index])) {
        unset($_SESSION['cart'][$index]);
        echo "<script>alert('Xóa sản phẩm thành công!'); window.location.href='../view/giohang.php';</script>";
    } else {
        echo "<script>alert('Sản phẩm không tồn tại trong giỏ!'); window.location.href='../view/giohang.php';</script>";
    }
    exit();
}

// Thanh toán
if (isset($_POST['checkout'])) {
    if (!isset($_SESSION['id_nd'])) {
        echo "<script>alert('Bạn cần đăng nhập để thanh toán!'); window.location.href='../view/dangnhap.php';</script>";
        exit();
    }

    if (empty($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
        echo "<script>alert('Giỏ hàng trống!'); window.location.href='../view/giohang.php';</script>";
        exit();
    }

    $id_nd = $_SESSION['id_nd'];
    $success = true;

    foreach ($_SESSION['cart'] as $item) {
        $id_sp = $item['id'];
        $soluong = $item['quantity'];
        $tongtien = $item['price'] * $soluong;
        $trangthai = 'pending';

        $product = mysqli_fetch_assoc($get_data->select_sp_by_id($id_sp));
        if ($soluong > $product['soluong']) {
            $success = false;
            echo "<script>alert('Sản phẩm {$item['name']} vượt quá tồn kho!'); window.location.href='../view/giohang.php';</script>";
            break;
        }

        if (!$get_data->insert_order($id_nd, $id_sp, $soluong, $tongtien, $trangthai)) {
            $success = false;
            break;
        }

        $new_quantity = $product['soluong'] - $soluong;
        $get_data->update_sp_quantity($id_sp, $new_quantity);
    }

    if ($success) {
        unset($_SESSION['cart']);
        echo "<script>alert('Đặt hàng thành công!'); window.location.href='../view/select.php';</script>";
    } else {
        echo "<script>alert('Lỗi khi đặt hàng!'); window.location.href='../view/giohang.php';</script>";
    }
    exit();
}

// Đăng nhập
if (isset($_POST['sub_login'])) {
    $username = trim($_POST['txtuser'] ?? '');
    $password = trim($_POST['txtpass'] ?? '');
    
    if (empty($username) || empty($password)) {
        echo "<script>alert('Bạn chưa nhập đủ thông tin'); window.location.href='../VIEW/login.php';</script>";
    } else {
        $login = $get_data->login($username, $password);
        $num = mysqli_num_rows($login);
        if ($num == 1) {
            $user_data = mysqli_fetch_assoc($login);
            $_SESSION['txtuser'] = $user_data['ten'];
            $_SESSION['id_nd'] = $user_data['ID_ND'];
            echo "<script>alert('Đăng nhập thành công'); window.location.href='../VIEW/select.php';</script>";
        } else {
            echo "<script>alert('Sai thông tin đăng nhập'); window.location.href='../VIEW/login.php';</script>";
        }
    }
    exit();
}

// Đăng ký
if (isset($_POST['sub_user'])) {
    $ten = trim($_POST['ten'] ?? '');
    $diachi = trim($_POST['diachi'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $sodienthoai = trim($_POST['sodienthoai'] ?? '');
    
    if (empty($ten) || empty($diachi) || empty($email) || empty($sodienthoai)) {
        echo "<script>alert('Bạn chưa nhập đủ thông tin'); window.location.href='../VIEW/dangky.php';</script>";
    } else {
        $insert = $get_data->insert_tmnd($ten, $diachi, $email, $sodienthoai);
        if ($insert) {
            echo "<script>alert('Tạo tài khoản thành công'); window.location.href='../VIEW/select.php';</script>";
        } else {
            echo "<script>alert('Không thực thi được: " . mysqli_error($conn) . "');</script>";
        }
    }
    exit();
}

// Đăng xuất
if (isset($_GET['logout'])) {
    session_destroy();
    echo "<script>alert('Đăng xuất thành công!'); window.location.href='../VIEW/select.php';</script>";
    exit();
}
?>