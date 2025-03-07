<?php
include("conn.php");
include("clogin.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <style>
        body {
            font-family: "Kanit", sans-serif;
            background-color: #e6f2e6; /* Light green background */
            margin: 0;
            padding: 20px;
        }

        .page-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,128,0,0.1); /* Green-tinted shadow */
            padding: 30px;
            border: 2px solid #2ecc71; /* Bright green border */
        }

        h1 {
            color: #2c7c34; /* Forest green */
            font-weight: 700;
            margin-bottom: 20px;
            border-bottom: 3px solid #27ae60; /* Emerald green */
            padding-bottom: 10px;
        }

        .form-control, .form-select {
            border-radius: 5px;
            border-color: #2ecc71; /* Bright green */
        }

        .btn-primary {
            background-color: #2ecc71; /* Bright green */
            border-color: #27ae60;
        }

        .btn-primary:hover {
            background-color: #27ae60;
            border-color: #2c7c34;
        }

        .btn-danger {
            background-color: #e74c3c;
            border-color: #c0392b;
        }

        .btn-danger:hover {
            background-color: #c0392b;
            border-color: #a93226;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #2c7c34; /* Forest green */
            font-size: 0.9em;
        }

        .table {
            margin-top: 20px;
        }

        .table thead {
            background-color: #2ecc71; /* Bright green header */
            color: white;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f0f7f0; /* Very light green */
        }

        .table-hover tbody tr:hover {
            background-color: #d4edda; /* Soft green hover */
        }

        @media (max-width: 768px) {
            .page-container {
                padding: 15px;
            }
        }
    </style>

    <title>ข้อมูลพนักงาน</title>
</head>

<body>
    <div class="container page-container">
        <?php
        if (isset($_GET['action_even']) == 'delete') {
            $employee_id = $_GET['employee_id'];
            $sql = "SELECT * FROM employees WHERE employee_id=$employee_id";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $sql = "DELETE FROM employees WHERE employee_id =$employee_id";

                if ($conn->query($sql) === TRUE) {
                    echo "<div class='alert alert-success text-center'>ลบข้อมูลสำเร็จ</div>";
                } else {
                    echo "<div class='alert alert-danger text-center'>ลบข้อมูลมีข้อผิดพลาด กรุณาตรวจสอบ !!! </div>" . $conn->error;
                }
            } else {
                echo "<div class='alert alert-warning text-center'>ไม่พบข้อมูล กรุณาตรวจสอบ</div>";
            }
        }
        ?>
        
        <h1 class="text-center">ข้อมูลพนักงาน</h1>
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <p class="mb-0">ผู้เข้าสู่ระบบ : <?php echo $_SESSION["u_name"]; ?> 
            หน่วยงาน : <?php echo $_SESSION["u_department"]; ?></p>
            <a href="add.php" class="btn btn-primary">เพิ่มข้อมูลพนักงาน</a>
        </div>

        <div class="table-responsive">
            <table id="example" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อพนักงาน</th>
                        <th>นามสกุล</th>
                        <th>ตำแหน่ง</th>
                        <th>เพศ</th>
                        <th>อายุ</th>
                        <th>เงินเดือน</th>
                        <th>จัดการข้อมูล</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM employees";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["employee_id"] . "</td>";
                            echo "<td>" . $row["first_name"] . "</td>";
                            echo "<td>" . $row["last_name"] . "</td>";
                            echo "<td>" . $row["department"] . "</td>";
                            echo "<td>" . $row["gender"] . "</td>";
                            echo "<td>" . $row["age"] . "</td>";
                            echo "<td>" . number_format($row["salary"], 2) . "</td>";
                            echo '<td>
                                <div class="btn-group" role="group">
                                    <a href="show.php?action_even=del&employee_id=' . $row['employee_id'] . '" 
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm(\'ต้องการจะลบข้อมูลรายชื่อ ' . $row['employee_id'] . ' ' . $row['first_name'] . ' ' . $row['last_name'] . '?\')"
                                    >
                                       ลบข้อมูล
                                    </a>
                                    <a href="edit.php?action_even=edit&employee_id=' . $row['employee_id'] . '" 
                                       class="btn btn-primary btn-sm"
                                       onclick="return confirm(\'ต้องการจะแก้ไขข้อมูลรายชื่อ ' . $row['employee_id'] . ' ' . $row['first_name'] . ' ' . $row['last_name'] . '?\')"
                                    >
                                       แก้ไขข้อมูล
                                    </a>
                                </div>
                            </td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>0 results</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>

        <div class="footer mt-4">
            พัฒนาโดย 664485046 นายอิศรา ฮวดหอม
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        new DataTable('#example', {
            language: {
                search: 'ค้นหา:',
                lengthMenu: 'แสดง _MENU_ รายการ',
                info: 'หน้า _PAGE_ จาก _PAGES_',
                infoEmpty: 'ไม่มีข้อมูล',
                zeroRecords: 'ไม่พบข้อมูล',
                paginate: {
                    first: 'หน้าแรก',
                    last: 'หน้าสุดท้าย',
                    next: 'ถัดไป',
                    previous: 'ก่อนหน้า'
                }
            }
        });
    </script>
</body>
</html>