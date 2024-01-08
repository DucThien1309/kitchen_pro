<?php
// session_start();
if (isset($_SESSION["id"])) {
    switch ($_SESSION["role"]) {
        case "1":
            header("Location: ?controller=quan_li");
            break;

        case "2":
            header("Location: ?controller=dau_bep");
            break;

        case "3":
            header("Location: ?controller=nhan_vien");
            break;

        case "4":
            header("Location: ?controller=phuc_vu");
            break;
        default:
            header("Location: ?error=Bạn cần đăng nhập!!!");
            break;
    }
}
?>
<?php
if (isset($_GET["role"]))
    $role = $_GET["role"];
?>
<!DOCTYPE html>
<html lang="en">
<?php
if (isset($_GET["error"])) {
    $error = $_GET["error"];
    echo "<script type='text/javascript'>alert('$error');</script>";
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Favicon -->
    <link href="view/assets/img/favicon.ico" type="image/x-icon" rel="icon" />
    <title>Đăng nhập - Kitchen Pro++</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="view/assets/css/login.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
</head>

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="view/assets/img/welcome.jpg" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body" style="text-align: center;">
                            <div class="brand-wrapper">
                                <h1 class="text-primary m-0" style="color: #FEA116 !important;">
                                    <i class="fa fa-utensils me-3"></i> Kitchen Pro++
                                </h1>
                            </div>
                            <h2 class="pb-3">Đăng nhập
                                <?php
                                if (isset($role))
                                    switch ($role) {
                                        case 1:
                                            echo "(Quản lí)";
                                            break;
                                        case 2:
                                            echo "(Đầu bếp)";
                                            break;
                                        case 3:
                                            echo "(Khách hàng)";
                                            break;
                                        case 4:
                                            echo "(Phục vụ)";
                                            break;
                                        default:
                                            echo "Chưa vai trò đăng nhập!!!";
                                            break;
                                    }



                                ?>
                            </h2>
                            <center>
                                <form action="?controller=xac_nhan_dang_nhap&role=<?php echo $role ?>" method="POST">
                                    <div class="form-group">
                                        <label for="user" class="sr-only">Email</label>
                                        <input type="text" name="user" id="user" class="form-control" placeholder="Nhập tên tài khoản của bạn">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="password" class="sr-only">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Nhập vào mật khẩu của bạn">
                                    </div>
                                    <!-- <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login"> -->
                                    <button name="login" id="login" class="btn btn-block login-btn mb-4">Đăng nhập</button>
                                </form>
                            </center>
                            <a href="#!" class="forgot-password-link">Quên mật khẩu?</a>
                            <!-- <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p> -->
                            <nav class="login-card-footer-nav">
                                <a href="#!">Điều khoản sử dụng.</a>
                                <a href="#!">Chính sách bảo mật</a>
                                <br>
                                <br>
                                <a href="?controller=index" class="forgot-password-link">Quay lại</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="card login-card">
        <img src="assets/images/login.jpg" alt="login" class="login-card-img">
        <div class="card-body">
          <h2 class="login-card-title">Login</h2>
          <p class="login-card-description">Sign in to your account to continue.</p>
          <form action="#!">
            <div class="form-group">
              <label for="email" class="sr-only">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="password" class="sr-only">Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-prompt-wrapper">
              <div class="custom-control custom-checkbox login-card-check-box">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember me</label>
              </div>              
              <a href="#!" class="text-reset">Forgot password?</a>
            </div>
            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login">
          </form>
          <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p>
        </div>
      </div> -->
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>