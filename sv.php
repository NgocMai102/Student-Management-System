<?php
include_once('db.php');

function getall_sv(){
    $conn = connectdb();
    $sql = "SELECT * FROM sinhvien, taikhoan, nganh
            WHERE sinhvien.ma_SV=taikhoan.user AND sinhvien.ma_nganh=nganh.ma_nganh";
    $result = mysqli_query($conn, $sql);
    $kq = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $kq[] = $row;
    }
    mysqli_free_result($result);
    return $kq;
}

function search_sv($value){
    $conn = connectdb();
    $sql = "SELECT * FROM sinhvien, taikhoan, nganh
            WHERE 
                sinhvien.ma_SV = taikhoan.user
                AND sinhvien.ma_nganh = nganh.ma_nganh
                AND (
                    sinhvien.ma_SV LIKE '%$value%' OR
                    sinhvien.lop LIKE '%$value%' OR
                    taikhoan.fullname LIKE '%$value%' OR
                    nganh.ten_nganh LIKE '%$value%'
                )";
    $result = mysqli_query($conn, $sql);
    $kq = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $kq[] = $row; // Thêm hàng vào mảng
    }
    mysqli_free_result($result);
    return $kq;
}

function get3_sv(){
    
    $conn = connectdb();
    $sql = "SELECT *
            FROM sinhvien
            INNER JOIN taikhoan ON sinhvien.ma_SV = taikhoan.user
            INNER JOIN nganh ON sinhvien.ma_nganh = nganh.ma_nganh
            ORDER BY sinhvien.GPA DESC
            LIMIT 3;";
    $result = mysqli_query($conn, $sql);
    $kq = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $kq[] = $row; // Thêm hàng vào mảng
    }
    mysqli_free_result($result);
    return $kq;
}

function getone_sv($ma_SV){
    $conn = connectdb();
    $sql = "SELECT * FROM sinhvien, taikhoan, nganh WHERE sinhvien.ma_SV=taikhoan.user AND sinhvien.ma_nganh=nganh.ma_nganh and sinhvien.ma_SV='".$ma_SV."'";
    $result = mysqli_query($conn, $sql);
    $kq = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $kq[] = $row; // Thêm hàng vào mảng
    }
    mysqli_free_result($result);
    return $kq;
}

function deleteSV($ma_SV){
    $conn = connectdb();
    $sql = "DELETE FROM taikhoan WHERE user ='$ma_SV'";
    $success = mysqli_query($conn, $sql);
    if ($success) {
        echo 'Xóa sinh viên thành công';
    } else {
        echo 'Không xóa được sinh viên';
    }
}

function insertSV($fullname, $birth, $gender, $phone, $email, $addr, $ma_nganh, $GPA, $lop, $avata){
    $list_SV = array_column(getall_sv(), 'ma_SV');;
    do {
        $ma_SV = "B21DC".$ma_nganh.str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
    } while (in_array($ma_SV, $list_SV));
    $conn = connectdb();
    $sql = "INSERT INTO taikhoan(user, fullname, birth, gender, phone, email, addr, avata)
            VALUES ('$ma_SV', '$fullname','$birth','$gender','$phone','$email','$addr', '$avata');";
    $sql .= "INSERT INTO sinhvien(ma_SV, ma_nganh, GPA, lop)
            VALUES ('$ma_SV', '$ma_nganh','$GPA','$lop')";
    $success = mysqli_multi_query($conn, $sql);
    // echo $sql;
    if ($success) {
        echo '<script>
                alert("Thêm sinh viên thành công");
                window.location.href = "index.php?act=dssinhvien";
            </script>';
    } else {
        echo '<script>
                alert("Thêm sinh viên thất bại");
                window.location.href = "index.php?act=dssinhvien";
            </script>';
    }
}

function adminUpdateSV($ma_SV, $pass, $fullname, $phone, $email, $birth, $gender, $lop, $ma_nganh, $GPA, $addr, $avata_file){
    $conn = connectdb();
    if($avata_file!=""){
        $avata="/BT2/uploads/".$avata_file;
        $sql ="UPDATE taikhoan SET avata='$avata' WHERE user='$ma_SV';";
    }
    $sql .= "UPDATE taikhoan SET fullname='$fullname', pass='$pass', birth='$birth', gender='$gender', phone='$phone', 
                email='$email', addr='$addr' WHERE user='$ma_SV';";
    $sql .="UPDATE sinhvien SET ma_nganh='$ma_nganh', GPA=$GPA, lop='$lop' WHERE ma_SV='$ma_SV'";
    $success = mysqli_multi_query($conn, $sql);
    if ($success) {
        echo '<script>
                alert("Cập nhật sinh viên thành công");
                window.location.href = "index.php?act=xemsuasinhvien&ma_SV='.$ma_SV.'";
            </script>';
    } else {
        echo '<script>
                alert("Cập nhật sinh viên thất bại");
                window.location.href = "index.php?act=xemsuasinhvien&ma_SV='.$ma_SV.'";
            </script>';
    }
}

