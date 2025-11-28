<?php include 'menu.php'; ?>

<main class="contact-page-main">
    <style>
        /* CSS cho trang Liên hệ (Có thể chuyển sang style.css) */
        .contact-page-main {
            padding: 40px 20px;
            max-width: 1000px;
            margin: 0 auto;
            display: flex; /* Dùng Flexbox để chia 2 cột */
            gap: 40px;
            align-items: flex-start;
        }

        .contact-info, .contact-form-container {
            flex: 1; /* Mỗi phần chiếm 50% chiều rộng */
        }

        .contact-info h2, .contact-form-container h2 {
            color: #b22222; /* Màu đỏ đậm, lấy từ menu */
            border-bottom: 2px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .info-item {
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .info-item strong {
            display: block;
            color: #333;
            font-weight: bold;
            margin-bottom: 5px;
        }

        /* Form Styling */
        .contact-form-container form {
            background: #fff;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        .contact-form-container label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
            color: #444;
        }

        .contact-form-container input[type="text"],
        .contact-form-container input[type="email"],
        .contact-form-container textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Quan trọng để padding không làm tăng chiều rộng */
        }

        .contact-form-container textarea {
            height: 120px;
            resize: vertical;
        }

        .contact-form-container button {
            background-color: #b22222;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .contact-form-container button:hover {
            background-color: #8b0000;
        }

        /* Responsive cho màn hình nhỏ hơn */
        @media (max-width: 768px) {
            .contact-page-main {
                flex-direction: column;
            }
        }
    </style>

    <div class="contact-info">
        <h2>Thông Tin Liên Hệ</h2>
        <p>Nếu bạn có bất kỳ thắc mắc, yêu cầu hợp tác, hoặc phản hồi về sản phẩm bánh kẹo, vui lòng liên hệ với chúng tôi qua các thông tin dưới đây.</p>
        
        <div class="info-item">
            <strong>🏠 Địa chỉ Trụ sở chính:</strong>
            Thị trấn Bần Yên Nhân, Huyện Mỹ Hào, Tỉnh Hưng Yên.
        </div>
        
        <div class="info-item">
            <strong>📍 Văn phòng Hà Nội:</strong>
            255 Minh Khai, Quận Hai Bà Trưng, TP Hà Nội.
        </div>
        
        <div class="info-item">
            <strong>📞 Điện thoại:</strong>
            <a href="tel:0975447658">0975 447 658</a>
        </div>
        
        <div class="info-item">
            <strong>✉️ Email Hỗ trợ:</strong>
            <a href="mailto:vienman.banhkeo@gmail.com">vienman.banhkeo@gmail.com</a>
        </div>
        
        <div class="info-item">
            <strong>🌐 Website:</strong>
            <a href="https://vienman.vn" target="_blank">https://vienman.vn</a>
        </div>

        <div class="map-container" style="margin-top: 20px;">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.155792942858!2d105.84501257422176!3d20.9859577884814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac561f6522c1%3A0x6a0a09e0721245b0!2zMjU1IE1pbmggS2hhaSwgVHLGsG5nIE1pLCBIYWkgQsOgIFRyxrBuZywgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1698205421715!5m2!1svi!2s" 
                width="100%" 
                height="300" 
                style="border:0; border-radius: 8px;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
    
    <div class="contact-form-container">
        <h2>Gửi Yêu Cầu Cho Chúng Tôi</h2>
        <form method="post" action="lienhe.php">
            
            <label for="ten">Họ và tên:</label>
            <input type="text" id="ten" name="ten" placeholder="Ví dụ: Nguyễn Văn A" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Ví dụ: email@example.com" required>
            
            <label for="noidung">Nội dung yêu cầu:</label>
            <textarea id="noidung" name="noidung" placeholder="Xin chào, tôi muốn hỏi về..." required></textarea>
            
            <button type="submit">Gửi Tin Nhắn</button>
        </form>
    </div>

</main>

<?php include 'footer.php'; ?>