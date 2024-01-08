<?php
class Database
{
    private $hostname = 'localhost';
    private $username = 'root';
    private $pass = '';
    private $dbname = 'kitchen_pro';

    private $conn = NULL;
    private $result = NULL;

    public function connect()
    {
        $this->conn = new mysqli($this->hostname, $this->username, $this->pass, $this->dbname);
        if (!$this->conn) {
            echo "Kết nối thất bại";
            exit();
        } else {
            mysqli_set_charset($this->conn, 'utf8');
        }
        return $this->conn;
    }
    // Thực thi câu lệnh truy vấn
    public function excute($sql)
    {
        $this->result = $this->conn->query($sql);
        return $this->result;
    }
    // Đếm số phức bảng ghi
    public function num_rows()
    {
        if ($this->result) {
            $num = mysqli_num_rows($this->result);
        } else {
            $num = 0;
        }
        return $num;
    }
    // Phương thức lấy dữ liệu
    public function getData()
    {
        if ($this->result) {
            $data = mysqli_fetch_array($this->result);
        } else {
            $data = 0;
        }
        return $data;
    }
    // Phương thức lấy dữ liệu theo ID
    public function getDataID($table, $id)
    {
        $sql = "SELECT * FROM $table where MaNguyenLieu = '$id'";
        $this->excute($sql);
        if ($this->num_rows() != 0) {
            $data = mysqli_fetch_array($this->result);
        } else {
            $data = 0;
        }
        return $data;
    }
    // Phương thức lấy dữ liệu theo ID
    public function getDataIDTPNL($table, $id)
    {
        $sql = "SELECT * FROM $table where chitietnguyenlieumonan.MaNguyenLieu = '$id' AND chitietnguyenlieumonan.MaMon = '$id' ";
        $this->excute($sql);
        if ($this->num_rows() != 0) {
            $data = mysqli_fetch_array($this->result);
        } else {
            $data = 0;
        }
        return $data;
    }
    // Phương thức lấy toàn bộ Data
    public function getAllData($table)
    {
        $sql = "SELECT * FROM $table";
        $this->excute($sql);
        if ($this->num_rows() == 0) {
            $data = 0;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    //  Phương thức thêm dữ liệu 
    public function InsertData($TenNguyenLieu, $GiaNguyenLieu, $DonViTinh, $MoTaNguyenLieu)
    {
        $sql = "INSERT INTO nguyenlieu(MaNguyenLieu,TenNguyenLieu,GiaNguyenLieu,DonViTinh,MoTaNguyenLieu) VALUES(null,'$TenNguyenLieu','$GiaNguyenLieu','$DonViTinh','$MoTaNguyenLieu')";
        return $this->excute($sql);
    }
    // Phương thức sữa dữ liệu
    public function UpdateData($id, $TenNguyenLieu, $GiaNguyenLieu, $DonViTinh, $MoTaNguyenLieu)
    {
        $sql = "UPDATE nguyenlieu SET TenNguyenLieu = '$TenNguyenLieu',GiaNguyenLieu = '$GiaNguyenLieu',DonViTinh = '$DonViTinh',MoTaNguyenLieu = '$MoTaNguyenLieu' WHERE MaNguyenLieu = '$id'";
        return $this->excute($sql);
    }
    // Phương thức xóa
    public function Delete($id, $table)
    {
        $sql = "DELETE FROM $table WHERE MaNguyenLieu = '$id'";
        return $this->excute($sql);
    }
    // Phương thức xóa
    public function DeleteTPNL($id, $table)
    {
        $sql = "DELETE FROM $table WHERE chitietnguyenlieumonan.MaNguyenLieu = '$id' AND chitietnguyenlieumonan.MaMon = '$id'";
        return $this->excute($sql);
    }
    // Phương thức tìm kíếm
    public function SearchData($table, $key)
    {
        // Sử dụng truy vấn SQL LIKE để tìm kiếm giống chữ 
        $sql = "SELECT * FROM $table WHERE TenNguyenLieu LIKE '%$key%' ORDER BY MaNguyenLieu DESC";
        $this->excute($sql);

        if ($this->num_rows() == 0) {
            $data = 0;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas;
            }
        }

        return $data;
    }
    public function getFoodIngredientsData()
    {
        // $sql = "SELECT monan.TenMonAn, nguyenlieu.TenNguyenLieu, chitietnguyenlieumonan.SoLuong FROM monan INNER JOIN chitietnguyenlieumonan ON monan.MaMon = chitietnguyenlieumonan.MaMon INNER JOIN nguyenlieu ON chitietnguyenlieumonan.MaNguyenLieu = nguyenlieu.MaNguyenLieu;";
        // $sql = "SELECT monan.TenMonAn, nguyenlieu.TenNguyenLieu, chitietnguyenlieumonan.SoLuong, COALESCE(chitietdonhang.SoLuong, 0) AS SoLuongDonHang ,chitietnguyenlieumonan.SoLuong * chitietdonhang.SoLuong as NLCM FROM monan INNER JOIN chitietnguyenlieumonan ON monan.MaMon = chitietnguyenlieumonan.MaMon INNER JOIN nguyenlieu ON chitietnguyenlieumonan.MaNguyenLieu = nguyenlieu.MaNguyenLieu LEFT JOIN chitietdonhang ON monan.MaMon = chitietdonhang.MaMon GROUP BY monan.TenMonAn, nguyenlieu.TenNguyenLieu, chitietnguyenlieumonan.SoLuong, chitietdonhang.SoLuong;";
        // $this->excute($sql);
    //     $sql = "SELECT 
    //     monan.TenMonAn, 
    //     nguyenlieu.TenNguyenLieu, 
    //     nguyenlieu.GiaNguyenLieu,
    //     chitietnguyenlieumonan.SoLuong, 
    //     COALESCE(chitietdonhang.SoLuong, 0) AS SoLuongDonHang,
    //     chitietnguyenlieumonan.SoLuong * COALESCE(chitietdonhang.SoLuong, 0) as NLCM,
    //     (chitietnguyenlieumonan.SoLuong * COALESCE(chitietdonhang.SoLuong, 0)) * nguyenlieu.GiaNguyenLieu as TT
    // FROM 
    //     monan 
    //     INNER JOIN chitietnguyenlieumonan ON monan.MaMon = chitietnguyenlieumonan.MaMon 
    //     INNER JOIN nguyenlieu ON chitietnguyenlieumonan.MaNguyenLieu = nguyenlieu.MaNguyenLieu 
    //     LEFT JOIN chitietdonhang ON monan.MaMon = chitietdonhang.MaMon 
    // GROUP BY 
    //     monan.TenMonAn, 
    //     nguyenlieu.TenNguyenLieu, 
    //     nguyenlieu.GiaNguyenLieu,
    //     chitietnguyenlieumonan.SoLuong, 
    //     chitietdonhang.SoLuong;";
    $sql = "SELECT 
        monan.TenMonAn, 
        nguyenlieu.TenNguyenLieu, 
        nguyenlieu.GiaNguyenLieu,
        chitietnguyenlieumonan.SoLuong,
        thucdon.active,
        COALESCE(chitietdonhang.SoLuong, 0) AS SoLuongDonHang,
        chitietnguyenlieumonan.SoLuong * COALESCE(chitietdonhang.SoLuong, 0) as NLCM,
        (chitietnguyenlieumonan.SoLuong * COALESCE(chitietdonhang.SoLuong, 0)) * nguyenlieu.GiaNguyenLieu as TT
    FROM 
        thucdon JOIN thucdon_monan ON thucdon.MaThucDon = thucdon.MaThucDon
        JOIN monan ON monan.MaMon = thucdon_monan.MaMon
        INNER JOIN chitietnguyenlieumonan ON monan.MaMon = chitietnguyenlieumonan.MaMon 
        INNER JOIN nguyenlieu ON chitietnguyenlieumonan.MaNguyenLieu = nguyenlieu.MaNguyenLieu 
        LEFT JOIN chitietdonhang ON monan.MaMon = chitietdonhang.MaMon 
    GROUP BY 
        monan.TenMonAn, 
        nguyenlieu.TenNguyenLieu, 
        nguyenlieu.GiaNguyenLieu,
        chitietnguyenlieumonan.SoLuong, 
        chitietdonhang.SoLuong,
        thucdon.active
    HAVING
    	thucdon.active = 1";
$this->excute($sql);
        if ($this->num_rows() == 0) {
            $data = 0;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function getDSHD()
    {
        $sql = "SELECT hoadon.MaHoaDon,hoadon.TongTien FROM hoadon;";

        $this->excute($sql);

        if ($this->num_rows() == 0) {
            $data = 0;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function ADDTPMA($monAn, $nguyenLieu, $soLuong)
    {
        // Thực hiện INSERT vào bảng chitietmonan
        $sql = "INSERT INTO chitietnguyenlieumonan (MaMon, MaNguyenLieu, SoLuong) VALUES ('$monAn', '$nguyenLieu', '$soLuong')";
        return $this->excute($sql);
    }
    public function getDSTPMA()
    {
        // $sql = "SELECT monan.TenMonAn, nguyenlieu.TenNguyenLieu, chitietnguyenlieumonan.SoLuong FROM monan INNER JOIN chitietnguyenlieumonan ON monan.MaMon = chitietnguyenlieumonan.MaMon INNER JOIN nguyenlieu ON chitietnguyenlieumonan.MaNguyenLieu = nguyenlieu.MaNguyenLieu;";
        $sql = "SELECT monan.TenMonAn, nguyenlieu.TenNguyenLieu, chitietnguyenlieumonan.SoLuong FROM monan INNER JOIN chitietnguyenlieumonan ON monan.MaMon = chitietnguyenlieumonan.MaMon INNER JOIN nguyenlieu ON chitietnguyenlieumonan.MaNguyenLieu = nguyenlieu.MaNguyenLieu";
        $this->excute($sql);

        if ($this->num_rows() == 0) {
            $data = 0;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas;
            }
        }

        return $data;
    }
    public function kiemTraNguyenLieuTonTai($idMonAn, $idNguyenLieu)
    {
        // Thực hiện truy vấn kiểm tra trong CSDL
        $query = "SELECT COUNT(*) as count FROM chitietnguyenlieumonan 
                  WHERE MaMon = ? AND MaNguyenLieu = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $idMonAn, $idNguyenLieu);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        // Trả về true nếu nguyên liệu đã tồn tại, false nếu chưa
        return ($row['count'] > 0);
    }
}
