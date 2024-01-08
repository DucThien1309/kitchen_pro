<?php
// session_start();
if (empty($_SESSION["id"])) {
    header("Location: ?error=Bạn cần đăng nhập!!!");
}
if ($_SESSION["role"] != 1) {
    header("Location: ?controller=dang_nhap&role=1");
}
if (isset($_GET["noti"])) {
    $noti = $_GET["noti"];
    echo "<script type='text/javascript'>alert('$noti');</script>";
}

if (isset($upload_file)) {
    echo "<script type='text/javascript'>alert('Tải lên tập tin "
        . $upload_file
        . " thành công!');</script>";
}
// require_once "model/PHPExcel.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="view/assets/img/favicon.ico" type="image/x-icon" rel="icon" />
    <title>Tạo người từ danh sách</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    /* Change */
    @import url('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');

    @-webkit-keyframes animation-rotate {
        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @-moz-keyframes animation-rotate {
        100% {
            -moz-transform: rotate(360deg);
        }
    }

    @-o-keyframes animation-rotate {
        100% {
            -o-transform: rotate(360deg);
        }
    }

    @keyframes animation-rotate {
        100% {
            transform: rotate(360deg);
        }
    }

    html {
        height: 100%;
    }

    body {
        display: flex;
        flex-direction: column;
        font-family: 'Raleway', sans-serif;
        transform: translateX(0%);
        height: 100%;
        width: 100%;
        transition: transform 0.2s linear;
        user-select: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -o-user-select: none;
    }

    body.file-process-open {
        transform: translateX(-30%);
        transition: transform 0.2s linear;
    }

    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
    }

    a {
        text-decoration: none;
    }

    h1 {
        font-family: 'Open Sans', sans-serif;
        font-weight: 100;
        letter-spacing: 0px;
        font-size: 40px;
        line-height: 1.2;
    }

    .header-container .page-center,
    .body-container .page-center,
    .footer-container .page-center {
        max-width: 1300px;
        margin: 0 auto;
        padding: 0 20px;
        overflow: hidden;
    }

    .button i {
        margin-right: 8px;
    }

    .header-container-wrapper {
        flex: 0 0 auto;
    }

    .body-container-wrapper {
        flex: 1 0 auto;
    }

    .footer-container-wrapper {
        flex: 0 0 auto;
    }

    .body-container-wrapper .page-center {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: calc(100vh - 170px);
    }

    .body-container i.fa.fa-cloud {
        font-size: 100px;
        color: #2196f3;
        text-shadow: 0 0 5px rgba(0, 0, 0, 0.48);
    }

    .custom-header-bg {
        background: #FEA116;
        padding: 20px 0;
        font-family: 'Open Sans', sans-serif;
        box-shadow: 0 0 12px #000;
    }

    .custom-footer-bg {
        background: #FEA116;
        padding: 20px;
        text-align: center;
        color: #fff;
        box-shadow: 0 0 12px #000;
    }

    .logo {
        width: 30%;
        float: left;
        font-size: 24px;
        color: #ffffff;
        font-weight: 100;
        cursor: pointer;
        margin-top: 4px;
    }

    .navigation {
        float: right;
        width: 70%;
    }

    .navigation ul {
        margin: 0;
        padding: 0;
        list-style: none;
        display: block;
        float: right;
    }

    .navigation ul li {
        display: inline-block;
    }

    .button {
        white-space: nowrap;
        display: inline-block;
        height: 40px;
        line-height: 40px;
        padding: 0 30px;
        box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
        background: #fff;
        border-radius: 4px;
        font-size: 15px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: .025em;
        color: #555;
        text-decoration: none;
        -webkit-transition: all .15s ease;
        transition: all .15s ease;
        font-family: 'Open Sans', sans-serif;
        font-weight: 400;
    }

    .button:hover {
        color: #6e6e6e;
        transform: translateY(-1px);
        box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08);
    }

    .button:active {
        color: #555;
        background-color: #f6f9ff;
        transform: translateY(1px);
        box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
    }

    .upload {
        padding: 0;
        background-color: #FEA116;
        /* background-image: 8121991;
        background-image: -webkit-linear-gradient(#FEA116 0%, #FEA116 100%);
        background-image: -moz-linear-gradient(#FEA116 0%, #FEA116 100%);
        background-image: -o-linear-gradient(#FEA116 0%, #FEA116 100%);
        background-image: linear-gradient(#FEA116 0%, #FEA116 100%); */
        -webkit-box-shadow: inset rgba(0, 0, 0, 0.2) 0 0 0 1px, rgba(52, 152, 219, 0.5) 0 0 5px;
        -moz-box-shadow: inset rgba(0, 0, 0, 0.2) 0 0 0 1px, rgba(52, 152, 219, 0.5) 0 0 5px;
        box-shadow: inset rgba(0, 0, 0, 0.2) 0 0 0 1px, rgba(52, 152, 219, 0.5) 0 0 5px;
        -webkit-border-radius: 4px;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 4px;
        -moz-background-clip: padding;
        border-radius: 4px;
        background-clip: padding-box;
        padding: 20px 20px;
        color: #fff;
        cursor: pointer;
        font-weight: 600;
        font-family: Open Sans;
    }

    .upload span {
        text-shadow: rgba(29, 111, 165, 0.9) 0 0 2px;
    }

    .upload span {
        padding: 20px 25px;
        font: 700 13px Montserrat, Helvetica, Arial, sans-serif;
        text-transform: uppercase;
        color: #fff;
        -webkit-transition: all 350ms ease;
        -moz-transition: all 350ms ease;
        -o-transition: all 350ms ease;
        transition: all 350ms ease;
    }

    .upload:hover {
        background-color: #FEA116;
        background-image: 8121991;
        background-image: -webkit-linear-gradient(#5faee3 0%, #3498db 100%);
        background-image: -moz-linear-gradient(#5faee3 0%, #3498db 100%);
        background-image: -o-linear-gradient(#5faee3 0%, #3498db 100%);
        background-image: linear-gradient(#5faee3 0%, #3498db 100%);
        -webkit-box-shadow: inset rgba(0, 0, 0, 0.2) 0 0 0 1px, rgba(74, 163, 223, 0.5) 0 0 5px;
        -moz-box-shadow: inset rgba(0, 0, 0, 0.2) 0 0 0 1px, rgba(74, 163, 223, 0.5) 0 0 5px;
        box-shadow: inset rgba(0, 0, 0, 0.2) 0 0 0 1px, rgba(74, 163, 223, 0.5) 0 0 5px;
    }

    .upload:hover span {
        text-shadow: rgba(33, 125, 187, 0.9) 0 0 2px;
    }

    .upload:active {
        background-color: #FEA116;
        background-image: 8121991;
        background-image: -webkit-linear-gradient(#FEA116 0%, #FEA116 100%);
        background-image: -moz-linear-gradient(#FEA116 0%, #FEA116 100%);
        background-image: -o-linear-gradient(#FEA116 0%, #FEA116 100%);
        background-image: linear-gradient(#FEA116 0%, #FEA116 100%);
    }

    .upload--loading {
        background-color: #FEA116 !important;
        background-image: 8121991 !important;
        background-image: -webkit-linear-gradient(#FEA116 0%, #FEA116 100%) !important;
        background-image: -moz-linear-gradient(#FEA116 0%, #FEA116 100%) !important;
        background-image: -o-linear-gradient(#FEA116 0%, #FEA116 100%) !important;
        background-image: linear-gradient(#FEA116 0%, #FEA116 100%) !important;
        position: relative;
        cursor: wait;
    }

    .upload--loading:before {
        margin: -13px 0 0 -13px;
        width: 24px;
        height: 24px;
        position: absolute;
        left: 50%;
        top: 50%;
        content: '';
        -webkit-border-radius: 24px;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 24px;
        -moz-background-clip: padding;
        border-radius: 24px;
        background-clip: padding-box;
        border: rgba(255, 255, 255, 0.25) 2px solid;
        border-top-color: #ffffff;
        -webkit-animation: animation-rotate 750ms linear infinite;
        -moz-animation: animation-rotate 750ms linear infinite;
        -o-animation: animation-rotate 750ms linear infinite;
        animation: animation-rotate 750ms linear infinite;
    }

    .upload--loading span,
    .upload--loading:hover span,
    .upload--loading:active span {
        color: transparent;
        text-shadow: none;
    }

    .upload-hidden {
        visibility: hidden;
    }

    .upload {
        position: relative;
        overflow: hidden;
    }

    .upload:after {
        content: "";
        position: absolute;
        top: -110%;
        left: -210%;
        width: 200%;
        height: 200%;
        opacity: 0;
        transform: rotate(30deg);
        background: rgba(255, 255, 255, 0.13);
        background: linear-gradient(to right,
                rgba(255, 255, 255, 0.13) 0%,
                rgba(255, 255, 255, 0.13) 77%,
                rgba(255, 255, 255, 0.5) 92%,
                rgba(255, 255, 255, 0.0) 100%);
    }

    .upload:hover:after {
        opacity: 1;
        top: -30%;
        left: 100%;
        transition-property: left, top, opacity;
        transition-duration: 0.7s, 0.7s, 0.15s;
        transition-timing-function: ease;
    }

    .upload:active:after {
        opacity: 0;
    }

    .file-upload-bar {
        height: 100%;
        position: fixed;
        right: -30%;
        width: 30%;
        top: 0;
        background: #2196f3;
        box-shadow: 0 0 22px #000;
        overflow: hidden;
        display: block;
        transition: all 0.2s linear;
    }

    .individual-files ul li:last-child {
        border: 0;
    }

    .file-process-open .file-upload-bar {
        right: 0;
        transition: all 0.2s linear;
        transform: translateX(100%);
    }

    .file-upload-bar-closed {
        position: fixed;
        right: -100%;
        height: 100vh;
        width: 70%;
        top: 0;
        cursor: pointer;
        transition: all 0.2s linear;
        z-index: 9999;
        transform: translateX(-30%);
    }

    .file-process-open .file-upload-bar-closed {
        transition: all 0.2s linear;
        transform: translateX(0%);
        right: 0;
        left: auto;
    }

    .bar-wrapper {
        padding: 20px;
    }

    .overall span {
        color: #fff;
        font-size: 20px;
        line-height: 1.2;
        font-weight: 300;
        background: #2196f3;
        display: inline-block;
        overflow: hidden;
        z-index: 9;
        position: relative;
        padding-right: 10px;
    }

    .overall {
        position: relative;
    }

    .overall:before {
        content: "";
        border-top: 2px solid #fff;
        height: 1px;
        width: 100%;
        position: absolute;
        top: 12px;
    }

    .progress-bar-overall {
        width: 100%;
        background: #fff;
        margin-top: 15px;
        height: 8px;
        transition: all 0.3s linear;
    }

    .progress-bar-overall span {
        background: #fff;
        color: #2196f3;
        padding: 5px 15px;
        transition: all 0.3s linear;
        position: relative;
        left: 10%;
        font-weight: bold;
        font-size: 15px;
        top: 8px;
        cursor: pointer;
        text-align: center;
    }

    .individual-files {
        border: 1px solid #fff;
        margin-top: 55px;
        padding: 0;
    }

    .individual-files ul {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .individual-files ul li span {
        display: block;
        margin-bottom: 10px;
        font-family: 'Open Sans', sans-serif;
        font-size: 13px;
    }

    .individual-files ul {
        height: calc(100vh - 160px);
        overflow-y: scroll;
        background: rgba(255, 255, 255, 1);
        background: -moz-linear-gradient(left, rgba(255, 255, 255, 1) 0%, rgba(246, 246, 246, 1) 47%, rgba(237, 237, 237, 1) 100%);
        background: -webkit-gradient(left top, right top, color-stop(0%, rgba(255, 255, 255, 1)), color-stop(47%, rgba(246, 246, 246, 1)), color-stop(100%, rgba(237, 237, 237, 1)));
        background: -webkit-linear-gradient(left, rgba(255, 255, 255, 1) 0%, rgba(246, 246, 246, 1) 47%, rgba(237, 237, 237, 1) 100%);
        background: -o-linear-gradient(left, rgba(255, 255, 255, 1) 0%, rgba(246, 246, 246, 1) 47%, rgba(237, 237, 237, 1) 100%);
        background: -ms-linear-gradient(left, rgba(255, 255, 255, 1) 0%, rgba(246, 246, 246, 1) 47%, rgba(237, 237, 237, 1) 100%);
        background: linear-gradient(to right, rgba(255, 255, 255, 1) 0%, rgba(246, 246, 246, 1) 47%, rgba(237, 237, 237, 1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#ededed', GradientType=1);
    }

    .individual-files ul li {
        padding: 10px;
        border-bottom: 1px solid #2196f3;
    }

    .individual-files ul li span i {
        font-style: normal;
        font-weight: bold;
        width: 80px;
        display: inline-block;
    }

    .individual-files ul li span b {
        font-weight: normal;
    }

    span.file-link input {
        padding: 5px 10px;
        border: none;
        background: transparent;
        outline: 0;
        padding-left: 0;
    }

    .copy-link b {
        background: #2196f3;
        padding: 5px 10px;
        display: inline-block;
        margin-left: 80px !important;
        cursor: pointer;
        color: #fff;
    }

    .copy-link b:active {
        background-color: rgba(33, 150, 243, 0.9);
        transform: translateY(1px);
        box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
    }

    @media (max-width:700px) {
        .custom-header-bg {
            text-align: center;
        }

        .logo {
            width: 100%;
            float: none;
            margin-bottom: 20px;
        }

        .navigation ul {
            float: none;
            text-align: center;
        }

        .navigation ul li+li {
            margin-top: 10px;
        }

        .navigation {
            float: none;
            width: 100%;
        }
    }

    /* End Change */

    .modal-header,
    h4,
    .close {
        background-color: #5cb85c;
        color: white !important;
        text-align: center;
        font-size: 30px;
    }

    .modal-footer {
        background-color: #f9f9f9;
    }

    td>input {
        /* background-color: transparent; */
        border: 0px solid;
        height: 20px;
        width: 160px;
        /* color: #CCC; */
    }
</style>
</head>

<body>

    <!-- Change -->
    <div class="header-container-wrapper">
        <div class="header-container">
            <div class="custom-header-bg">
                <div class="page-center">
                    <div class="logo">Upload File - Kitchen Pro++</div>
                    <div class="navigation">
                        <!-- <ul>
                            <li><a href="#" class="button click-upload"><i class="fa fa-cloud-upload" aria-hidden="true"></i>Upload</a></li>
                            <li><a href="#" class="button open-progress"><i class="fa fa-tasks" aria-hidden="true"></i>Progress</a></li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="body-container-wrapper">
        <div class="body-container">
            <div class="page-center">
                <i class="fa fa-cloud" aria-hidden="true"></i>
                <h1>Tải Lên <strong>Tập Tin</strong> Của Bạn</h1>
                <!-- <a class="upload" id="call-to-action"><span>Select Your Upload</span></a> -->
                <form id="upload" method="post" action="?controller=xu_ly_dang_ky_theo_ds&role=1" enctype="multipart/form-data">
                    <div id="drop">
                        <!-- <input type="file" name="upl" multiple multiple class="upload-hidden"> -->
                        <!-- <label for="userfile">Chọn tập tin</label> -->
                        <input name="userfile" class="upload" id="call-to-action" type="file" multiple multiple id="userfile" />
                        <br>
                        <center>
                            <input type="submit" class="upload" value="Xem thông tin" />
                            <br><br>
                            <a href="?controller=index" class="forgot-password-link">Quay lại</a>
                        </center>

                    </div>
                </form>
                <!-- <div class="file-upload-bar">
                    <div class="bar-wrapper">
                        <div class="overall"><span>Overall Progress</span>
                            <div class="progress-bar-overall">
                                <span><b>20%</b></span>
                            </div>
                        </div>
                        <div class="individual-files">
                            <ul>
                                <li>
                                    <span class="filename"><i>File Name:</i><b>xyz.jpg</b></span>
                                    <span class="filesize"><i>File Size:</i><b>Mb</b></span>
                                    <span class="file-link"><i>File Link</i><b><input value="http://www.qbus.com/txt.jpg"></b></span>
                                    <span class="copy-link"><b>Copy Link</b></span>
                                </li>
                                <li>
                                    <span class="filename"><i>File Name:</i><b>xyz.jpg</b></span>
                                    <span class="filesize"><i>File Size:</i><b>Mb</b></span>
                                    <span class="file-link"><i>File Link</i><b><input value="http://www.qbus.com/txt.jpg"></b></span>
                                    <span class="copy-link"><b>Copy Link</b></span>
                                </li>
                                <li>
                                    <span class="filename"><i>File Name:</i><b>xyz.jpg</b></span>
                                    <span class="filesize"><i>File Size:</i><b>Mb</b></span>
                                    <span class="file-link"><i>File Link</i><b><input value="http://www.qbus.com/txt.jpg"></b></span>
                                    <span class="copy-link"><b>Copy Link</b></span>
                                </li>
                                <li>
                                    <span class="filename"><i>File Name:</i><b>xyz.jpg</b></span>
                                    <span class="filesize"><i>File Size:</i><b>Mb</b></span>
                                    <span class="file-link"><i>File Link</i><b><input value="http://www.qbus.com/txt.jpg"></b></span>
                                    <span class="copy-link"><b>Copy Link</b></span>
                                </li>
                                <li>
                                    <span class="filename"><i>File Name:</i><b>xyz.jpg</b></span>
                                    <span class="filesize"><i>File Size:</i><b>Mb</b></span>
                                    <span class="file-link"><i>File Link</i><b><input value="http://www.qbus.com/txt.jpg"></b></span>
                                    <span class="copy-link"><b>Copy Link</b></span>
                                </li>
                                <li>
                                    <span class="filename"><i>File Name:</i><b>xyz.jpg</b></span>
                                    <span class="filesize"><i>File Size:</i><b>Mb</b></span>
                                    <span class="file-link"><i>File Link</i><b><input value="http://www.qbus.com/txt.jpg"></b></span>
                                    <span class="copy-link"><b>Copy Link</b></span>
                                </li>
                                <li>
                                    <span class="filename"><i>File Name:</i><b>xyz.jpg</b></span>
                                    <span class="filesize"><i>File Size:</i><b>Mb</b></span>
                                    <span class="file-link"><i>File Link</i><b><input value="http://www.qbus.com/txt.jpg"></b></span>
                                    <span class="copy-link"><b>Copy Link</b></span>
                                </li>
                                <li>
                                    <span class="filename"><i>File Name:</i><b>xyz.jpg</b></span>
                                    <span class="filesize"><i>File Size:</i><b>Mb</b></span>
                                    <span class="file-link"><i>File Link</i><b><input value="http://www.qbus.com/txt.jpg"></b></span>
                                    <span class="copy-link"><b>Copy Link</b></span>
                                </li>
                                <li>
                                    <span class="filename"><i>File Name:</i><b>xyz.jpg</b></span>
                                    <span class="filesize"><i>File Size:</i><b>Mb</b></span>
                                    <span class="file-link"><i>File Link</i><b><input value="http://www.qbus.com/txt.jpg"></b></span>
                                    <span class="copy-link"><b>Copy Link</b></span>
                                </li>
                                <li>
                                    <span class="filename"><i>File Name:</i><b>xyz.jpg</b></span>
                                    <span class="filesize"><i>File Size:</i><b>Mb</b></span>
                                    <span class="file-link"><i>File Link</i><b><input value="http://www.qbus.com/txt.jpg"></b></span>
                                    <span class="copy-link"><b>Copy Link</b></span>
                                </li>
                                <li>
                                    <span class="filename"><i>File Name:</i><b>xyz.jpg</b></span>
                                    <span class="filesize"><i>File Size:</i><b>Mb</b></span>
                                    <span class="file-link"><i>File Link</i><b><input value="http://www.qbus.com/txt.jpg"></b></span>
                                    <span class="copy-link"><b>Copy Link</b></span>
                                </li>
                                <li>
                                    <span class="filename"><i>File Name:</i><b>xyz.jpg</b></span>
                                    <span class="filesize"><i>File Size:</i><b>Mb</b></span>
                                    <span class="file-link"><i>File Link</i><b><input value="http://www.qbus.com/txt.jpg"></b></span>
                                    <span class="copy-link"><b>Copy Link</b></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="file-upload-bar-closed"></div>-->
            </div>
        </div>
    </div>

    <div class="footer-container-wrapper">
        <div class="footer-container">
            <div class="custom-footer-bg">
                <div class="page-center">
                    <a class="border-bottom" href="#">Kitchen Pro++</a> All
                    Right Reserved.
                </div>
            </div>
        </div>
    </div>
    <!-- End Change -->
    <!-- The data encoding type, enctype, MUST be specified as below -->
    <!-- <form enctype="multipart/form-data" action="?controller=xu_ly_dang_ky_theo_ds&role=1" method="POST"> -->
    <!-- MAX_FILE_SIZE must precede the file input field -->

    <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
    <!-- Name of input element determines name in $_FILES array -->
    <!-- <label for="userfile">Chọn tập tin</label> -->
    <!-- <input name="userfile" type="file" style="display:none" id="userfile" /> -->
    <!-- <br> -->
    <!-- <input type="submit" value="Xem thông tin" /> -->
    <!-- </form> -->
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px; background-color: #FEA116;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 style="background-color: #FEA116;"><span class="glyphicon"></span> Danh sách nhân viên</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form action="?controller=xac_nhan_dang_ky_theo_danh_sach&role=1" method="POST">
                        <center>
                            <table border="1" width="30%">
                                <?php
                                $row = 1;
                                if (isset($upload_file)) {
                                    $type = pathinfo($upload_file, PATHINFO_EXTENSION);
                                    switch ($type) {
                                        case "csv":
                                            if (($handle = fopen($upload_file, "r")) !== FALSE) {
                                                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                                                    $num = count($data);
                                                    echo "<tr>";
                                                    for ($c = 0; $c < $num; $c++) {
                                                        if ($row == 1)
                                                            echo "<th>" . $data[$c] . "</th>";
                                                        else {
                                                            // echo "<td>" . $data[$c] . "</td>";
                                                            echo "<td>"
                                                                . '<input type="text" name="idInput'
                                                                . $row . $c
                                                                . '" value="'
                                                                . $data[$c]
                                                                // . '" readonly="readonly">'
                                                                . '">'
                                                                . "</td>";
                                                        }
                                                    }
                                                    echo "</tr>";
                                                    $row++;
                                                }
                                                // echo "</table>";
                                                fclose($handle);
                                            }
                                            break;
                                        case "xlsx":
                                            $excelReader = PHPExcel_IOFactory::createReaderForFile($upload_file);
                                            // echo $upload_file;
                                            // $upload_file = "sinhvien.xlsx";
                                            // $excelReader->setLoadSheetsOnly("10A1");

                                            $excelObj = $excelReader->load($upload_file);
                                            $sheetData = $excelObj->getActiveSheet()->toArray("null", true, true, true);
                                            // print_r($sheetData);
                                            for ($i = 1; $i <= count($sheetData); $i++) {
                                                echo "<tr>";
                                                for ($j = 0; $j < 4; $j++) {
                                                    if ($j == 0) {
                                                        echo "<td>";
                                                        echo $sheetData[$i]["A"];
                                                        echo "</td>";
                                                    } elseif ($j == 1) {
                                                        echo "<td>";
                                                        echo $sheetData[$i]["B"];
                                                        echo "</td>";
                                                    } elseif ($j == 2) {
                                                        echo "<td>";
                                                        echo $sheetData[$i]["C"];
                                                        echo "</td>";
                                                    } elseif ($j == 3) {
                                                        echo "<td>";
                                                        echo $sheetData[$i]["D"];
                                                        echo "</td>";
                                                    }
                                                }
                                                echo "</tr>";
                                            }
                                            break;
                                        default:
                                            # code...
                                            break;
                                    }
                                } else {
                                    echo "Không tồn tại file upload!!";
                                }
                                ?>
                            </table>
                            <br>
                            <button>Tạo tài khoản</button>
                        </center>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <p>Not a member? <a href="#">Sign Up</a></p>
                    <p>Forgot <a href="#">Password?</a></p>
                </div> -->
            </div>

        </div>
    </div>
    <!-- "<script>"
        ."$("#myModal").modal();"
    ."</script>"; -->
    <?php
    $row = 1;

    if (isset($upload_file)) {
        echo "<script>"
            . '$("#myModal").modal();'
            . "</script>";
        // echo pathinfo($upload_file, PATHINFO_EXTENSION);
    }
    // else
    // echo "Hãy tải lên danh sách nhân viên của bạn!";
    ?>
</body>