<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = '';
}

switch ($action) {
    case 'add': {
            if (isset($_POST['add_nl'])) {
                $TenNguyenLieu = $_POST['ten'];
                $GiaNguyenLieu = $_POST['gia'];
                $DonViTinh = $_POST['donvitinh'];
                $MoTaNguyenLieu = $_POST['mota'];
                if (!empty($TenNguyenLieu) && is_numeric($GiaNguyenLieu) && !empty($DonViTinh) && !empty($MoTaNguyenLieu)) {
                    if ($db->InsertData($TenNguyenLieu, $GiaNguyenLieu, $DonViTinh, $MoTaNguyenLieu)) {
                        // Thêm thành công
                        echo '<script language="javascript">
                                alert("Thêm nguyên liệu thành công"); 
                                window.location="index.php?controller=nguyen-lieu&action=add";
                             </script>';
                    } else {
                        // Lỗi
                        echo '<script language="javascript">
                                alert("Lỗi: Không thể thêm nguyên liệu, vui lòng điền đủ thông tin"); 
                             </script>';
                    }
                } else {
                    // Dữ liệu trống hoặc giá không phải là số, hiển thị thông báo lỗi
                    echo '<script language="javascript">
                            alert("Lỗi: Không thể thêm nguyên liệu. Vui lòng điền đầy đủ thông tin và giá phải là số");
                         </script>';
                }
            }

            require_once('view/nguyenlieu/add_nguyenlieu.php');
            break;
        }
    case 'edit': {
            if (isset($_GET['id'])) {
                $MaNguyenLieu = $_GET['id'];
                $tblTable = "nguyenlieu";
                $dataID = $db->getDataID($tblTable, $MaNguyenLieu);
                if (isset($_POST['update_nl'])) {
                    //lấy dữ liệu từ view
                    $TenNguyenLieu = $_POST['ten'];
                    $GiaNguyenLieu = $_POST['gia'];
                    $DonViTinh = $_POST['donvitinh'];
                    $MoTaNguyenLieu = $_POST['mota'];
                    if (!empty($MaNguyenLieu) && !empty($TenNguyenLieu) && is_numeric($GiaNguyenLieu) && !empty($DonViTinh) && !empty($MoTaNguyenLieu)) {
                        if ($db->UpdateData($MaNguyenLieu, $TenNguyenLieu, $GiaNguyenLieu, $DonViTinh, $MoTaNguyenLieu)) {
                            // Cập nhật thành công
                            echo '<script language="javascript">
                                    alert("Cập nhật nguyên liệu thành công"); 
                                    window.location.href = "index.php?controller=nguyen-lieu";
                                 </script>';
                        } else {
                            // Lỗi khi cập nhật
                            echo '<script language="javascript">
                                    alert("Lỗi: Không thể cập nhật nguyên liệu"); 
                                 </script>';
                        }
                    } else {
                        // Dữ liệu cập nhật trống hoặc giá không phải là số, hiển thị thông báo lỗi
                        echo '<script language="javascript">
                                alert("Lỗi: Không thể cập nhật nguyên liệu. Vui lòng điền đầy đủ thông tin và giá phải là số"); 
                             </script>';
                    }
                }
            }
            require_once('view/nguyenlieu/edit_nguyenlieu.php');
            break;
        }
    case 'delete': {
            if (isset($_GET['id'])) {
                $MaNguyenLieu = $_GET['id'];
                $tblTable = "nguyenlieu";
                if ($db->Delete($MaNguyenLieu, $tblTable)) {
                    header('location:index.php?controller=nguyen-lieu');
                } else {
                    //header('location:index.php?controller=nguyen-lieu');
                    echo 'Xóa không thành công';
                }
            }
            break;
        }
    case 'tim-kiem': {
            if (isset($_GET['tukhoa'])) {
                $key = $_GET['tukhoa'];
                $tblTable = "nguyenlieu";
                // lấy dữ liệu từ model:connect.php
                $data_Search = $db->SearchData($tblTable, $key);
            }
            require_once('view/nguyenlieu/search_nguyenlieu.php');
            break;
        }
    case 'danh-sach-can-mua': {
            $tblTable = "chitietnguyenlieumonan";
            $data = $db->getFoodIngredientsData();
            require_once('view/monan/danhsachcanmua.php');
            break;
        }
    case 'thanh-phan-mon-an': {
        if (isset($_POST['add_tp'])) {
            $TenMonAn = $_POST['monan'];
            $TenNguyenLieu = $_POST['nguyenlieu'];
            $SoLuong = $_POST['textfield3'];
        
            // Kiểm tra xem nguyên liệu đã tồn tại cho món ăn hay chưa
            if ($db->kiemTraNguyenLieuTonTai($TenMonAn, $TenNguyenLieu)) {
                // Nếu nguyên liệu đã tồn tại, hiển thị thông báo lỗi
                echo '<script language="javascript">
                        alert("Lỗi: Nguyên liệu này đã tồn tại cho món ăn."); 
                     </script>';
            } else {
                // Nguyên liệu chưa tồn tại, tiến hành thêm vào CSDL
                if (!empty($SoLuong) && is_numeric($SoLuong)) {
                    if ($db->ADDTPMA($TenMonAn, $TenNguyenLieu, $SoLuong)) {
                        // Thêm thành công
                        echo '<script language="javascript">
                                alert("Thêm thành phần món ăn thành công"); 
                                window.location="index.php?controller=nguyen-lieu&action=thanh-phan-mon-an";
                             </script>';
                    } else {
                        // Lỗi
                        echo '<script language="javascript">
                                alert("Lỗi: Không thể thêm thành phần nguyên liệu món ăn, vui lòng điền đủ thông tin"); 
                             </script>';
                    }
                } else {
                    // Dữ liệu trống hoặc giá không phải là số, hiển thị thông báo lỗi
                    echo '<script language="javascript">
                            alert("Lỗi: Không thể thêm nguyên liệu. Vui lòng điền đầy đủ thông tin và số lượng phải là số");
                         </script>';
                }
            }
        }
        
        require_once('view/monan/themthanhphannguyenlieu.php');
        break;
        
        }
    default: {
            $tblTable = "nguyenlieu";
            $data = $db->getAllData($tblTable);
            require_once('view/nguyenlieu/danhsachnguyenlieu.php');
            break;
        }
}
