
<?php
    if((isset($_POST['login'])) && ($_POST['login'])){
      $user = $_POST['user'];
      $pass = $_POST['pass'];
      $kq = getuserinfo($user, $pass);
      // echo $kq[0]['role'];
      if ($kq != null) {
        $role = $kq[0]['role'];
        $_SESSION['role'] = $role;
       
            $_SESSION['user'] = $kq[0]['user'];
            $_SESSION['avata'] = $kq[0]['avata'];
            $_SESSION['fullname'] = $kq[0]['fullname'];
            header("Location: index.php");
    
        
      } else {
        echo '<script>
                  alert("Sai tên đăng nhập hoặc mật khẩu");
                  window.location.href = "index.php?act=login";
              </script>';
      }
    }
?>

<div class="container mt-3" style="height: 100%; display: flex; justify-content: center; align-items: center; margin-bottom: 50px;">
  <form action="index.php?act=login" method="post">
    <h2 style="text-align: center;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        margin-top: 100px">Đăng nhập</h2>
    <div class="mb-3 mt-3">
    
      <input type="text" class="form-control" id="user" style="width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;" placeholder="Nhập vào tên đăng nhập" name="user">
    </div>
    <div class="mb-3">
      <input type="password" class="form-control" id="pass" style="width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;" placeholder="Nhập vào mật khẩu" name="pass">
    </div>
    <!-- <div class="mb-3">
        <label for="confirmPassword" class="form-label">Xác nhận mật khẩu</label>
        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Xác nhận mật khẩu" required>
    </div> -->
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Ghi nhớ
      </label>
    </div>
    <input type="submit" class="btn btn-primary bg-danger" name="login" style="width: 100%;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;" value="Đăng nhập">
    <!-- <button type="button" class="btn btn-primary bg-danger"><a href="DangKy.html" style="text-decoration: none; color: white;">Đăng ký</a></button> -->

  </form>

  
</div>