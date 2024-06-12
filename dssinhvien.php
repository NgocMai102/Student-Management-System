
<form action="" method="post">
  <div class="container text-align-center">
    <h2 class="text-center" style="margin-top: 100px">DANH SÁCH SINH VIÊN</h2>
    <div class="progress bg-danger mx-auto" style="height: 3px; width: 50%;"></div>
    <div class="" style="margin-left: 100px">
        <div class="d-flex" style="margin-left: 60px; margin-right: 50px; margin-top: 50px; width: 841.489px;">
          <div class="col-ms-8 d-flex justify-content-start align-content-start" style="width: 322px;">
              <div class="col-sm-5 pt-2" style="width: 140px; transform: translate(-30.6667px, 0px);">Tìm kiếm sinh viên: </div>
              <div style="flex: 1 1 0%; display: flex; align-items: center; width: 202px;">
                  <input type="text" class="form-control" id="search" name="search" style="border: 1px solid black; width: 192.021px; margin-right: 10px; transform: translate(-24.6667px, 0px);">
                  <input type="submit" class=" btn bg-danger text-light" id="timkiem" name="timkiem" value="Tìm kiếm" style="width: 116.635px; transform: translate(-26.6666px, 0px);">
              </div>
          </div>
          <div class="col-ms-4 d-flex justify-content-end align-items-end ms-auto">
            <a href="index.php?act=addsv" type="button" class="btn btn-danger" >Thêm sinh viên</a>
          </div> 
        </div>
      </div>
      <div class="d-flex justify-content-center align-items-center" style="margin-left: 100px; width: 895.5px; transform: translate(22px, 0px);">
        <div class="table-responsive" style="max-height: 380px; width: 1000px; margin-top: 20px;">  
          <table class="table table-hover table-bordered border-black text-center align-text-bottom" style="padding-left: 50px;" >
            <thead class="sticky-top">
              <th scope="col" width = 70px>Ảnh Đại Diện</th>
              <th scope="col">Mã Sinh Viên</th>
              <th scope="col" width = 160px>Họ Tên</th>
              <th scope="col">Lớp</th>
              <th scope="col">Ngành Học</th>
              <th scope="col">GPA</th>
              <th scope="col" width = 120px>Thao Tác</th>
            </thead>
            <tbody class="danhsach">
              <?php
                include_once 'sv.php';


                if(isset($_POST['timkiem']) && ($_POST['timkiem'])){
                  $value_search = $_POST['search'];
                  $kq = search_sv($value_search);
                } else{
                    if (isset($_GET['ma_nganh'])) {
                        $ma_nganh = $_GET['ma_nganh'];
                        $kq = get_sv_one_condition('ma_nganh', $ma_nganh);
                    } 
                    else if (isset($_GET['ten_lop'])) {
                        $ten_lop = $_GET['ten_lop'];
                        $kq = get_sv_one_condition('lop', $ten_lop);
                    } else if (isset($_GET['ten_congty'])) {
                        $ten_congty = $_GET['ten_congty'];
                        $kq = get_dssv_ungtuyen($ten_congty);
                    } else if (isset($_GET['hoc_luc'])) {
                        $hoc_luc = $_GET['hoc_luc'];
                        $kq = get_sv_hocluc($hoc_luc);
                    }
                    else { 
                        $kq = getall_sv();
                    }
                }
                if(isset($kq) && (count($kq)>0)){
                $i=1;
                foreach($kq as $sv){
                ?>
                    <tr class = "record" id="<?php echo $sv['ma_SV']; ?>">
            
                            <td><?php echo '<img src="'.$sv['avata'].'" width="60px" height="90px">' ?> </td>
                            <td> <?php echo $sv['ma_SV'] ?></td>
                            <td><?php echo $sv['fullname'] ?> </td>
                            <td><?php echo$sv['lop'] ?> </td>
                            <td><?php echo$sv['ten_nganh'] ?> </td>
                            <td><?php echo$sv['GPA'] ?> </td>
                            <td>
                              <?php
                                echo '<a href="index.php?act=xemsuasinhvien&ma_SV='.$sv['ma_SV'].'"><i class="bi bi-eye-fill" style="color: black;"></i></a> | 
                                <a href="index.php?act=xemsuasinhvien&ma_SV='.$sv['ma_SV'].'"><i class="bi bi-pencil-fill" style="color: black;"></i></a> | ';
                              ?>
                              <a href="#"><i class="delete_button bi bi-trash3-fill" id="<?php echo $sv['ma_SV']; ?>" style="color: black;"></i></a>
                            </td>
                    </tr>
                <?php
                    $i++;
                  }
                }
              ?>
            </tbody>
            
          </table>
        </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
      <script type="text/javascript">
        $(function(){
          $('.delete_button').click(function(){
            var ma_SV = $(this).attr('id');
            if(confirm("Bạn có chắc chắn muốn xóa sinh viên này không?")){
              $.ajax({
                type: "GET",
                url: 'deletesv.php',
                data: {ma_SV: ma_SV},
                success: function(data){
                  alert(data);
                }
              });
              $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast").animate({ opacity: "hide" }, "slow");
            }
            return false;
          });
        });

      </script>
    </div>
    <p><br><br></p>
  </div>
</form>

