<div class="container text-align-center" style="margin-top: 120px; margin-bottom: 120px">
  <h2 class="text-center">DANH SÁCH CÔNG TY</h2>
  <div class="progress bg-danger mx-auto" style="height: 3px; width: 40%;"></div>
  
  <!-- Biểu mẫu tìm kiếm -->
  <form action="" method="post">
    <div class="d-flex text-align-center" style="margin-left: 60px; margin-right: 50px; margin-top: 50px;">
      <div class="col-sm-4" style="width: 131.333px;">
        <label for="major" class="form-label" style="height: 20.6667px; transform: translate(0px, 3.33331px);">Chọn ngành học:</label>
      </div>
      <div class="col-sm-8">
        <select name="dsnganh" style="width: 50%; height: 35px;">
          <option value="0">Chọn ngành</option>
          <?php
              include_once 'nganh.php';
              $dsnganh = selectAll_nganh();
              if (isset($dsnganh)) {
                  foreach ($dsnganh as $nganh) {
                      echo '<option value="' . $nganh['ma_nganh'] . '">' . $nganh['ten_nganh'] . '</option>';
                  }
              }
          ?>
        </select>
        <input type="submit" class="btn bg-danger text-light" name="search" value="Tìm kiếm" style="height: 35.9896px; transform: translate(0px, -2px);">
      </div>
    </div>
  </form>

<?php
    include_once 'congty.php';
    if ((isset($_POST['search'])) && ($_POST['search'])) {
        if ($_POST['dsnganh'] == 0) {
            $kq = getall_congty();
        } else {
            $ma_nganh = $_POST['dsnganh'];
            $kq = get_congty($ma_nganh);
        }
    } else {
        $kq = getall_congty();
    }
?>

  <!-- Bảng danh sách công ty -->
  <div class="d-flex justify-content-center align-items-center">
    <div class="table-responsive text-center" style="max-height: 280px; width: 1000px; margin-top: 20px;">
      <table class="table table-hover table-bordered border-black">
        <thead class="sticky-top">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên Công Ty</th>
            <th scope="col">Ngành Học</th>
            <th scope="col">Yêu Cầu GPA</th>
            <th scope="col">Số Lượng</th>
            <th scope="col">Thao Tác</th>
          </tr>
        </thead>
        <tbody>
          <!-- Tạo các hàng trong bảng -->
          <?php
          if (isset($kq) && (count($kq) > 0)) {
              foreach ($kq as $i => $congty) {
                  echo '
                  <tr>
                      <td>' . ($i + 1) . '</td>
                      <td>' . $congty['ten_CT'] . '</td>
                      <td>' . $congty['ten_nganh'] . '</td>
                      <td>' . $congty['yc_GPA'] . '</td>
                      <td>' . $congty['so_luong'] . '</td>
                      <td>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal-' . $i . '">Ứng tuyển</button>
                      </td>
                  </tr>';
              }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal bootstrap -->
  <?php
  if (isset($kq) && (count($kq) > 0)) {
      foreach ($kq as $i => $congty) {
          echo '
          <div class="modal fade" id="exampleModal-' . $i . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-' . $i . '" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title">Ứng tuyển vào ' . $congty['ten_CT'] . '</h5>
                      </div>
                      <div class="modal-body">
                          <form action="index.php?act=dangKyTuyenDung" method="post">
                              <input type="hidden" name="ten_CT" value="' . $congty['ten_CT'] . '">
                              <label for="nguyenvong-' . $i . '" class="form-label">Số thứ tự nguyện vọng:</label>
                              <input type="number" class="form-control" id="nguyenvong-' . $i . '" name="nguyenvong" step="1" min="1" max="5" required>
                              <div class="modal-footer">
                                  <input type="submit" class="btn btn-danger" name="xacnhan" value="Xác nhận">
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>';
      }
  }
  if((isset($_POST['xacnhan'])) && ($_POST['xacnhan'])){
    $ten_CT=$_POST['ten_CT'];
    $ma_SV=$_SESSION['user'];
    $stt_nguyenvong=$_POST['nguyenvong'];
    insert_ungtuyen($ten_CT, $ma_SV, $stt_nguyenvong);
  }
  ?>
</div>
