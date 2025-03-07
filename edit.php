<!DOCTYPE html>
<html lang="en">
<?php
include("conn.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        .edit-container {
            background-color: #f0fff0;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            padding: 40px;
            width: 100%;
            max-width: 600px;
            border: 2px solid #c0e0c0;
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

    <title>แก้ไขข้อมูลพนักงาน</title>
</head>

<body>
    <svg class="leaf-decoration leaf-top-left" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
        <path d="M10 90 Q50 50, 90 10 Q70 30, 50 50 Q30 70, 10 90" fill="#2e7d32" />
    </svg>
    <svg class="leaf-decoration leaf-bottom-right" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
        <path d="M10 90 Q50 50, 90 10 Q70 30, 50 50 Q30 70, 10 90" fill="#2e7d32" />
    </svg>

    <div class="edit-container">
        <?php
        if(isset($_GET['action_even'])=='edit'){
            $employee_id=$_GET['employee_id'];
            $sql="SELECT * FROM employees WHERE employee_id=$employee_id";
            $result=$conn->query($sql);
            if($result->num_rows>0){
                $row=$result->fetch_assoc();
            }else{
                echo"ไม่พบข้อมูลที่ต้องการแก้ไข กรุณาตรวจสอบ";
            }
        }
        ?>
        <h1 class="text-success text-center mb-4">แก้ไขข้อมูลพนักงาน</h1>

        <form action="edit_1.php" method="POST">
            <input type="hidden" name="employee_id" value="<?php echo $row['employee_id']; ?>">
            
            <div class="row mb-3">
                <label class="col-sm-4 col-form-label text-success">รหัสพนักงาน</label>
                <div class="col-sm-8">
                    <label class="form-control bg-light"><?php echo $row['employee_id']; ?></label>
                </div>
            </div>
           
            <div class="row mb-3">
                <label class="col-sm-4 col-form-label text-success">ชื่อพนักงาน</label>
                <div class="col-sm-8">
                    <input type="text" name="first_name" class="form-control" maxlength="50" value="<?php echo $row['first_name']; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-4 col-form-label text-success">นามสกุลพนักงาน</label>
                <div class="col-sm-8">
                    <input type="text" name="last_name" class="form-control" maxlength="50" value="<?php echo $row['last_name']; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-4 col-form-label text-success">แผนก</label>
                <div class="col-sm-8">
                    <select name="department" class="form-select" aria-label="Default select example">
                        <option>กรุณาระบุแผนก</option>
                        <option value="ฝ่ายไอที" <?php if ($row['department']=='ฝ่ายไอที'){ echo "selected";} ?>>ฝ่ายไอที</option>
                        <option value="ฝ่ายบุคคล" <?php if ($row['department']=='ฝ่ายบุคคล'){ echo "selected";} ?>>ฝ่ายบุคคล</option>
                        <option value="ฝ่ายการตลาด" <?php if ($row['department']=='ฝ่ายการตลาด'){ echo "selected";} ?>>ฝ่ายการตลาด</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-4 col-form-label text-success">เพศ</label>
                <div class="col-sm-8">
                    <select name="gender" class="form-select" required>
                        <option>กรุณาระบุเพศ</option>
                        <option value="ชาย" <?php if ($row['gender']=='ชาย'){ echo "selected";} ?>>ชาย</option>
                        <option value="หญิง" <?php if ($row['gender']=='หญิง'){ echo "selected";} ?>>หญิง</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-4 col-form-label text-success">อายุ</label>
                <div class="col-sm-8">
                    <input type="number" name="age" class="form-control" min="18" max="100" value="<?php echo $row['age']; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-4 col-form-label text-success">เงินเดือน</label>
                <div class="col-sm-8">
                    <input type="number" name="salary" class="form-control" min="0" value="<?php echo $row['salary']; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-12 d-flex justify-content-between">
                    <button type="submit" class="btn btn-custom-save flex-grow-1 me-2">
                        <i class="bi bi-save me-2"></i>บันทึกข้อมูล
                    </button>
                    <a href="show.php" class="btn btn-custom-cancel flex-grow-1">
                        <i class="bi bi-x-circle me-2"></i>ยกเลิก
                    </a>
                </div>
            </div>
        </form>

        <div class="text-center mt-3 text-muted small">
        พัฒนาโดย 664485046 นายอิศรา ฮวดหอม
        </div>
    </div>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <!-- Bootstrap 5 JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>