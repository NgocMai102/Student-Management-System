<div class="container" style = "padding-left: 50px; padding-top: 70px; width: 900px">
    <h1 class="mt-5 mb-4 text-center">Thêm sinh viên</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="fullname" class="form-label">Họ và tên:</label>
            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nhập vào họ tên" required>
        </div>
        <div class="mb-3">
            <label for="avata" class="form-label">Ảnh đại diện:</label>
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
        <div class="mb-3 row">
            <div class="col-sm-6">
                <label for="phone" class="form-label">Số điện thoại:</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Nhập vào số điện thoại">
            </div>
            <div class="col-sm-6">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Nhập vào email" required>
            </div>
        </div>
        <div class="mb-3">
            <label>Giới tính:</label>
            <input type="radio" id="nam" name="gender" value="Nam">
            <label for="nam">Nam</label>
            <input type="radio" id="nu" name="gender" value="Nữ">
            <label for="nu">Nữ</label>
            <input type="radio" id="khac" name="gender" value="Khác">
            <label for="khac">Khác</label>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-6">
                <label for="birth" class="form-label">Ngày sinh:</label>
                <input type="date" class="form-control" id="birth" name="birth">
            </div>
            <div class="col-sm-6">
                <label for="lop" class="form-label">Lớp:</label>
                <input type="text" class="form-control" id="lop" name="lop" placeholder="Nhập vào lớp" required>
            </div>
        </div>
        <div class="mb-3">
            <label for="major" class="form-label">Ngành học:</label>
            <select name="dsnganh" style = "width: 100%; height: 35px;" required>
                <option value="0">  Chọn ngành</option>
                <?php
                    include_once 'nganh.php';
                    $dsnganh = selectAll_nganh();
                    if(isset($dsnganh)){
                        foreach($dsnganh as $nganh){
                            echo '<option value="'.$nganh['ma_nganh'].'">'.$nganh['ten_nganh'].'</option>';
                        }
                    }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="GPA" class="form-label">GPA:</label>
            <input type="number" class="form-control" id="GPA" name="GPA" step="0.01" min="0" max="4" placeholder="Nhập vào GPA" required>
        </div>
        <div class="mb-3">
            <label for="addr" class="form-label">Địa chỉ:</label>
            <textarea rows="4" class="form-control" id="addr" name="addr"></textarea>
        </div>
        
        <input type="submit" class="btn btn-danger text-light" name = "themmoi" id = "btn_them" value="Thêm sinh viên">
        <button class="btn btn-danger"><a href="index.php?act=dssinhvien" style="text-decoration: none; color: white;">Quay lại</a></button>
        </div>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script type = "text/javascript">
    document.getElementById("btn_them").onclick = function(){
        var fullname = document.getElementById("fullname").value;
        var phone = document.getElementById("phone").value;
        var email = document.getElementById("email").value;
        var birth = document.getElementById("birth").value;
        var lop = document.getElementById("lop").value;
        var dsnganh = document.getElementById("dsnganh").value;
        var GPA = document.getElementById("GPA").value;
        var addr = document.getElementById("addr").value;
        var avata = document.getElementById("avata").value;
        if(fullname == "" || phone == "" || email == "" || birth == "" || lop == "" || dsnganh == "0" || GPA == "" || addr == ""){
            alert("Vui lòng nhập đầy đủ thông tin");
        } else {
            $.ajax({
                url:"addsv.php",
                method:"POST",
                data: {
                    fullname: fullname,
                    phone: phone,
                    email: email,
                    birth: birth,
                    lop: lop,
                    dsnganh: dsnganh,
                    GPA: GPA,
                    addr: addr,
                    avata: avata
                },
                success: function(data){
                    alert(data);
                }
            });
        };
    }
</script>
</body>
</html>