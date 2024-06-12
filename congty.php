<?php

function getone_congty($ten_CT){
    $conn = connectdb();
    $sql = "SELECT * FROM congty WHERE congty.ten_CT='$ten_CT'";
    $result = mysqli_query($conn, $sql);
    $kq = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $kq[] = $row; // Thêm hàng vào mảng
    }
    mysqli_free_result($result);
    return $kq;
}

function get_congty($ma_nganh){
    $conn = connectdb();
    $sql = "SELECT * FROM congty, nganh
            WHERE congty.ma_nganh=nganh.ma_nganh AND congty.ma_nganh='$ma_nganh'";
    $result = mysqli_query($conn, $sql);
    $kq = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $kq[] = $row; // Thêm hàng vào mảng
    }
    mysqli_free_result($result);
    return $kq;
}

function getall_congty(){
    $conn = connectdb();
    $sql = "SELECT * FROM congty, nganh
            WHERE congty.ma_nganh=nganh.ma_nganh";
    $result = mysqli_query($conn, $sql);
    $kq = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $kq[] = $row; // Thêm hàng vào mảng
    }
    mysqli_free_result($result);
    return $kq;
}

function update_CT($ten_CT, $sl){
    $conn = connectdb();
    $sql = "UPDATE congty SET so_luong='$sl' WHERE ten_CT='$ten_CT'";
    $success = mysqli_query($conn, $sql);
}

?>