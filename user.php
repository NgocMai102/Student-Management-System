<?php

    function checkuser($user, $pass){
        $conn = connectdb();
        $sql = "SELECT * FROM taikhoan WHERE user='$user' AND pass='$pass'";
        $result = mysqli_query($conn, $sql);
        $kq = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $kq[] = $row; // Thêm hàng vào mảng
        }
        mysqli_free_result($result);
        return $kq;
    }

    function getuserinfo($user, $pass){
        $conn = connectdb();
        $sql = "SELECT * FROM taikhoan WHERE user='$user' AND pass='$pass'";
        $result = mysqli_query($conn, $sql);
        $kq = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $kq[] = $row; // Thêm hàng vào mảng
        }
        mysqli_free_result($result);
        return $kq;
    }

    function getinfo($user){
        $conn = connectdb();
        $sql = "SELECT * FROM taikhoan WHERE user='$user'";
        $result = mysqli_query($conn, $sql);
        $kq = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $kq[] = $row; // Thêm hàng vào mảng
        }
        mysqli_free_result($result);
        return $kq;
    }

    function updatepass($user, $passnew){
        $conn = connectdb();
        $sql = "UPDATE taikhoan SET pass='$passnew' WHERE user='$user';";
        $success = mysqli_multi_query($conn, $sql);
        // echo $sql;
        if ($success) {
            echo '<script>
                    alert("Cập nhật mật khẩu thành công");
                    window.location.href = "index.php?act=changepass";
                </script>';
        } else {
            echo '<script>
                    alert("Cập nhật mật khẩu thất bại");
                    window.location.href = "index.php?act=changepass";
                </script>';
        }
    }
?>