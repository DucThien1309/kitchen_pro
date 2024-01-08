<?php

require_once "model/Connect.php";

class SignIn
{
    private $quanli = "quanli";
    private $daubep = "daubep";
    private $nhanvien = "nhanvien";
    private $phucvu = "phucvu";
    private $taikhoan = "taikhoan";

    public function processLogin($param01, $param02)
    {
        $user = $_POST["user"];
        $pass = $_POST["password"];
        $role = $param02;

        //special character checking for prevent sql injection attack
        $pass = mysqli_real_escape_string((new Connect())->cnt(), $pass);

        switch ($role) {
            case 1:
                $sql = "select * from taikhoan join {$this->quanli} 
                    on {$this->quanli}.MaTaiKhoan = {$this->taikhoan}.MaTaiKhoan
                    where TaiKhoan = '$user'";
                $result = (new Connect())->select($sql);
                $number_rows = mysqli_num_rows($result);

                //check unique TaiKhoan
                if ($number_rows == 1) {
                    $each = mysqli_fetch_array($result);

                    //compare user' password is entered with password hashing in database
                    if (password_verify($pass, $each["MatKhau"])) {
                        if(!isset($_SESSION)) { 
                            session_start();
                        }
                        $_SESSION["id"] = $each["MaQuanLi"];
                        $_SESSION["name"] = $each["HoTen"];
                        $_SESSION["role"] = $each["role"];
                        $_SESSION["start"] = time(); // Taking now logged in time.
                        // Ending a session in 30 minutes from the starting time.
                        $_SESSION["expire"] = $_SESSION["start"] + (15 * 60);
                        header("Location: ?controller=quan_li");
                        exit();
                    } else {
                        header("Location: ?controller=dang_nhap&role=1&error=Mật khẩu không chính xác!!!");
                        exit();
                    }
                }
                header("Location: ?controller=dang_nhap&role=1&error=Thông tin đăng nhập sai rồi!!!");
                break;

            case 2:
                $sql = "select * from taikhoan join {$this->daubep} 
                        on {$this->daubep}.MaTaiKhoan = {$this->taikhoan}.MaTaiKhoan
                        where TaiKhoan = '$user'";
                $result = (new Connect())->select($sql);
                $number_rows = mysqli_num_rows($result);

                //check unique TaiKhoan
                if ($number_rows == 1) {
                    $each = mysqli_fetch_array($result);

                    //compare user' password is entered with password hashing in database
                    if (password_verify($pass, $each["MatKhau"])) {
                        if(!isset($_SESSION)) { 
                            session_start();
                        }
                        $_SESSION["id"] = $each["MaDauBep"];
                        $_SESSION["name"] = $each["HoTen"];
                        $_SESSION["role"] = $each["role"];
                        $_SESSION["start"] = time(); // Taking now logged in time.
                        // Ending a session in 30 minutes from the starting time.
                        $_SESSION["expire"] = $_SESSION["start"] + (15 * 60);
                        header("Location: ?controller=dau_bep");
                        exit();
                    } else {
                        header("Location: ?controller=dang_nhap&role=1&error=Mật khẩu không chính xác!!!");
                        exit();
                    }
                }
                header("Location: ?controller=dang_nhap&role=2&error=Thông tin đăng nhập sai rồi!!!");
                break;

            case 3:
                $sql = "select * from taikhoan join {$this->nhanvien} 
                        on {$this->nhanvien}.MaTaiKhoan = {$this->taikhoan}.MaTaiKhoan
                        where TaiKhoan = '$user'";
                $result = (new Connect())->select($sql);
                $number_rows = mysqli_num_rows($result);

                //check unique TaiKhoan
                if ($number_rows == 1) {
                    $each = mysqli_fetch_array($result);

                    //compare user' password is entered with password hashing in database
                    if (password_verify($pass, $each["MatKhau"])) {
                        if(!isset($_SESSION)) { 
                            session_start();
                        }
                        $_SESSION["id"] = $each["MaNhanVien"];
                        $_SESSION["name"] = $each["HoTen"];
                        $_SESSION["role"] = $each["role"];
                        $_SESSION["start"] = time(); // Taking now logged in time.
                        // Ending a session in 30 minutes from the starting time.
                        $_SESSION["expire"] = $_SESSION["start"] + (15 * 60);
                        header("Location: ?controller=nhan_vien");
                        exit();
                    } else {
                        header("Location: ?controller=dang_nhap&role=3&error=Mật khẩu không chính xác!!!");
                        exit();
                    }
                }
                header("Location: ?controller=dang_nhap&role=3&error=Thông tin đăng nhập sai rồi!!!");
                break;

            case 4:
                $sql = "select * from taikhoan join {$this->phucvu} 
                            on {$this->phucvu}.MaTaiKhoan = {$this->taikhoan}.MaTaiKhoan
                            where TaiKhoan = '$user'";
                $result = (new Connect())->select($sql);
                $number_rows = mysqli_num_rows($result);

                //check unique TaiKhoan
                if ($number_rows == 1) {
                    $each = mysqli_fetch_array($result);

                    //compare user' password is entered with password hashing in database
                    if (password_verify($pass, $each["MatKhau"])) {
                        if(!isset($_SESSION)) { 
                            session_start();
                        }
                        $_SESSION["id"] = $each["MaPhucVu"];
                        $_SESSION["name"] = $each["HoTen"];
                        $_SESSION["role"] = $each["role"];
                        $_SESSION["start"] = time(); // Taking now logged in time.
                        // Ending a session in 30 minutes from the starting time.
                        $_SESSION["expire"] = $_SESSION["start"] + (15 * 60);
                        header("Location: ?controller=phuc_vu");
                        exit();
                    } else {
                        header("Location: ?controller=dang_nhap&role=3&error=Mật khẩu không chính xác!!!");
                        exit();
                    }
                }
                header("Location: ?controller=dang_nhap&role=3&error=Thông tin đăng nhập sai rồi!!!");
                break;

            default:
                echo "Loại người dùng không phù hợp!!!";
                break;
        }
    }
}
