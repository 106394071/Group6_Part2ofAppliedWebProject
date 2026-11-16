<?php
// Gọi header và nav chung của trang web
include("header.inc");
include("nav.inc");
include_once("settings.php"); // Kết nối database
?>

<main class="manage-container">
    <h2>Quản lý đơn ứng tuyển (EOI Management)</h2>

    <!-- Form tìm kiếm đơn ứng tuyển -->
    <form method="GET" action="manage.php" class="search-form">
        <label for="job_ref">Tìm theo mã công việc (Job Reference):</label>
        <input type="text" id="job_ref" name="job_ref" value="<?php echo htmlspecialchars($_GET['job_ref'] ?? ''); ?>">
        
        <label for="search_name">Hoặc tìm theo Tên/Họ:</label>
        <input type="text" id="search_name" name="search_name" value="<?php echo htmlspecialchars($_GET['search_name'] ?? ''); ?>">
        
        <button type="submit">Tìm kiếm</button>
        <a href="manage.php" class="reset-btn">Hiển thị tất cả</a>
    </form>

    <?php
    // Xây dựng câu truy vấn dựa trên điều kiện tìm kiếm của người dùng
    $sql = "SELECT * FROM eoi WHERE 1=1";
    
    $job_ref = trim($_GET['job_ref'] ?? '');
    $search_name = trim($_GET['search_name'] ?? '');

    if (!empty($job_ref)) {
        $job_ref = mysqli_real_escape_string($conn, $job_ref);
        $sql .= " AND JobReference LIKE '%$job_ref%'";
    }

    if (!empty($search_name)) {
        $search_name = mysqli_real_escape_string($conn, $search_name);
        $sql .= " AND (FirstName LIKE '%$search_name%' OR LastName LIKE '%$search_name%')";
    }

    $result = mysqli_query($conn, $sql);

    // Hiển thị kết quả dưới dạng bảng
    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table class='eoi-table' border='1' cellpadding='10' cellspacing='0'>";
        echo "<thead><tr>
                <th>Mã EOI</th>
                <th>Mã Job</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Trạng thái</th>
              </tr></thead><tbody>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['EOInumber']) . "</td>";
            echo "<td>" . htmlspecialchars($row['JobReference']) . "</td>";
            echo "<td>" . htmlspecialchars($row['FirstName'] . " " . $row['LastName']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['PhoneNumber']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Status']) . "</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p>Không tìm thấy đơn ứng tuyển nào phù hợp.</p>";
    }

    // Đóng kết nối
    mysqli_close($conn);
    ?>
</main>

<?php
// Gọi footer chung
include("footer.inc");
?>        