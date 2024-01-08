<?php
if(!isset($_SESSION)) { 
        session_start();
}
//Quoc's code start
include "model/Connect1.php";
$db = new Database;
$db->connect();
//Quoc's code end

//Nam's code start
if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
//Nam's code end

require_once "controller/Controller.php";
require_once "controller/QuanLiController.php";
require_once "controller/DauBepController.php";
require_once "controller/PhucVuController.php";
require_once "controller/NhanVienController.php";
require_once "controller/monan/MonAnController.php";
require_once "controller/ThucDonController.php";
require_once "controller/HoaDonController.php";

$controller = $_GET["controller"] ?? "index";
$action = $_GET["action"] ?? "index";

switch ($controller) {
    case "index":
        (new Controller())->index();
        break;
        //Quoc'code add -- start
    case 'nguyen-lieu': {
            require_once('controller/nguyenlieu/index.php');
            break;
        }
        //Quoc'code add -- end
    case "quan_li":
        switch ($action) {
                //Thien'code add -- start
            case "index":
                // (new QuanLiController())->index();
                // break;
                (new ThucDonController())->index();
                break;
            case "create":
                (new ThucDonController())->create();
                break;
            case "store":
                (new ThucDonController())->store();
                break;
                //Thien'code add -- end
            case "edit":
                break;
            case "update":
                break;
            case "delete":
                (new ThucDonController())->delete();
                break;
            default:
                echo "Action không hợp lệ!!!";
                break;
        }
        break;

    case "dau_bep":
        switch ($action) {
            case "index":
                (new DauBepController())->index();
                break;
            case "create":
                break;
            case "store":
                break;
            case "edit":
                break;
            case "update":
                break;
            case "delete":
                break;
            default:
                echo "Action không hợp lệ!!!";
                break;
        }
        break;

    case "phuc_vu":
        switch ($action) {
            case "index":
                (new PhucVuController())->index();
                break;
            case "xac_nhan":
                (new PhucVuController())->xac_nhan();
                break;
            case "store":
                break;
            case "edit":
                break;
            case "update":
                break;
            case "delete":
                break;
            default:
                echo "Action không hợp lệ!!!";
                break;
        }
        break;

    case "nhan_vien":
        switch ($action) {
            case "index":
                (new NhanVienController())->index();
                break;
            case "invoice":
                (new HoaDonController())->index();
                break;
            case "invoice_details":
                (new HoaDonController())->invoiceDetails();
                break;
            case "select_invoice_by_month":
                (new HoaDonController())->filterInvoiceByMonth();
                break;

            // Nam add code start
            case 'viewcart':
                (new NhanVienController())->viewcart();
                break;
            case 'addcart':
                (new NhanVienController())->addcart();
                break;
            case 'delcart':
                (new NhanVienController())->delcart();
                break;
            case 'exit':
                (new NhanVienController())->delcart();
                (new NhanVienController())->exit();
                break;
            case 'order':
                (new NhanVienController())->order();
                break;
            case 'store':
                (new NhanVienController())->store();
                break;
            case 'vieworder':
                (new NhanVienController())->vieworder();
                break;
            case 'viewdetail':
                (new NhanVienController())->viewdetail();
                break;
            case 'datmon':
                (new NhanVienController())->viewdatmon();
                break;
            case 'view_index':
                (new NhanVienController())->view_index();
                break;
            // Nam add code end
            case "thanh_toan":
                require_once("view/vnpay/menu.php");
                break;
            case "tao_hoa_don":{
                require_once("view/vnpay/vnpay_create_payment.php");
                break;
            }
            case "tien_mat":{
                require_once("view/vnpay/vnpay_pay.php");
                break;
            }
            default:
                echo "Action không hợp lệ!!!";
                break;
        }
        break;

    case "nguyen_lieu":
        switch ($action) {
            case "index":
                (new PhucVuController())->index();
                break;
            case "create":
                break;
            case "store":
                break;
            case "edit":
                break;
            case "update":
                break;
            case "delete":
                break;
            default:
                echo "Action không hợp lệ!!!";
                break;
        }
        break;
        //Nam's add -- start
        case 'datmon':
            switch ($action) {
                case 'index':
                    (new MonAnController())->index();
                    break;
                case 'viewcart':
                    (new NhanVienController())->viewcart();
                    break;
                case 'addcart':
                    (new NhanVienController())->addcart();
                    break;
                case 'delcart':
                    (new NhanVienController())->delcart();
                    break;
                case 'exit':
                    (new NhanVienController())->delcart();
                    (new NhanVienController())->exit();
                    break;
                case 'order':
                    (new NhanVienController())->order();
                    break;
                case 'store':
                    (new NhanVienController())->store();
                    break;
                case 'vieworder':
                    (new NhanVienController())->vieworder();
                    break;
                case 'viewdetail':
                    (new NhanVienController())->viewdetail();
                    break;
            }
            break;
            // đề xuất món ăn
        case 'dexuatmonan':
            switch ($action) {
                case 'index':
                    (new MonAnController())->suggest();
                    break;
                case 'store':
                    (new MonAnController())->store();
                    break;
            }
            break;
            // quản lý món ăn
        case 'mon-an':
            switch ($action) {
                case 'index':
                    (new MonAnController())->indexmonan();
                    break;
                case 'create':
                    (new MonAnController())->create();
                    break;
                case 'storenewdish':
                    (new MonAnController())->storenewdish();
                    break;
                case 'delete':
                    (new MonAnController())->delete();
                    break;
                case 'edit':
                    (new MonAnController())->edit();
                    break;
                case 'update':
                    (new MonAnController())->update();
                    break;
            }
            break;
        case 'xemthongkemonan':
            switch ($action) {
                case 'index':
                    (new MonAnController())->indexthongke();
                    break;
            }
            break;
        case 'xemdexuatmonan':
            switch ($action) {
                case 'index':
                    (new MonAnController())->indexdexuat();
                    break;
            }
            break;
            //Nam'code add -- end
    case "dang_nhap":
        (new Controller())->signIn();
        break;

    case "xac_nhan_dang_nhap":
        (new Controller())->processSignIn();
        break;

    case "dang_xuat":
        (new Controller())->signOut();
        break;

    case "dang_ky":
        (new Controller())->signUp();
        break;

    case "xac_nhan_dang_ky":
        (new Controller())->processSignUp();
        break;

    case "dang_ky_theo_ds":
        (new Controller())->create_upload();
        break;

    case "xu_ly_dang_ky_theo_ds":
        (new Controller())->store_upload();
        break;

    case "xac_nhan_dang_ky_theo_danh_sach":
        (new Controller())->store_list_register();
        break;
    // case "thanh_toan_view":
    //         require_once("view/vnpay/menu.php");
    //         break;
    // case "thanh_toan":
    //     switch($action){
    //         case "tao_hoa_don":
    //             require_once("view/vnpay/vnpay_create_payment.php");
    //             break;
    //         }
    //         case "tien_mat":{
    //             require_once("view/vnpay/vnpay_pay.php");
    //             break;
    //         }
    //     break;
    default:
        echo "Controller không hợp lệ!!!";
        break;
}
