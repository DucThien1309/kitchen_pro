<?php
require_once "model/Connect.php";
class SignUp
{

    public $table = "taikhoan";
    public $home = "https://kitchenpro1111.000webhostapp.com/";
    public function processRegister($params)
    {
        $username = $params["username"];
        $email = $params["email"];
        $pass = $params["password"] ?? "1111";
        $role = $params["userrole"];

        // echo $params["username"];
        // echo "<br>";
        // echo $params["email"];
        // echo "<br>";
        // echo $params["password"] ?? "1111";
        // echo "<br>";
        // echo $params["userrole"];
        // echo "<br>";
        //password hashing using BCrypt, return 60 characters
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        //check unique taikhoan - email
        $sql = "Select * from taikhoan where TaiKhoan = '$email'";
        $result = (new Connect())->select($sql);

        $number_rows = mysqli_num_rows($result);
        if ($number_rows == 1) {
            // header("Location: ?controller=dang_ky&error=Tạo tài khoản thất bại!!!");
            echo "<script type='text/javascript'>window.top.location='" .$this->home ."?controller=dang_ky&error=Tạo tài khoản thất bại!!!'" .";</script>";
            exit();
        }

        //check unique user email base on role
        switch ($role) {
            case "2":
                $sql = "Select Email from daubep where Email = '$email'";
                $result = (new Connect())->select($sql);

                $number_rows = mysqli_num_rows($result);
                if ($number_rows == 1) {
                    // header("Location: ?controller=dang_ky&error=Email đã tồn tại!!!");
                    echo "<script type='text/javascript'>window.top.location='" .$this->home ."?controller=dang_ky&error=Email đã tồn tại!!!'" .";</script>";
                    exit();
                }
                break;

            case "3":
                $sql = "Select Email from nhanvien where Email = '$email'";
                $result = (new Connect())->select($sql);

                $number_rows = mysqli_num_rows($result);
                if ($number_rows == 1) {
                    // header("Location: ?controller=dang_ky&error=Email đã tồn tại!!!");
                    echo "<script type='text/javascript'>window.top.location='" .$this->home ."?controller=dang_ky&error=Email đã tồn tại!!!'" .";</script>";
                    exit();
                }
                break;

            case "4":
                $sql = "Select Email from phucvu where Email = '$email'";
                $result = (new Connect())->select($sql);

                $number_rows = mysqli_num_rows($result);
                if ($number_rows == 1) {
                    // header("Location: ?controller=dang_ky&error=Email đã tồn tại!!!");
                    echo "<script type='text/javascript'>window.top.location='" .$this->home ."?controlle=dang_ky&error=Email đã tồn tại!!!'" .";</script>";
                    exit();
                }
                break;

            default:
                // header("Location: ?controller=dang_ky&error=Loại người dùng không phù hợp!!!&role=" . $role);
                echo "<script type='text/javascript'>window.top.location='" .$this->home ."?controller=dang_ky&error=Loại người dùng không phù hợp!!!&role='" . $role .";</script>";
                break;
        }
        // echo "Trước khi store";
        //store taikhoan
        $sql = "Insert into $this->table(TaiKhoan, MatKhau)
                Values('$email','$pass')";
        (new Connect())->execute($sql);
        // echo "Đã toi store taikhoan";
        //get MaTaiKhoan
        $sql = "Select MaTaiKhoan from taikhoan Where TaiKhoan = '$email'";
        $result = (new Connect())->select($sql);
        $accountId = mysqli_fetch_array($result);
        // echo "Đã tới get MaTaiKhoan";
        //store user
        switch ($role) {
            case "2":
                $sql = "Insert into daubep(HoTen, Email, MaTaiKhoan, role)
                        Values('$username', '$email', $accountId[0], $role)";
                // die($sql);
                (new Connect())->execute($sql);
                break;

            case "3":
                $sql = "Insert into nhanvien(HoTen, Email, MaTaiKhoan, role)
                        Values('$username', '$email', $accountId[0], $role)";
                (new Connect())->execute($sql);
                break;

            case "4":
                $sql = "Insert into phucvu(HoTen, Email, MaTaiKhoan, role)
                    Values('$username', '$email', $accountId[0], $role)";
                (new Connect())->execute($sql);
                break;

            default:
                // header("Location: ?controller=dang_ky&error=Loại người dùng không phù hợp!!!");
                echo "<script type='text/javascript'>window.top.location='" .$this->home ."?controller=dang_ky&error=Loại người dùng không phù hợp!!!'" .";</script>";
                break;
        }
        if (isset($params["noti"])) {
            // header("Location: ?controller=dang_ky_theo_ds&role=1&noti=Tạo tài khoản thành công");
            // exit();
        }
        else{
            // header("Location: ?controller=dang_ky&noti=Tạo người dùng thành công!!!");
            echo "<script type='text/javascript'>window.top.location='" .$this->home ."?controller=dang_ky&noti=Tạo người dùng thành công!!!'" .";</script>"; 
            exit;
        }
    }