function SVupdateThongTin($ma_SV, $fullname, $birth, $gender, $phone, $email, $addr, $avata_file){
    $conn = connectdb();
    if($avata_file!=""){
        $avata="/BT2/uploads/".$avata_file;
        $sql ="UPDATE taikhoan SET avata='$avata' WHERE user='$ma_SV';";
    }
    $sql .= "UPDATE taikhoan SET fullname='$fullname', birth='$birth', gender='$gender', phone='$phone', 
                email='$email', addr='$addr' WHERE user='$ma_SV';";
    $success = mysqli_multi_query($conn, $sql);
    // echo $sql;
    if ($success) {
        echo '<script>
                alert("Cập nhật thông tin thành công");
                window.location.href = "index.php?act=detail_infor";
            </script>';
    } else {
        echo '<script>
                alert("Cập nhật thông tin thất bại");
                window.location.href = "index.php?act=detail_infor";
            </script>';
    }
}

    function thongkeSvNganh() {
        $conn = connectdb();
        $sql = "SELECT 
                    nganh.ma_nganh, 
                    nganh.ten_nganh, 
                    COUNT(*) AS so_luong_sv 
                FROM 
                    nganh
                INNER JOIN 
                    sinhvien 
                ON 
                    nganh.ma_nganh = sinhvien.ma_nganh 
                GROUP BY 
                    nganh.ma_nganh, 
                    nganh.ten_nganh;";
    
        $result = mysqli_query($conn, $sql);
    
        $kq = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $kq[] = $row; // Thêm hàng vào mảng
        }
        mysqli_free_result($result);
        return $kq;
    }

    function thongke_sv_lop(){
        $conn = connectdb();
    
        $sql = "SELECT lop, COUNT(*) AS so_luong_sv FROM sinhvien GROUP BY lop";
        $result = mysqli_query($conn, $sql);
        $kq = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $kq[] = $row; // Thêm hàng vào mảng
        }
        mysqli_free_result($result);
        return $kq;
    }
    
    function get_sv_one_condition($key, $value){
        $conn = connectdb();
        $sql = "SELECT * FROM sinhvien 
                JOIN taikhoan ON sinhvien.ma_SV = taikhoan.user 
                JOIN nganh ON sinhvien.ma_nganh = nganh.ma_nganh 
                WHERE sinhvien.$key = '$value'";
        $result = mysqli_query($conn, $sql);
        $kq = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $kq[] = $row; // Thêm hàng vào mảng
        }
        mysqli_free_result($result);
        return $kq;
    }

    function get_dssv_ungtuyen($ten_CT){
        $conn = connectdb();
        $sql = "SELECT * FROM congty_sinhvien
                JOIN sinhvien ON congty_sinhvien.ma_SV = sinhvien.ma_SV
                JOIN taikhoan ON sinhvien.ma_SV = taikhoan.user 
                JOIN nganh ON sinhvien.ma_nganh = nganh.ma_nganh 
                WHERE congty_sinhvien.ten_CT = '$ten_CT'";
        $result = mysqli_query($conn, $sql);
        $kq = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $kq[] = $row;
        }
        mysqli_free_result($result);
        return $kq;
    }

    function thongke_sv_ungtuyen(){
        $sql = "SELECT congty.ten_CT, nganh.ten_nganh, congty.yc_GPA, 
                COUNT(congty_sinhvien.ten_CT) as so_luong_sv 
                FROM congty_sinhvien 
                JOIN congty ON congty_sinhvien.ten_CT=congty.ten_CT 
                JOIN nganh ON congty.ma_nganh = nganh.ma_nganh 
                GROUP BY congty.ten_CT, nganh.ten_nganh, congty.yc_GPA;";
        $conn = connectdb();
        $result = mysqli_query($conn, $sql);
        $kq = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $kq[] = $row; // Thêm hàng vào mảng
        }
        mysqli_free_result($result);
        return $kq;
    }

    function thongke_sv_gpa(){
        $conn = connectdb();
        $sql = " SELECT CASE
                WHEN GPA >= 3.6 THEN 'Xuất sắc'
                WHEN GPA >= 3.2 THEN 'Giỏi'
                WHEN GPA >= 2.5 THEN 'Khá'
                WHEN GPA >= 1.5 THEN 'Trung bình'
                ELSE 'Yếu'
                END AS hoc_luc, COUNT(*) AS so_luong_sv
                FROM sinhvien
                GROUP BY hoc_luc
                ORDER BY 
                CASE
                    WHEN GPA >= 3.6 THEN 1
                    WHEN GPA >= 3.2 THEN 2
                    WHEN GPA >= 2.5 THEN 3
                    WHEN GPA >= 1.5 THEN 4
                    ELSE 5
                END";
        $result = mysqli_query($conn, $sql);
        $kq = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $kq[] = $row; // Thêm hàng vào mảng
        }
        mysqli_free_result($result);
        return $kq;
    }

    function get_sv_hocluc($hoc_luc){
        $sql = "SELECT * FROM sinhvien 
                JOIN taikhoan ON sinhvien.ma_SV = taikhoan.user 
                JOIN nganh ON sinhvien.ma_nganh = nganh.ma_nganh
                ";
        if($hoc_luc==="Xuất sắc"){
            $sql .= " WHERE sinhvien.GPA >= 3.6";
        
        }else if($hoc_luc==="Giỏi"){
            $sql .= " WHERE 3.6 > GPA AND GPA >= 3.2";
        }else if($hoc_luc==="Khá"){
            $sql .= " WHERE 3.2 > GPA AND GPA >= 2.5";
        }else if($hoc_luc==="Trung bình"){
            $sql .= " WHERE 2.5 > GPA AND GPA >= 1.5";
        }else{
            $sql .= " WHERE GPA < 1.5";
        }
        $conn = connectdb();
        $result = mysqli_query($conn, $sql);
        $kq = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $kq[] = $row;
        }
        mysqli_free_result($result);
        return $kq;
    }
?>