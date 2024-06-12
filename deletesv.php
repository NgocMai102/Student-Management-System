<?php
    include_once 'sv.php';
    if (isset($_GET['ma_SV'])) {
        $ma_SV = $_GET['ma_SV'];
        deleteSV($ma_SV);
    }
    else {
        echo "Lỗi";
    }
?>