    public function process_Upload_File()
    {
        $upload_dir = "uploads/";
        if (isset($_FILES["userfile"]["name"])) {
            $upload_file = $upload_dir . basename($_FILES["userfile"]["name"]);
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($upload_file, PATHINFO_EXTENSION));
            // echo $fileType;
            // echo "<br>";
            if ($fileType == "csv" or $fileType == "xlsx" or $fileType == "xls") {
                if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $upload_file)) {
                    // echo "Tập tin " . htmlspecialchars(basename($_FILES["userfile"]["name"])) . " đã được tải lên.";
                    return $upload_file;
                }
            } else {
                echo '<h3 style="color: red;">Định dạng file không phù hợp. Bạn chỉ có thể tải lên file csv hoặc excel.</h3>';
            }
        } else {
            // header("Location: ?controller=dang_ky_theo_ds&role=1&noti=Vui lòng tải lên tập tin của bạn!");
            echo "<script type='text/javascript'>window.top.location='" .$this->home ."?controller=dang_ky_theo_ds&role=1&noti=Vui lòng tải lên tập tin của bạn!'" .";</script>";
        }
    }

    public function processListRegister($params)
    {
        for ($i = 0; $i < count($params); $i = $i + 3) {
            $ar = array_slice($params, $i, 3);
            $keys = array_keys($ar);
            for ($j = 0; $j < 3; $j++) {
                if ($j == 0) {
                    $username = $params[$keys[$j]];
                } elseif ($j == 1) {
                    $email = $params[$keys[$j]];
                } else {
                    $userrole = $params[$keys[$j]];
                    if (isset($userrole)) {
                        require_once "model/Convert.php";
                        $userrole = str_replace(' ', '', strtolower((new Convert())->convert_vn2latin($userrole)));
                        if ($userrole == "daubep") {
                            $userrole = 2;
                        } elseif ($userrole == "nhanvien") {
                            $userrole = 3;
                        } elseif ($userrole == "phucvu") {
                            $userrole = 4;
                        }
                    }
                }
                // echo $params[$keys[$j]];
                // echo $params . '["idInput' . $i . $j . '"]';
            }

            $sql = "Select * from taikhoan where TaiKhoan = '$email'";
            $result = (new Connect())->select($sql);

            $number_rows = mysqli_num_rows($result);
            if ($number_rows == 1) {
                // header("Location: ?controller=dang_ky_theo_ds&role=1&noti=Email " . $email . " đã tồn tại");
                echo "<script type='text/javascript'>window.top.location='" .$this->home ."?controller=dang_ky_theo_ds&role=1&noti=Email đã tồn tại'" .";</script>";
                exit();
            }
        }

        for ($i = 0; $i < count($params); $i = $i + 3) {
            $ar = array_slice($params, $i, 3);
            $keys = array_keys($ar);
            for ($j = 0; $j < 3; $j++) {
                if ($j == 0) {
                    $username = $params[$keys[$j]];
                } elseif ($j == 1) {
                    $email = $params[$keys[$j]];
                } else {
                    $userrole = $params[$keys[$j]];
                    if (isset($userrole)) {
                        require_once "model/Convert.php";
                        $userrole = str_replace(' ', '', strtolower((new Convert())->convert_vn2latin($userrole)));
                        if ($userrole == "daubep") {
                            $userrole = 2;
                        } elseif ($userrole == "nhanvien") {
                            $userrole = 3;
                        } elseif ($userrole == "phucvu") {
                            $userrole = 4;
                        }
                    }
                }
                // echo $params[$keys[$j]];
                // echo $params . '["idInput' . $i . $j . '"]';
            }
            $arr = array("username" => $username, "email" => $email, "userrole" => $userrole, "noti" => "success registry");
            // print_r($arr);
            // echo "<br>";
            // print_r($arr["email"]);
            $this->processRegister($arr);
        }
        // header("Location: ?controller=dang_ky_theo_ds&role=1&noti=Tạo tài khoản thành công");
        echo "<script type='text/javascript'>window.top.location='" .$this->home ."?controller=dang_ky_theo_ds&role=1&noti=Tạo tài khoản thành công'" .";</script>";
    }
}
