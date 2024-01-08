<?php
session_start();
if (empty($_SESSION["id"])) {
    header("Location: ?error=Bạn cần đăng nhập!!!");
}
if ($_SESSION["role"] != 1) {
    header("Location: ?controller=dang_nhap&role=1");
}
?>

<?php
if (isset($_GET["noti"])) {
    $noti = $_GET["noti"];
    echo "<script type='text/javascript'>alert('$noti');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
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

    <!-- The data encoding type, enctype, MUST be specified as below -->
    <form enctype="multipart/form-data" action="?controller=xu_ly_dang_ky_theo_ds&role=1" method="POST">
        <!-- MAX_FILE_SIZE must precede the file input field -->

        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
        <!-- Name of input element determines name in $_FILES array -->
        <label for="userfile">Chọn tập tin</label>
        <input name="userfile" type="file" style="display:none" id="userfile" />
        <br>
        <input type="submit" value="Xem thông tin" />
    </form>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon"></span> Danh sách nhân viên</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form action="?controller=xac_nhan_dang_ky_theo_danh_sach&role=1" method="POST">
                        <center>
                            <table border="1" width="30%">
                                <?php
                                $row = 1;
                                if (isset($upload_file)) {
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
                                        echo "</table>";
                                        fclose($handle);
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
    } else
        echo "Hãy tải lên danh sách nhân viên của bạn!";
    ?>
</body>