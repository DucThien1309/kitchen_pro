<?php
require_once 'model/Connect1.php';

class MonAnController02
{
    public function loadComboBoxMonAn($selectedValue = null)
    {
        $db = new Database();
        $conn = $db->connect();

        $result = $db->excute("SELECT MaMon, TenMonAn FROM monan");

        if ($result->num_rows > 0) {
            echo '<select name="monan" id="monan">';
            while ($row = $result->fetch_assoc()) {
                $selected = ($row['MaMon'] == $selectedValue) ? 'selected' : '';
                echo "<option value='" . $row['MaMon'] . "' " . $selected . ">" . $row['TenMonAn'] . "</option>";
            }
            echo '</select>';
        } else {
            echo 'Không có món ăn nào.';
        }

        $conn->close();
    }

    public function loadComboBoxNguyenLieu($selectedValue = null)
    {
        $db = new Database();
        $conn = $db->connect();

        $result = $db->excute("SELECT MaNguyenLieu, TenNguyenLieu FROM nguyenlieu");

        if ($result->num_rows > 0) {
            echo '<select name="nguyenlieu" id="nguyenlieu">';
            while ($row = $result->fetch_assoc()) {
                $selected = ($row['MaNguyenLieu'] == $selectedValue) ? 'selected' : '';
                echo "<option value='" . $row['MaNguyenLieu'] . "' " . $selected . ">" . $row['TenNguyenLieu'] . "</option>";
            }
            echo '</select>';
        } else {
            echo 'Không có nguyên liệu nào.';
        }

        $conn->close();
    }
}

// Xử lý yêu cầu từ người dùng
$MonAnController02 = new MonAnController02();
?>
