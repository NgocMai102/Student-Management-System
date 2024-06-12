
<?php
if(isset($_GET['ma_SV'])) {
    $ma_SV = $_GET['ma_SV'];
    $thongtinsv1 = getone_sv($ma_SV);
?>

<div class="contents" style="margin-top: 80px; margin-left: 0px">
        <div class="row d-flex justify-content-center align-content-center">
            <div class="col-sm-5">
                <div class="container" style="max-width: auto;">
                    <form action="" method="post" enctype="multipart/form-data">
                        <h3><br></h3>
                        <div class="mb-3 text-center">
                            <img src="<?= $thongtinsv1[0]['avata'] ?>" alt="Avatar" width="250px" height="300px" class="img-fluid">
                        </div>
                        <div class="mb-3 text-center">
                            <h4><?= $thongtinsv1[0]['fullname'] ?></h4>
                            <?php
                                if ($thongtinsv1[0]['role'] == 1) {
                                    echo "Sinh viên";
                                } 
                                else if ($thongtinsv1[0]['role'] == 0) {
                                    echo "Quản trị viên";
                                }
                            ?>
                        </div>                        
                        <div class="mb-3" style="font-size: 16px; padding-left: 150px;">
                            <p class="pt-3"><i class="bi bi-person"> </i><?= $thongtinsv1[0]['ma_SV'] ?></p>
                            <p><i class="bi bi-telephone"> </i><?= $thongtinsv1[0]['phone'] ?></p>
                            <p><i class="bi bi-envelope-at"> </i><?= $thongtinsv1[0]['email'] ?></p>
                            <p><i class="bi bi-cake2"> </i><?= $thongtinsv1[0]['birth'] ?></p>
                            <p><i class="bi bi-gender-male"> </i><?= $thongtinsv1[0]['gender'] ?></p>
                            <p><i class="bi bi-flower2"> </i><?= $thongtinsv1[0]['lop'] ?></p>
                            <p><i class="bi bi-card-list"> </i><?= $thongtinsv1[0]['ten_nganh'] ?></p>
                            <p><i class="bi bi-award"> </i><?= $thongtinsv1[0]['GPA'] ?></p>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-sm-7">
                <div class="container" style="max-width: auto;">
                    <h3 class="mt-5 mb-4 text-center">Thông tin chi tiết</h3>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="avata" class="form-label">Ảnh đại diện:</label><br>
                            <img src="<?= $thongtinsv1[0]['avata'] ?>" width="150px"><br>
                            <input type="button" style="margin-top: 5px; width: 100px; height: 30px;" value="Chọn ảnh" onclick="document.getElementById('avata').click();">
                            <input type="file" id="avata" name="avata" style="display: none;">
                            <span id="file-name" style="margin-left: 10px;">Không có tệp nào được chọn</span>
                            <script>
                                var fileInput = document.getElementById('avata');
                                var fileNameSpan = document.getElementById('file-name');

                                fileInput.addEventListener('change', function () {
                                    if (fileInput.files.length > 0) {
                                    fileNameSpan.textContent = fileInput.files[0].name;
                                    } else {
                                    fileNameSpan.textContent = "Không có tệp nào được chọn";
                                    }
                                });
                            </script>
                        </div>

                        <div class="mb-3">
                            <label for="ma_SV" class="form-label">Mã sinh viên:</label>
                            <input type="text" class="form-control" id="ma_SV" name="ma_SV" value="<?= $thongtinsv1[0]['ma_SV'] ?>" readonly>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-5">
                                <label for="user" class="form-label">Tên đăng nhập:</label>
                                <input type="text" class="form-control" id="user" name="user" value="<?=$thongtinsv1[0]['user']?>" readonly>
                            </div>
                            <div class="col-sm-7">
                                <label for="pass" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" id="pass" name="pass" value="<?=$thongtinsv1[0]['pass']?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Họ và tên:</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $thongtinsv1[0]['fullname'] ?>" required>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-sm-5">
                                <label for="phone" class="form-label">Số điện thoại:</label>
                                <input type="tel" class="form-control" id="phone" name="phone" value="<?= $thongtinsv1[0]['phone'] ?>">
                            </div>
                            <div class="col-sm-7">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $thongtinsv1[0]['email'] ?>" required>
                            </div>
                        </div>

                        

                        <div class="mb-3">
                            <label for="birth" class="form-label">Ngày sinh:</label>
                            <input type="date" class="form-control" id="birth" name="birth" value="<?= $thongtinsv1[0]['birth'] ?>">
                        </div>
                        <div class="mb-3">
                            <?php
                                $currentGender = $thongtinsv1[0]['gender'];
                                $isMaleChecked = ($currentGender === 'Nam') ? 'checked' : '';
                                $isFemaleChecked = ($currentGender === 'Nữ') ? 'checked' : '';
                                $isOtherChecked = ($currentGender === 'Khác') ? 'checked' : '';
                            ?>
                            <div class="mb-3">
                                <label class="form-label">Giới tính:</label><br>
                                <input type="radio" id="nam" name="gender" value="Nam" <?= $isMaleChecked ?>>
                                <label for="nam">Nam</label>
                                <input type="radio" id="nu" name="gender" value="Nữ" <?= $isFemaleChecked ?>>
                                <label for="nu">Nữ</label>
                                <input type="radio" id="khac" name="gender" value="Khác" <?= $isOtherChecked ?>>
                                <label for="khac">Khác</label>
                            </div>
                        </div>
                        <div class="mb-3 row d-flex">
                            <div class="col-sm-4">
                                <label for="lop" class="form-label">Lớp:</label>
                                <?php
                                if ($_SESSION['role'] == 0) {
                                ?> 
                                    <input type="text" class="form-control" id="lop" name="lop" value="<?=$thongtinsv1[0]['lop']?>" required>
                                <?php } 
                                else if ($_SESSION['role'] == 1) { ?>
                                    <input type="text" class="form-control" id="lop" name="lop" value="<?=$thongtinsv1[0]['lop']?>" readonly>
                                <?php }?>
                            </div>
                            <div class="col-sm-5">
                            <label for="major"class="form-label" >Ngành học:</label>
                                
                                <?php
                                    include_once 'nganh.php';
                                    
                                    if ($_SESSION['role'] == 0) { ?>
                                    <select name="dsnganh" class="form-control">
                                    <?php
                                        $ma_nganh = $thongtinsv1[0]['ma_nganh'];
                                        $dsnganh = selectAll_nganh();
                                        if(isset($dsnganh)){
                                            foreach($dsnganh as $nganh){
                                                if($nganh['ma_nganh']==$ma_nganh)
                                                    echo '<option value="'.$nganh['ma_nganh'].'" selected>'.$nganh['ten_nganh'].'</option>';
                                                else
                                                    echo '<option value="'.$nganh['ma_nganh'].'">'.$nganh['ten_nganh'].'</option>';
                                            }
                                        }
                                    ?>
                                    </select>
                                    <?php }
                                    else if ($_SESSION['role'] == 1) { ?>
                                        <input type="text" class="form-control" id="nganh" name="nganh" value="<?= $thongtinsv1[0]['ten_nganh']?>" readonly>
                                <?php } ?>
                            </div>
            
                            <div class="col-sm-3" style = "padding-top: 0px;">
                                <label for="GPA" class="form-label">GPA:</label>
                                <?php
                                if ($_SESSION['role'] == 0) {
                                ?> 
                                    <input type="number" class="form-control" id="GPA" name="GPA" step="0.01" min="0" max="4" value="<?=$thongtinsv1[0]['GPA']?>" required>
                                <?php } 
                                else if ($_SESSION['role'] == 1) { ?>
                                    <input type="number" class="form-control" id="GPA" name="GPA" step="0.01" min="0" max="4" value="<?=$thongtinsv1[0]['GPA']?>" readonly>
                                <?php }?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="addr" class="form-label">Địa chỉ:</label>
                            <textarea rows="4" class="form-control" id="addr" name="addr"><?= $thongtinsv1[0]['addr'] ?></textarea>
                        </div>

                        <input type="submit" class="btn btn-danger text-light" name="update" value="Cập nhật">
                        <input type="button" class="btn btn-danger text-light" name="quaylai" value="Quay lại" onclick="window.location.href='index.php';">
                        <br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
        if ((isset($_POST['update'])) && ($_POST['update'])) {
          $ma_SV = $_POST['ma_SV'];
          $pass = $_POST['pass'];
          $fullname = $_POST['fullname'];
          $phone = $_POST['phone'];
          $email = $_POST['email'];
          $birth = $_POST['birth'];
          $gender = $_POST["gender"] ?? "";
          $lop = $_POST['lop'];
          $ma_nganh = $_POST['dsnganh'];
          $GPA = $_POST['GPA'];
          $addr = $_POST['addr'];
          $avata_file = "";
          if ($_FILES['avata']['name'] != "") {
              $target_file = basename($_FILES['avata']['name']);

              $uploadOk = 1;
              $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

              if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
                  $uploadOk = 0;
              }
              if ($uploadOk == 1) {
                  if (move_uploaded_file($_FILES["avata"]["tmp_name"], $target_file)) {
                      $avata_file = $target_file;
                  } else {
                      echo "Tải lên không thành công";
                  }
              }
          }
          if ($_SESSION['role'] == 1) {
            SVupdateThongTin($ma_SV, $fullname, $birth, $gender, $phone, $email, $addr, $avata_file);
          }
          else if ($_SESSION['role'] == 0) {
            adminUpdateSV($ma_SV, $pass, $fullname, $phone, $email, $birth, $gender, $lop, $ma_nganh, $GPA, $addr, $avata_file);
          }
          
        }
    }
?>
