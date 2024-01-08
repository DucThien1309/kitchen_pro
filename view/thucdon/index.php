<?php
require_once "view/components/header.php";
?>

<?php
if (isset($_POST['selectedMonAn'])) {
    // Lặp qua mảng các mã món ăn đã chọn và thêm chúng vào cơ sở dữ liệu
    $selectedMonAn = $_POST['selectedMonAn'];
    foreach ($selectedMonAn as $maMon) {
        // Thực hiện thêm $maMon vào bảng thucdon_mamon
        // Ví dụ: INSERT INTO thucdon_mamon (MaThucDon, MaMon) VALUES ($maThucDon, $maMon)
        // Thay đổi tên bảng và cơ sở dữ liệu của bạn theo yêu cầu
    }
}
?>

<div class="text-center wow fadeInUp" data-wow-delay="0.1s">
    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
    <!-- <h1 class="mb-5">Thực Đơn Trong Tuần</h1> -->
</div>

<hr align="center">

<div class="container">
    <form action="?controller=quan_li&action=create&role=1" method="post">
        <!-- Modal -->
        <button type="button" href="" id="them" data-toggle="modal" data-target="#myModal">
            Thêm Món Ăn
        </button>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Danh sách món ăn</h5>
                        <select name="mySelect" id="">
                            <?php
                            foreach ($arr as $key => $value) {
                                echo "<option value=" . $value['MaThucDon'] . ">" . $value['MoTa'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="modal-body">
                        <div class="row g-4">
                            <?php foreach ($monan as $monAn) : ?>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="view/assets/img/menu-1.jpg" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <input type="hidden" value="<?php echo $monAn["MaMon"]; ?>"></input>
                                                <span>
                                                    <?php echo $monAn["TenMonAn"]; ?>
                                                </span>
                                                <span class="text-primary">
                                                    <div class="form-group">
                                                        <input type="checkbox" name="selectedMonAn[]" value="<?php echo $monAn["MaMon"]; ?>">
                                                        <label for="myCheckbox"></label>
                                                    </div>
                                                </span>
                                            </h5>
                                            <small class="fst-italic">
                                                <?php echo $monAn["MoTaMonAn"]; ?>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeModal">Đóng</button>
                        <button type="submit" class="btn btn-primary" formaction="?controller=quan_li&action=store&role=1" id="addModal">Thêm</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- End Modal -->

    <form action="?controller=quan_li&action=view_thucdon&role=1"></form>
    <?php
    // print_r($arr_td);
    // echo "<br>";
    // // echo $arr_td[1][1][1];
    echo '<div class="tab-content">';
    echo '<div id="tab-1" class="tab-pane fade show p-0 active">
        <div class="row g-4">';
    for ($i = 1; $i <= count($arr_td); $i++) {
        switch ($i) {
            case 1:
                echo '<div class="thu_them">
                            <h1 class="thu">Monday<input type="hidden" value="1"></h1>
                          </div>';
                break;
            case 2:
                echo '<div class="thu_them">
                                <h1 class="thu">Tuesday<input type="hidden" value="1"></h1>
                              </div>';
                break;
            case 3:
                echo '<div class="thu_them">
                                    <h1 class="thu">Wednesday<input type="hidden" value="1"></h1>
                                  </div>';
                break;
            case 4:
                echo '<div class="thu_them">
                                        <h1 class="thu">Thurday<input type="hidden" value="1"></h1>
                                      </div>';
                break;
            case 5:
                echo '<div class="thu_them">
                                            <h1 class="thu">Friday<input type="hidden" value="1"></h1>
                                          </div>';
                break;
            case 6:
                echo '<div class="thu_them">
                                                <h1 class="thu">Saturday<input type="hidden" value="1"></h1>
                                              </div>';
                break;
            default:
                echo "Lỗi";
                break;
        }
        for ($j = 0; $j < count($arr_td[$i]); $j++) {
            for ($k = 0; $k < count($arr_td[$i][$j]); $k++) {
                // echo '<div class="tab-content">
                echo ' <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="view/assets/img/menu-1.jpg" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>' . $arr_td[$i][$j]["TenMonAn"] . '</span>
                                                <span class="text-primary">' . $arr_td[$i][$j]["GiaMonAn"] . ' VNĐ</span>
                                            </h5>
                                            <small style="max-width: 360px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" class="fst-italic">' . $arr_td[$i][$j]["MoTaMonAn"] . '</small>
                                        </div>
                                    </div>
                                </div>';
                break;
            }
            echo "<br>";
        }
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
    ?>
    </form>
</div>


<?php
require_once "view/components/footer.php";
?>