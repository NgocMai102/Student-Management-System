<?php
    session_start();
    ob_start();

    include_once "db.php";

    include_once "user.php";
    include_once "sv.php";
    include_once "nganh.php";
    include_once "congty.php";
    include_once "nguyenvong.php";


    include "./header.php";
    
    if(isset($_GET['act'])){
        switch($_GET['act']){
            case 'xemsuasinhvien':
              include "./showsv.php";
              break;
            case 'login':
              include "./login.php";
              break;
            case 'dssinhvien':
              include "./dssinhvien.php";
              break;
            case 'dsnganh':
              include "./dsnganh.php";
              break;
            case 'dslop':
              include "./dslop.php";
              break;
            case 'dstuyendung':
              include "./dstuyendung.php";
              break;
            case 'dsnguyenvong':
              include "./dsnguyenvong.php";
              break;
            case 'thongkesv':
              include "./thongkesv.php";
              break;
            case 'showthongtinsv':
              include "./showsv.php";
              break;
            case 'addsv':
              include "./addsv.php";
              break;
            case 'dangKyTuyenDung':
              include "./dangKyTuyenDung.php";
              break;
            case 'logout':
               include "./logout.php";
               break;
            // case 'changepass':
            //   include "./controller/changepass.php";
            //   break;
            // case 'danhsachnganh':
            //     include "./danhsachnganh.php";
            //     break;
            default:
              include "./home.php";
              break;
          }
    }else{
        include "./home.php";
    }
    include "./footer.php"
?>