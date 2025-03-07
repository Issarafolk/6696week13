<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts - Itim -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Itim', cursive;
        }
        .login-page {
            background-color: #e6f3e6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
            overflow: hidden;
        }
        .login-container {
            background-color: #f0fff0;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            padding: 40px;
            width: 100%;
            max-width: 400px;
            border: 2px solid #c0e0c0;
            text-align: center;
        }
        .btn-custom {
            width: 100%;
            margin-top: 15px;
            background-color: #4caf50;
            border-color: #4caf50;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #45a049;
            transform: scale(1.02);
        }
        .form-control {
            border-color: #a0d0a0;
        }
        .form-control:focus {
            border-color: #4caf50;
            box-shadow: 0 0 0 0.2rem rgba(76, 175, 80, 0.25);
        }
        .leaf-decoration {
            position: absolute;
            opacity: 0.2;
            z-index: 1;
        }
        .leaf-top-left {
            top: 20px;
            left: 20px;
            transform: rotate(-45deg);
        }
        .leaf-bottom-right {
            bottom: 20px;
            right: 20px;
            transform: rotate(135deg);
        }
    </style>
    
    <title>เข้าสู่ระบบ</title>
</head>
<body>
    <div class="login-page">
        <svg class="leaf-decoration leaf-top-left" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 90 Q50 50, 90 10 Q70 30, 50 50 Q30 70, 10 90" fill="#2e7d32" />
        </svg>
        <svg class="leaf-decoration leaf-bottom-right" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 90 Q50 50, 90 10 Q70 30, 50 50 Q30 70, 10 90" fill="#2e7d32" />
        </svg>

        <div class="login-container">
            <h1 class="text-center mb-4 text-success">เข้าสู่ระบบ</h1>
            <form action="chklogin.php" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label text-success">ชื่อผู้ใช้</label>
                    <input type="text" class="form-control" id="username" name="u_id" maxlength="30" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-success">รหัสผ่าน</label>
                    <input type="password" class="form-control" id="password" name="u_passwd" maxlength="30" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-custom">เข้าสู่ระบบ</button>
                    <button type="reset" class="btn btn-outline-success">ยกเลิก</button>
                </div>
            </form>
            <div class="text-center mt-3 text-muted small">
                พัฒนาโดย 664485046 นายอิศรา ฮวดหอม
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>