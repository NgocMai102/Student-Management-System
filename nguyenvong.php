<?php

function get_nguyenvong($ma_SV){
    $conn = connectdb();
    $sql = "SELECT * FROM congty_sinhvien, congty, nganh 
            WHERE congty_sinhvien.ma_SV='$ma_SV' 
            AND congty_sinhvien.ten_CT=congty.ten_CT 
            AND nganh.ma_nganh=congty.ma_nganh";
    $result = mysqli_query($conn, $sql);
    $kq = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $kq[] = $row; // Thêm hàng vào mảng
    }
    mysqli_free_result($result);
    return $kq;
}

function getall_ungtuyen($ma_SV){
    $conn = connectdb();
    $sql = "SELECT * FROM congty_sinhvien WHERE congty_sinhvien.ma_SV='$ma_SV'";
    $result = mysqli_query($conn, $sql);
    $kq = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $kq[] = $row; // Thêm hàng vào mảng
    }
    mysqli_free_result($result);
    return $kq;
}

function check_ungtuyen($ten_CT, $ma_SV, $stt_nguyenvong){
    $conn=connectdb();
    $ketqua = getall_ungtuyen($ma_SV);
    $list_nguyenvong = array_column($ketqua, 'stt_nguyenvong');
    $list_congty_ungtuyen = array_column($ketqua, 'ten_CT');
    if(in_array($stt_nguyenvong, $list_nguyenvong)){
        echo '<script>
                alert("Số thứ tự nguyện vọng này đã được đăng kí.Mời chọn lại số thứ tự nguyện vọng đăng kí");
                window.location.href = "index.php?act=tuyendung";
            </script>';
    } else { 
        if(in_array($ten_CT, $list_congty_ungtuyen)){
            echo '<script>
                    alert("Bạn đã đăng kí ứng tuyển ở công ty này. Mời chọn công ty khác");
                    window.location.href = "index.php?act=tuyendung";
                </script>';
        }else{
            //Kiểm tra còn slot để đăng kí hay không
            $kq=getone_congty($ten_CT);
            if($kq!==null){
                $sl=(int) $kq[0]['so_luong'];
                if ( $sl <= 0 ) {
                    echo '<script>
                            alert("Hết slot ứng tuyển. Vui lòng chọn công ty khác");
                            window.location.href = "index.php?act=tuyendung";
                        </script>';
                }else{
                    // Lấy GPA của sinh viên và yêu cầu GPA của công ty
                    $query1 = "SELECT * FROM sinhvien WHERE sinhvien.ma_SV='$ma_SV'";
                    $success1 = mysqli_query($conn, $query1);
                    $gpa = null;
                    if ($success1) {
                        $row = mysqli_fetch_assoc($success1);
                        $gpa = (float) $row['GPA'];
                    } else {
                        echo "Lỗi khi truy vấn GPA sinh viên: " . mysqli_error($conn);
                    }
                    
                    $query2 = "SELECT * FROM congty WHERE congty.ten_CT='$ten_CT'";
                    $success2 = mysqli_query($conn, $query2);
                    $yc_gpa = null;
                    
                    if ($success2) {
                        $row = mysqli_fetch_assoc($success2);
                        $yc_gpa = (float) $row['yc_GPA'];
                    } else {
                        echo "Lỗi khi truy vấn yêu cầu GPA của công ty " . mysqli_error($conn);
                    }

                    // Kiểm tra GPA của sinh viên so với yêu cầu của công ty
                    if ($gpa !== null && $yc_gpa !== null) {
                        if ($gpa < $yc_gpa) {
                            echo '<script>
                                    alert("GPA không đạt yêu cầu.");
                                    window.location.href = "index.php?act=tuyendung";
                                </script>';
                        } else {
                            return TRUE;
                        }
                    } else {
                        echo '<script>
                                alert("Không thể so sánh GPA. Vui lòng thử lại.");
                                window.location.href = "index.php?act=tuyendung";
                            </script>';
                    }
                }
            } 
        }
    }
}

function insert_ungtuyen($ten_CT, $ma_SV, $stt_nguyenvong){
    if(check_ungtuyen($ten_CT, $ma_SV, $stt_nguyenvong)){
        $conn = connectdb();
        $sql = "INSERT INTO congty_sinhvien(ten_CT, ma_SV, stt_nguyenvong) VALUES ('$ten_CT', '$ma_SV', $stt_nguyenvong);";
        $success = mysqli_multi_query($conn, $sql);
        // echo $sql;
        if ($success) {
            $kq=getone_congty($ten_CT);
            if($kq!==null){
                $sl=(int) $kq[0]['so_luong'];
                update_CT($ten_CT, $sl-1);
                echo '<script>
                        alert("Ứng tuyển thành công");
                        window.location.href = "index.php?act=nguyenvong";
                    </script>';
            }
        } else {
            echo '<script>
                    alert("Ứng tuyển thất bại");
                    window.location.href = "index.php?act=tuyendung";
                </script>';
        }
    }
}

function delete_ungtuyen($id){
    $conn = connectdb();

    // Tìm công ty và update vào cột số lượng
    $sql = "SELECT * FROM congty_sinhvien WHERE id = $id";
    $success = mysqli_query($conn, $sql);
    $ten_CT = null;
    
    if ($success) {
        $row = mysqli_fetch_assoc($success);
        $ten_CT = $row['ten_CT'];
    } else {
        echo "Lỗi khi truy vấn yêu cầu ten_CT trong bảng congty_sinhvien " . mysqli_error($conn);
    }
    if($ten_CT!==null){
        $kq=getone_congty($ten_CT);
        $sql1 = "DELETE FROM congty_sinhvien WHERE id = $id";
        $success1 = mysqli_query($conn, $sql1);
        if($kq!==null && $success1){
            $sl=(int) $kq[0]['so_luong'];
            update_CT($ten_CT, $sl+1);
            echo '<script>
                    alert("Xóa nguyện vọng thành công");
                    window.location.href = "index.php?act=nguyenvong";
                </script>';
            }
        } else {
            echo '<script>
                    alert("Xóa nguyện vọng thất bại");
                    window.location.href = "index.php?act=nguyenvong";
                </script>';
        }
    }

?>