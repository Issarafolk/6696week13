<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลพนักงาน | ระบบจัดการข้อมูลพนักงาน</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Itim', cursive;
            background-color: #e6f3e6;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .add-container {
            background-color: #f0fff0;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            padding: 40px;
            width: 100%;
            max-width: 600px;
            border: 2px solid #c0e0c0;
        }

        h1 {
            color: #2e7d32;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-label {
            color: #2e7d32;
        }

        .btn-custom-save {
            background-color: #4caf50;
            border-color: #4caf50;
            transition: all 0.3s ease;
        }

        .btn-custom-save:hover {
            transform: scale(1.02);
            background-color: #45a049;
        }

        .btn-custom-cancel {
            background-color: #dc3545;
            border-color: #dc3545;
            transition: all 0.3s ease;
        }

        .btn-custom-cancel:hover {
            transform: scale(1.02);
            background-color: #c82333;
        }

        .btn-custom-view {
            background-color: #2196f3;
            border-color: #2196f3;
            transition: all 0.3s ease;
        }

        .btn-custom-view:hover {
            transform: scale(1.02);
            background-color: #1976d2;
        }

        .leaf-decoration {
            position: fixed;
            opacity: 0.2;
            z-index: -1;
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

    <title>เพิ่มข้อมูลพนักงาน</title>
</head>

<body>
    <svg class="leaf-decoration leaf-top-left" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
        <path d="M10 90 Q50 50, 90 10 Q70 30, 50 50 Q30 70, 10 90" fill="#2e7d32" />
    </svg>
    <svg class="leaf-decoration leaf-bottom-right" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
        <path d="M10 90 Q50 50, 90 10 Q70 30, 50 50 Q30 70, 10 90" fill="#2e7d32" />
    </svg>

    <div class="container add-container">
        <h1>เพิ่มข้อมูลพนักงาน</h1>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="needs-validation" novalidate id="employeeForm">
            <div class="row mb-3">
                <label for="employee_id" class="col-sm-3 col-form-label form-label">รหัสพนักงาน</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="employee_id" name="employee_id" required>
                    <div class="invalid-feedback">
                        กรุณากรอกรหัสพนักงาน
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="first_name" class="col-sm-3 col-form-label form-label">ชื่อ</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                    <div class="invalid-feedback">
                        กรุณากรอกชื่อ
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="last_name" class="col-sm-3 col-form-label form-label">นามสกุล</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                    <div class="invalid-feedback">
                        กรุณากรอกนามสกุล
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="department" class="col-sm-3 col-form-label form-label">ตำแหน่ง</label>
                <div class="col-sm-9">
                    <select name="department" id="department" class="form-select" required>
                        <option value="" selected disabled>เลือกตำแหน่ง</option>
                        <option value="การเงิน">การเงิน</option>
                        <option value="บุคคล">บุคคล</option>
                        <option value="การตลาด">การตลาด</option>
                        <option value="ไอที">ไอที</option>
                        <option value="บริการลูกค้า">บริการลูกค้า</option>
                        <option value="คลังสินค้า">คลังสินค้า</option>
                    </select>
                    <div class="invalid-feedback">
                        กรุณาเลือกตำแหน่ง
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="gender" class="col-sm-3 col-form-label form-label">เพศ</label>
                <div class="col-sm-9">
                    <select name="gender" id="gender" class="form-select" required>
                        <option value="" selected disabled>เลือกเพศ</option>
                        <option value="ชาย">ชาย</option>
                        <option value="หญิง">หญิง</option>
                    </select>
                    <div class="invalid-feedback">
                        กรุณาเลือกเพศ
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="age" class="col-sm-3 col-form-label form-label">อายุ</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="age" name="age" min="18" max="65" required>
                    <div class="invalid-feedback">
                        กรุณากรอกอายุ (18-65)
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="salary" class="col-sm-3 col-form-label form-label">เงินเดือน</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="salary" name="salary" min="0" required>
                    <div class="invalid-feedback">
                        กรุณากรอกเงินเดือน
                    </div>
                </div>
            </div>
            
            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-custom-save me-2">
                    บันทึกข้อมูล
                </button>
                <button type="button" class="btn btn-custom-cancel me-2" onclick="window.location.href='show.php'">
                    ยกเลิก
                </button>
                <a href="show.php" class="btn btn-custom-view">
                    แสดงข้อมูล
                </a>
            </div>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Include database connection
            include("conn.php");
            
            // Get form data and sanitize inputs
            $employee_id = mysqli_real_escape_string($conn, $_POST['employee_id']);
            $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
            $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
            $department = mysqli_real_escape_string($conn, $_POST['department']);
            $gender = mysqli_real_escape_string($conn, $_POST['gender']);
            $age = mysqli_real_escape_string($conn, $_POST['age']);
            $salary = mysqli_real_escape_string($conn, $_POST['salary']);
            
            // Insert data into database
            $sql = "INSERT INTO employees (employee_id, first_name, last_name, department, gender, age, salary) 
                    VALUES ('$employee_id', '$first_name', '$last_name', '$department', '$gender', '$age', '$salary')";
            
            if ($conn->query($sql) === TRUE) {
                echo '<div class="alert alert-success mt-3 text-center">
                        บันทึกข้อมูลเรียบร้อยแล้ว
                      </div>';
            } else {
                echo '<div class="alert alert-danger mt-3 text-center">
                        เกิดข้อผิดพลาด: ' . $conn->error . '
                      </div>';
            }
            
            // Close connection
            $conn->close();
        }
        ?>

        <div class="text-center mt-3 text-muted small">
            พัฒนาโดย 664485046 นายอิศรา ฮวดหอม
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Form Validation Script -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            
            // Loop over them and prevent submission
            Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>
</html>