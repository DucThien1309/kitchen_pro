<?php

require_once 'model/Connect.php';

class MonAn
{
    //Nam's code start -----------------------------
    private $table = 'loaimonan';
    private $table3 = 'monan';
    private $table4 = 'donhang';
    private $table5 = 'chitietdonhang';
    private $table7 = 'hoadon';
    // in ra món ăn
    public function all(): array
    {
        $category = isset($_GET['category']) ? $_GET['category'] : '';
        if ($category === 'mon-xao') {
            $sql = "SELECT * FROM $this->table3 where MaLoaiMonAn = '1'";
        } elseif ($category === 'mon-kho') {
            $sql = "SELECT * FROM $this->table3 where MaLoaiMonAn = '2'";
        } elseif ($category === 'mon-chien') {
            $sql = "SELECT * FROM $this->table3 where MaLoaiMonAn = '3'";
        } elseif ($category === 'mon-canh') {
            $sql = "SELECT * FROM $this->table3 where MaLoaiMonAn = '4'";
        } elseif ($category === 'nuoc-uong') {
            $sql = "SELECT * FROM $this->table3 where MaLoaiMonAn = '5'";
        } elseif ($category === 'mon-com') {
            $sql = "SELECT * FROM $this->table3 where MaLoaiMonAn = '6'";
        } elseif ($category === 'trang-mieng') {
            $sql = "SELECT * FROM $this->table3 where MaLoaiMonAn = '7'";
        } elseif ($category === 'trai-cay') {
            $sql = "SELECT * FROM $this->table3 where MaLoaiMonAn = '8'";
        } elseif ($category === 'mon-chay') {
            $sql = "SELECT * FROM $this->table3 where MaLoaiMonAn = '9'";
        } else {
            $sql = "SELECT * FROM $this->table3";
        }
        $connect = new Connect();
        $result = $connect->select($sql);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (file_exists("view/assets/img/" . $row['HinhAnh'])) {
                    $row['HinhAnh'] = "<img src='view/assets/img/" . $row['HinhAnh'] . "' alt='Hình ảnh món ăn' style='width:100px; height:100px;'>";
                } else {
                    $row['HinhAnh'] = "<p>Hình ảnh không tồn tại</p>";
                }
                $data[] = $row;
            }
        }
        return $data;
    }
    // in ra loại món ăn


    public function getAllDishCategories()
    {
        $sql = "SELECT * FROM loaimonan";
        $connect = new Connect();
        $result = $connect->select($sql);

        $categories = array();
        while ($row = $result->fetch_assoc()) {
            $categoryId = $row['MaLoaiMonAn'];
            $categories[] = array(
                "id" => $categoryId,
                "name" => $row['TenLoaiMonAn']
            );
        }

        return $categories;
    }

        // private $table = 'loaimonan';
        public function allLoaiMonAn(): array
        {
            $sql = "SELECT * FROM $this->table";
            $connect = new Connect();
            $result = $connect->select($sql);
            $data = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            return $data;
        }

    public function getDishes($categoryId)
    {
        $sql = "SELECT * FROM monan WHERE MaLoaiMonAn = $categoryId";
        $connect = new Connect();
        $result = $connect->select($sql);

        $dishes = array();
        while ($row = $result->fetch_assoc()) {
            $dishes[] = $row;
        }

        return $dishes;
    }


    // Hàm upload hình ảnh
    private function uploadImage(): string
    {
        $target_dir = "view/assets/img/"; // Thư mục lưu trữ hình ảnh
        $target_file = $target_dir . basename($_FILES["HinhAnh"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Kiểm tra xem tệp có phải là hình ảnh thực sự không
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["HinhAnh"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                echo "File không phải là hình ảnh.";
                $uploadOk = 0;
            }
        }

        // Kiểm tra kích thước tệp
        if ($_FILES["HinhAnh"]["size"] > 500000) {
            echo "Xin lỗi, tệp của bạn quá lớn.";
            $uploadOk = 0;
        }

        // Cho phép chỉ tải lên các loại tệp hình ảnh cụ thể
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Xin lỗi, chỉ chấp nhận các tệp JPG, JPEG, PNG và GIF.";
            $uploadOk = 0;
        }

        // Kiểm tra xem $upload có bị lỗi không
        if ($uploadOk == 0) {
            echo "Xin lỗi, tệp của bạn không được tải lên.";
        } else {
            if (move_uploaded_file($_FILES["HinhAnh"]["tmp_name"], $target_file)) {
                return basename($_FILES["HinhAnh"]["name"]);
            } else {
                echo "Xin lỗi, đã xảy ra lỗi khi tải lên tệp của bạn.";
            }
        }
        return '';
    }
    // add món ăn mới vào csdl
    public function storenewdish($params): void
    {
        $tenMonAn = $params['TenMonAn'];
        $hinhAnh = $this->uploadImage(); // Gọi hàm upload hình ảnh
        $moTaMonAn = $params['MoTaMonAn'];
        $giaMonAn = $params['GiaMonAn'];
        $maLoaiMonAn = $params['MaLoaiMonAn'];
        $sql = "INSERT INTO $this->table3 (TenMonAn, HinhAnh, MoTaMonAn, GiaMonAn, MaLoaiMonAn) 
                VALUES ('$tenMonAn', '$hinhAnh', '$moTaMonAn', '$giaMonAn', '$maLoaiMonAn')";
        // die($sql);
        (new Connect())->execute($sql);
    }

    //xóa món ăn
    public function delete($maMon): void
    {
        $sql = "DELETE FROM $this->table3 WHERE MaMon = '$maMon'";
        (new Connect())->execute($sql);
    }
    // tìm kiếm mã món ăn
    public function find($maMon): array
    {
        $sql = "SELECT * FROM $this->table3 WHERE MaMon = '$maMon'";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_assoc($result);
        return $each;
    }
    // Update món ăn
    public function update($params): void
    {
        $maMon = $params['MaMon'];
        $ten = $params['TenMonAn'];
        $motamonan = $params['MoTaMonAn'];
        $giamonan = $params['GiaMonAn'];
        $maloaimonan = $params['MaLoaiMonAn'];
        if (isset($_FILES["HinhAnh"]) && $_FILES["HinhAnh"]["size"] > 0) {
            $hinhanh = $this->uploadImage();
            $sql = "UPDATE $this->table3
            SET TenMonAn = '$ten', HinhAnh = '$hinhanh', MoTaMonAn = '$motamonan', GiaMonAn = '$giamonan', MaLoaiMonAn = '$maloaimonan' 
            WHERE MaMon = '$maMon'";
            (new Connect())->execute($sql);
        } else {
            $sql = "UPDATE $this->table3
            SET TenMonAn = '$ten', MoTaMonAn = '$motamonan', GiaMonAn = '$giamonan', MaLoaiMonAn = '$maloaimonan' 
            WHERE MaMon = '$maMon'";
            (new Connect())->execute($sql);
        }
    }
    // Xem thống kê doanh thu
    public function viewrevenue(): array
    {
        $sql = "SELECT DATE_FORMAT(`ThoiGianDatMon`, '%M') as MonthName, 
        SUM(GiaMonAn) as amount 
        FROM `donhang` d 
        JOIN `chitietdonhang` c ON d.MaDonHang = c.MaDonHang
        JOIN `monan` m  on c.MaMon = m.MaMon 
        GROUP BY MONTH(`ThoiGianDatMon`)";
        $result = (new Connect())->select($sql);
        $month = [];
        $amount = [];
        while ($data = $result->fetch_assoc()) {
            $month[] = $data['MonthName'];
            $amount[] = $data['amount'];
        }
        return ['month' => $month, 'amount' => $amount]; // Changed the key to 'month'
    }
    // Xem thống kê món ăn được đặt nhiều nhất
    public function viewfood(): array
    {
        $sql = "SELECT TenMonAn, sum(SoLuong) as SoLuong
        from `monan` m JOIN `chitietdonhang` c on m.MaMon = c.MaMon
        group by TenMonAn";
        $result = (new Connect())->select($sql);
        $foodname = [];
        $quantity = [];
        while ($data = $result->fetch_assoc()) {
            $foodname[] = $data['TenMonAn'];
            $quantity[] = $data['SoLuong'];
        }
        return ['foodname' => $foodname, 'quantity' => $quantity];
    }
    // Xem đề xuất món ăn của nhân viên
    public function viewsuggest(): array
    {
        $sql = "SELECT * FROM $this->table2";
        $connect = new Connect();
        $result = $connect->select($sql);
        $data = [];
        if ($result->num_rows > 0) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if (file_exists("view/assets/img/" . $row['HinhMinhHoa'])) {
                        $row['HinhMinhHoa'] = "<img src='view/assets/img/" . $row['HinhMinhHoa'] . "' alt='Hình ảnh món ăn' style='width:100px; height:100px;'>";
                    } else {
                        $row['HinhMinhHoa'] = "<p>Hình ảnh không tồn tại</p>";
                    }
                    $data[] = $row;
                }
            }
            return $data;
        }
    }

    // NHÂN VIÊN
    // add món ăn nhân viên đề xuất vào csdl
    private $table2 = 'monandexuat';
    public function create($params): void
    {
        $tenMonAn = $params['TenMonAn'];
        $hinhMinhHoa = $this->uploadImageSuggest(); // Gọi hàm upload hình ảnh
        $moTa = $params['MoTa'];
        $maNhanVien = 1;
        $sql = "INSERT INTO $this->table2(TenMonAn,MoTa,HinhMinhHoa,MaNhanVien) 
        VALUES ('$tenMonAn','$moTa','$hinhMinhHoa','$maNhanVien')";
        (new Connect())->execute($sql);
    }

    // Hàm upload hình ảnh
    // Hàm upload hình ảnh
    private function uploadImageSuggest(): string
    {
        $target_dir = "view/assets/img/"; // Thư mục lưu trữ hình ảnh
        $target_file = $target_dir . basename($_FILES["HinhMinhHoa"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Kiểm tra xem tệp có phải là hình ảnh thực sự không
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["HinhMinhHoa"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                echo "File không phải là hình ảnh.";
                $uploadOk = 0;
            }
        }

        // Kiểm tra kích thước tệp
        if ($_FILES["HinhMinhHoa"]["size"] > 500000) {
            echo "Xin lỗi, tệp của bạn quá lớn.";
            $uploadOk = 0;
        }

        // Cho phép chỉ tải lên các loại tệp hình ảnh cụ thể
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Xin lỗi, chỉ chấp nhận các tệp JPG, JPEG, PNG và GIF.";
            $uploadOk = 0;
        }

        // Kiểm tra xem $upload có bị lỗi không
        if ($uploadOk == 0) {
            echo "Xin lỗi, tệp của bạn không được tải lên.";
        } else {
            if (move_uploaded_file($_FILES["HinhMinhHoa"]["tmp_name"], $target_file)) {
                return basename($_FILES["HinhMinhHoa"]["name"]);
            } else {
                echo "Xin lỗi, đã xảy ra lỗi khi tải lên tệp của bạn.";
            }
        }
        return '';
    }

    // add đơn hàng vào danh sách đơn hàng và add thông tin vào chi tiết đơn hàng
    // add vào bảng đơn hàng

    public function store($params): void
    {
        $maNhanVien = $_SESSION["id"];
        $ngayDatMon = $params['ngayDatMon'];
        $ngayNhanMon = $params['ngayNhanMon'];
        $ghiChu = $params['ghiChu'];

        $connection = new Connect();

        // Thực hiện câu lệnh INSERT vào bảng donhang
        $sqlDonHang = "INSERT INTO $this->table4 (ThoiGianDatMon,ThoiGianNhanMon,TrangThaiDonHang,TrangThaiGiaoMon,GhiChu,MaNhanVien) 
            VALUES ('$ngayDatMon','$ngayNhanMon',0,0,'$ghiChu','$maNhanVien')";
        $connection->execute($sqlDonHang);
        // Lấy giá trị AUTO_INCREMENT của bảng donhang
        $maDonHang = $connection->getLastInsertId();

        // add vào chi tiết đơn hàng
        if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
            foreach ($_SESSION['giohang'] as $item) {
                // $maDonHang = 1;
                $maMon = $item[0];
                $soLuong = $item[4];
                // echo "Mã đơn hàng là: " .$maDonHang ."<br>";
                // echo "Mã món là: " .$maMon ."<br>";
                // echo "Số lượng là: " .$soLuong ."<br>";
                // Thực hiện câu lệnh INSERT vào bảng chitietdonhang
                $sqlChiTietDonHang = "INSERT INTO $this->table5 (MaDonHang, MaMon, SoLuong) VALUES ('$maDonHang','$maMon','$soLuong')";
                (new Connect())->execute($sqlChiTietDonHang);
            }
        }
        // add vào bảng hóa đơn
        $maDonHang = $connection->getLastInsertId();
        if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
            $tongGiaTri = $params['tongGiaTri'];
        }
        $sqlhoadon = "INSERT INTO $this->table7(TongTien,MaDonHang) values('$tongGiaTri','$maDonHang') ";
        (new Connect())->execute($sqlhoadon);
        
        $sql = "INSERT INTO thanhtoan_vnpay (TongTienThanhToan, MaNhanVien)
                SELECT SUM(hoadon.TongTien) as TongTien, nhanvien.MaNhanVien from nhanvien JOIN donhang 
                ON nhanvien.MaNhanVien = donhang.MaNhanVien JOIN hoadon ON 
                hoadon.MaDonHang = donhang.MaDonHang WHERE nhanvien.MaNhanVien = $maNhanVien";
        (new Connect())->execute($sql);
    }

    // view tất cả danh sách đơn hàng
    public function alldonhang(): array
    {
        $manv = $_SESSION['id'];
        $sql = "SELECT * FROM $this->table4 t4 join nhanvien nv on t4.MaNhanVien = nv.MaNhanVien where nv.MaNhanVien = $manv order by MaDonHang desc";
        $connect = new Connect();
        $result = $connect->select($sql);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        
        return $data;
    }
    // tìm kiếm mã đơn hàng view ra chi tiết đơn hàng

    public function finddonhang($maDonHang): array
    {
        $sql = "SELECT nv.MaNhanVien, HoTen, TenMonAn, GiaMonAn, HinhAnh, SoLuong, ThoiGianNhanMon, ThoiGianDatMon, GhiChu, TrangThaiDonHang, TrangThaiGiaoMon 
        FROM $this->table5 t5 join $this->table3 t3 on t5.MaMon = t3.MaMon 
        join $this->table4 t4 on t5.MaDonHang = t4.MaDonHang join nhanvien nv ON nv.MaNhanVien = t4.MaNhanVien
        WHERE t5.MaDonHang = '$maDonHang'";
        $connect = new Connect();
        // die($sql);
        $result = $connect->select($sql);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (file_exists("view/assets/img/" . $row['HinhAnh'])) {
                    $row['HinhAnh'] = "<img src='view/assets/img/" . $row['HinhAnh'] . "' alt='Hình ảnh món ăn' style='width:100px; height:100px;'>";
                } else {
                    $row['HinhAnh'] = "<p>Hình ảnh không tồn tại</p>";
                }
                $data[] = $row;
            }
        }
        // print_r($data);
        return $data;
    }
    // nhân viên xem món ăn mà mình đề xuất
    public function viewownsuggest(): array
    {
        $sql = "SELECT * FROM $this->table2 where MaNhanVien = 1";
        $connect = new Connect();
        $result = $connect->select($sql);
        $data = [];
        if ($result->num_rows > 0) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if (file_exists("view/assets/img/" . $row['HinhMinhHoa'])) {
                        $row['HinhMinhHoa'] = "<img src='view/assets/img/" . $row['HinhMinhHoa'] . "' alt='Hình ảnh món ăn' style='width:100px; height:100px;'>";
                    } else {
                        $row['HinhMinhHoa'] = "<p>Hình ảnh không tồn tại</p>";
                    }
                    $data[] = $row;
                }
            }
            return $data;
        }
    }
    //Nam's code end -----------------------------

    public function allArr()
    {
        $sql = "select * from $this->table3";
        $result = (new Connect())->select($sql);
        return $result;
    }
}