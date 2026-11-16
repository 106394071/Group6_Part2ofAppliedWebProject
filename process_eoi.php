<?php
include_once("settings.php"); // Kết nối database từ file settings.php

// Hàm làm sạch dữ liệu nhập vào để chống XSS/SQL Injection cơ bản
function sanitise_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Kiểm tra xem dữ liệu có được gửi bằng phương thức POST không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Lấy và làm sạch dữ liệu từ form
    $job_reference = sanitise_input($_POST['job_reference'] ?? '');
    $first_name = sanitise_input($_POST['first_name'] ?? '');
    $last_name = sanitise_input($_POST['last_name'] ?? '');
    $date_of_birth = sanitise_input($_POST['date_of_birth'] ?? '');
    $gender = sanitise_input($_POST['gender'] ?? '');
    $street_address = sanitise_input($_POST['street_address'] ?? '');
    $suburb = sanitise_input($_POST['suburb_town'] ?? '');
    $state = sanitise_input($_POST['state'] ?? '');
    $postcode = sanitise_input($_POST['postcode'] ?? '');
    $email = sanitise_input($_POST['email'] ?? '');
    $phone = sanitise_input($_POST['phone'] ?? '');
    $other_skills = sanitise_input($_POST['other_skills'] ?? '');

    // Xử lý mảng checkbox kỹ năng (skills[])
    $skills = $_POST['skills'] ?? [];
    $skill1 = $skills[0] ?? '';
    $skill2 = $skills[1] ?? '';
    $skill3 = $skills[2] ?? '';

    $err_msg = "";

    // Kiểm tra sơ bộ các trường bắt buộc không được để trống
    if (empty($job_reference) || empty($first_name) || empty($last_name) || empty($date_of_birth) || empty($gender) || empty($street_address) || empty($suburb) || empty($state) || empty($postcode) || empty($email) || empty($phone)) {
        $err_msg .= "<p>Vui lòng điền đầy đủ tất cả các trường bắt buộc.</p>";
    }

    // Nếu có lỗi thì hiển thị thông báo lỗi
    if (!empty($err_msg)) {
        echo "<h2>Đăng ký thất bại</h2>";
        echo $err_msg;
        echo "<p><a href='apply.php'>Quay lại trang đăng ký</a></p>";
    } else {
        // Sử dụng Prepared Statement để bảo mật, chống SQL Injection khi lưu vào database
        $sql = "INSERT INTO eoi (JobReference, FirstName, LastName, DOB, Gender, StreetAddress, Suburb, State, Postcode, Email, PhoneNumber, Skill1, Skill2, Skill3, OtherSkills, Status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'New')";
        
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssssssssssssss", $job_reference, $first_name, $last_name, $date_of_birth, $gender, $street_address, $suburb, $state, $postcode, $email, $phone, $skill1, $skill2, $skill3, $other_skills);
            
            if (mysqli_stmt_execute($stmt)) {
                $eoi_number = mysqli_insert_id($conn);
                echo "<h2>Ứng tuyển thành công!</h2>";
                echo "<p>Cảm ơn bạn đã nộp đơn. Mã ứng tuyển (EOI Number) của bạn là: <strong>" . $eoi_number . "</strong></p>";
                echo "<p><a href='index.php'>Về trang chủ</a></p>";
            } else {
                echo "<p>Lỗi khi lưu dữ liệu vào cơ sở dữ liệu: " . mysqli_error($conn) . "</p>";
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "<p>Lỗi câu lệnh truy vấn: " . mysqli_error($conn) . "</p>";
        }
    }

    // Đóng kết nối database
    mysqli_close($conn);

} else {
    // Nếu truy cập trực tiếp file process_eoi.php mà không qua submit form
    header("location: apply.php");
    exit();
}
?>