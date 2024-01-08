<?php

if(!isset($_SESSION)) { 
        session_start();
} 
unset($_SESSION["id"]);
unset($_SESSION["name"]);
unset($_SESSION["start"]);
unset($_SESSION["expire"]);
if (isset($_GET["role"])) {
    $role = $_GET["role"];
} else {
    header("Location: ?controller=index&error=Vui lòng chọn role trước khi đăng nhập!!!");
    exit();
}
header("Location: ?controller=dang_nhap&role=" . $role);
