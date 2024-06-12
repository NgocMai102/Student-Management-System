<!DOCTYPE html>
<html lang="vn">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý đào tạo</title>
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat" type="text/css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato" type="text/css"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

  <script src="https://kit.fontawesome.com/ce4d3b4453.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <!-- <link rel="stylesheet" href="./view/styles.css"> -->
  <script src="script.js"></script>
  <style>
    #myCarousel {
        margin-top: 57px;
        z-index: 0;
    }
    .navbar {
        background-color: white;
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 1001;
    }
    .nav-link:hover {
      background: #D30000;
      color: white;
    }
    
    .nav-link{
        color: black;
    }
    .dropdown-menu {
        z-index: 1002;
    }
    .dropdown-item:hover{
        background-color: red;
        color: white;
    }
    .dropdown-item.active, .dropdown-item:active {
        background-color: red;
        color: black;
    }
    .contents {
        margin-left: 48px;
        margin-right: 48px;
        text-align: justify;
    }
    .col-sm-3 {
        padding: 24px;
        color: black;
    }
    .mycontainer {
        margin-left: 48px;
        margin-right: 48px;
    }
    h3 {
        padding-top: 40px;
    }
    .col-sm-4:hover .boder {
      border: 1.5px solid rgb(141, 17, 17);
      border-radius: 4px;
    }
    .question p{
      border: 1.5px solid rgb(174, 169, 169);
      border-radius: 4px;
      box-shadow: 2px;
      padding: 20px;
      margin-left: 50px;
      margin-right: 50px;
    }
    .question p:hover {
      background-color: rgb(141, 17, 17);
      color: black;
    }
    .no-hover:hover {
      background: none !important;
      color: inherit !important; 

    }
    .form-control {
        border: 1px solid black;
    }
    
    .sidebar {
      position: sticky;
      top: 0px;
      height: 100vh;
      background-color: white;
      color: black;
      padding-top: 40px;
    }

    .sidebar .nav-item {
      margin-bottom: 8px;
    }

    .sidebar .nav-link {
      color: black; 
      padding-left: 50px
    }

    .sidebar .nav-item.active {
      background-color: red;
      color: black;
    }

    /* Đặt hiệu ứng khi hover vào ảnh */
    .image-hover-zoom {
      transition: transform 0.3s ease; /* Thời gian và kiểu chuyển tiếp */
    }

    .image-hover-zoom:hover {
      transform: scale(1.1); /* Phóng to lên 1.1 lần */
    }

  </style>
</head>

<body id="myPage">
  <nav class="navbar navbar-expand sticky-top">
    <a class="navbar-brand ms-4 d-flex" href="index.php">
      <img src="./images/favicon.jpg" width="50px">  
      <!-- <h5 margin="0px" style="color: black; width: 62.8334px; height: 31.3334px; transform: translate(12.6667px, 10px);">PTIT</h5> -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar"></button>
    <div class="collapse navbar-collapse ms-auto" id="collapsibleNavbar">
      <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Trang Chủ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?act=GioiThieu">Giới Thiệu</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="index.php?act=DaoTaoDH" role="button" data-bs-toggle="dropdown">Giáo dục và Đào Tạo</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="index.php?act=DaoTaoDH">Đào Tạo Đại Học</a></li>
              <li><a class="dropdown-item" href="index.php?act=SauDH">Đào Tạo Sau Đại Học</a></li>
              <li><a class="dropdown-item" href="#DaoTaoQuocTe" target="_blank">Đào Tạo Quốc Tế</a></li>
            </ul>
          <li class="nav-item">
            <a class="nav-link" href="index.php?act=TuyenSinh">Tuyển Sinh</a>
          </li>
          <?php 
              if (isset($_SESSION['user']) && ($_SESSION['user'] != "") && isset($_SESSION['role']) && $_SESSION['role'] == 1){
                  echo '<li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Sinh Viên</a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="index.php?act=dangKyTuyenDung">Tuyển Dụng</a></li>
                            <li><a class="dropdown-item" href="index.php?act=dsnguyenvong">Nguyện Vọng</a></li>
                          </ul>
                        </li>';
              } else if (isset($_SESSION['user']) && ($_SESSION['user'] != "") && isset($_SESSION['role']) && $_SESSION['role'] == 0){
                echo '<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Danh sách</a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="index.php?act=dssinhvien">Danh sách sinh viên</a></li>
                          <li><a class="dropdown-item" href="index.php?act=dslop">Danh sách lớp</a></li>
                          <li><a class="dropdown-item" href="index.php?act=dsnganh">Danh sách ngành</a></li>
                          <li><a class="dropdown-item" href="index.php?act=dstuyendung">Danh sách tuyển dụng</a></li>
                        </ul>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="index.php?act=thongkesv">Thống kê sinh viên</a>
                      </li>';
              }
          ?>
      </ul>
    </div>
    <ul class="navbar-nav me-5">
      <!-- <li class="nav-item">
        <a class="nav-link" href="DangKy.html"><i class="fas fa-user-alt"></i> Đăng Ký</a>
      </li> -->
      <?php 
        if (isset($_SESSION['user']) && $_SESSION['user'] != ""){
      
          echo '<li class="nav-item">
                  <a class="nav-link no-hover" href="index.php?act=detail_infor"><img src="'. $_SESSION['avata'] .'" class="rounded-circle" alt="avata.jpg" width="25" height="25" style="
                  width: 25px;
                  height: 25px;
                  object-fit: cover;
                  object-position: 100% 0;
                "></a>
                </li>';
              
          echo '<li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="index.php?act=detail_infor" role="button" data-bs-toggle="dropdown">'. $_SESSION['fullname'].'</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="index.php?act=showthongtinsv&ma_SV='.$_SESSION['user'].'"><i class="bi bi-person fs-5"></i> Trang cá nhân</a></li>
                    <li><a class="dropdown-item" href="index.php?act=changepass"><i class="bi bi-person-lock fs-5"></i> Đổi mật khẩu</a></li>
                  </ul>
                </li>';

          echo '<li class="nav-item">
                  <a class="nav-link" href="index.php?act=logout"><i class="bi bi-box-arrow-in-right"></i>   Đăng Xuất</a>
                </li>';

        }else {
            echo '<li class="nav-item">
                    <a class="nav-link" href="index.php?act=login"><i class="bi bi-box-arrow-in-right"></i>   Đăng Nhập</a>
                  </li>';
        }
      ?>
    </ul>
  </nav>