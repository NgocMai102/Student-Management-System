<?php
    include "./formThemSV.php";
    if((isset($_POST['themmoi'])) && ($_POST['themmoi'])){
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $birth = $_POST['birth'];
        if(isset($_POST["gender"])){
            $gender = $_POST["gender"];
        }     
        $addr = $_POST['addr'];
        $ma_nganh = $_POST['dsnganh']; // lấy value của name trong select
        $GPA = $_POST['GPA'];
        $lop = $_POST['lop'];
        $target_dir = "/BT2/uploads/";
        $target_dir = "";
        $target_file = $target_dir.basename($_FILES['avata']['name']);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            $uploadOk = 0;
            $avata = "/QLSV/images/avatar-default.svg";
        }
        if($uploadOk == 1){
            $avata = $target_file;
        }
        move_uploaded_file($_FILES["avata"]["tmp_name"], $avata);
        if($ma_nganh!='0'){
          insertSV($fullname, $birth, $gender, $phone, $email, $addr, $ma_nganh, $GPA, $lop, $avata);
        }else{
          echo '<script>
                    alert("Thêm sinh viên thất bại");
                    window.location.href = "index.php?act=addsv";
                </script>';
        }
    }
?>