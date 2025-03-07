<!DOCTYPE html>
<html lang="en">
<?php
//เชื่อมต่อฐานข้อมูล
include("conn.php");
?>

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
            background-color: #e6f3e6;
        }
        .edit-page {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }
        .edit-container {
            background-color: #f0fff0;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            padding: 40px;
            width: 100%;
            max-width: 600px;
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
    
    <title>แก้ไขข้อมูล</title>
</head>

<body>
    <svg class="leaf-decoration leaf-top-left" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
        <path d="M10 90 Q50 50, 90 10 Q70 30, 50 50 Q30 70, 10 90" fill="#2e7d32" />
    </svg>
    <svg class="leaf-decoration leaf-bottom-right" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
        <path d="M10 90 Q50 50, 90 10 Q70 30, 50 50 Q30 70, 10 90" fill="#2e7d32" />
    </svg>

    <div class="edit-page">
        <div class="edit-container">
            <h1 class="text-center mb-4 text-success">แก้ไขข้อมูลพนักงาน</h1>
            
            <?php
            //เริ่มเก็บข้อมูล
            $employee_id = $_POST['employee_id'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $department = $_POST['department'];
            $gender = $_POST['gender'];
            $age = $_POST['age'];
            $salary = $_POST['salary'];

            //เขียนคำสั่ง SQL
            $sql = "UPDATE employees SET first_name='$first_name',last_name='$last_name',department='$department',gender='$gender',age='$age',salary='$salary' WHERE employee_id=$employee_id ";

            // รับคำสั่ง sql
            if ($conn->query($sql) === TRUE) {
                echo '<div class="alert alert-success text-center">
                    ยินดีด้วยครับคุณได้ทำการแก้ไขข้อมูล เรียบร้อย !!!
                </div>';

                echo '<div class="d-grid gap-2 mt-3">
                    <a href="show.php" class="btn btn-custom">กลับหน้าแสดงข้อมูล</a>
                </div>';
            } else {
                echo '<div class="alert alert-danger text-center">
                    มีข้อผิดพลาด: ' . $conn->error . '
                </div>';
            }
            // ปิดการเชื่อมต่อ
            $conn->close();
            ?>

            <div class="text-center mt-3 text-muted small">
                พัฒนาโดย 664485046 นายอิศรา ฮวดหอม หมู่เรียน 66/96
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>