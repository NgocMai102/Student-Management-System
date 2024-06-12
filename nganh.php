<?php
    function selectAll_nganh(){
        $conn = connectdb();
        $sql = "SELECT * FROM nganh";
        $result = mysqli_query($conn, $sql);
        $kq = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $kq[] = $row; // Thêm hàng vào mảng
        }
        mysqli_free_result($result);
        echo $kq;
        return $kq;
    }
?>