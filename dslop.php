<form action="" method="post">
  <div class="container text-align-center">
    <h2 class="text-center" style="margin-top: 100px">DANH SÁCH LỚP</h2>
    <div class="progress bg-danger mx-auto" style="height: 3px; width: 35%;"></div>
      <div class="d-flex justify-content-center align-items-center" >
        <div class="table-responsive" style="max-height: 280px; width: 800px; margin-top: 40px;">  
          <table class="table table-hover table-bordered border-black text-center align-text-bottom" >
            <thead class="sticky-top">
              <th scope="col">STT</th>
              <th scope="col">Lớp Học</th>
              <th scope="col">Số Lượng Sinh Viên</th>
              <th scope="col">Thao Tác</th>
            </thead>
            <?php
              include_once 'sv.php';
              $kq =  thongke_sv_lop();

              if(isset($kq) && (count($kq)>0)){
                $i=1;
                foreach($kq as $sv){
                  echo '<tr>
                          <td>'.$i.'</td>
                          <td>'.$sv['lop'].'</td>
                          <td>'.$sv['so_luong_sv'].'</td>
                          <td>
                            <form action="" method="post">
                              <a href="index.php?act=dssinhvien&ten_lop='.$sv['lop'].'" type="button" class="btn bg-danger text-light" name="xemds"> Xem danh sách </a>
                            </form>
                          </td>
                        </tr>';
                  $i++;
                }
              }
            ?>
          </table>
        </div>
      </div>
    </div>
    <p><br><br></p>
  </div>
</form>