
# Web iPhone New - Cấu Hình
## Canva full images : https://www.canva.com/design/DAGCkQjpjGc/sh-Zwwkml5G_W9zSA2X2IQ/edit
## Cấu Hình Cơ Sở Dữ Liệu

Trước khi bắt đầu, hãy cấu hình thông tin kết nối cơ sở dữ liệu trong tệp `config.php`.
Tạo csdl dựa theo file sql cung cấp đặt tên là web_iphone_new
### 1. Cấu Hình Cơ Sở Dữ Liệu
Trong tệp `config.php` trong admin, thiết lập thông tin kết nối cơ sở dữ liệu của bạn như sau:

```php
<?php 
define("DB_HOST", "localhost"); // Địa chỉ máy chủ cơ sở dữ liệu
define("DB_USER", "root"); // Tên người dùng cơ sở dữ liệu
define("DB_PASS", ""); // Mật khẩu cơ sở dữ liệu
define("DB_NAME", "web_iphone_new"); // Tên cơ sở dữ liệu
?>
```

### 2. Cấu Hình Email trong confirm_Cart.php

Trong phần gửi email, bạn cần cấu hình thông tin tài khoản email gửi thông báo. Sử dụng PHPMailer để gửi email qua Gmail.

#### Cấu Hình Email:

```php
<?php
$email_admin = 'thong2024mail@gmail.com'; // Địa chỉ email người gửi
$email_admin_password = 'pbpm tite zepl xxxxxx'; // Mật khẩu ứng dụng Gmail

$mail = new PHPMailer(true);
try {
    // Thiết lập thông tin máy chủ SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Địa chỉ máy chủ SMTP
    $mail->SMTPAuth = true;
    $mail->Username = $email_admin; // Tên đăng nhập SMTP
    $mail->Password = $email_admin_password; // Mật khẩu SMTP
    $mail->SMTPSecure = 'tls'; // Phương thức bảo mật
    $mail->Port = 587; // Cổng SMTP
    // Tiếp tục phần cấu hình và gửi email...
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
```

### Lưu Ý:
- **Mật khẩu ứng dụng Gmail**: Bạn cần tạo mật khẩu ứng dụng cho Gmail của bạn nếu đang sử dụng tính năng bảo mật 2 lớp.
- **Cơ sở dữ liệu**: Đảm bảo đã tạo cơ sở dữ liệu `web_iphone_new` trong MySQL và có quyền truy cập.

## Hướng Dẫn Sử Dụng

1. Tải các thư viện cần thiết như PHPMailer nếu cần thiết
2. Đảm bảo máy chủ SMTP của bạn hoạt động tốt, có thể gửi email.
3. Chạy ứng dụng và kiểm tra việc gửi email sau khi đặt hàng thành công.

```

### Mô Tả:
- `config.php` chứa cấu hình cơ sở dữ liệu và email.
- `email_admin_password` là mật khẩu ứng dụng của Gmail, bạn phải tạo một mật khẩu riêng cho ứng dụng trong tài khoản Gmail của bạn (nếu bật bảo mật 2 lớp).
