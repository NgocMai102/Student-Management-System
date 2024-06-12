<div class="container text-align-center" style="margin-top: 120px; margin-bottom: 120px">
  <h2 class="text-center">DANH SÁCH NGUYỆN VỌNG</h2>
  <div class="progress bg-danger mx-auto" style="height: 3px; width: 40%;"></div>
  <div class="">
    <div class="d-flex justify-content-center align-items-center" >
      <div class="table-responsive text-center justify-content-center align-items-center" style="max-height: 280px; width: 800px; margin-top: 20px;">  
        <table class="table table-hover table-bordered border-black" >
          <thead class="sticky-top">
            <th scope="col" style="width: 130px">Số Thứ Tự</th>
            <th scope="col">Tên Công Ty</th>
            <th scope="col">Ngành Tuyển Dụng</th>
            <th scope="col" style="width: 150px">Nguyện Vọng</th>
            <th scope="col">Thao Tác</th>
          </thead>
          <?php
            include_once "nguyenvong.php";

            $kq = get_nguyenvong($_SESSION['user']);
            if(isset($kq) && (count($kq)>0)){
                $i=1;
                foreach($kq as $nv){
                    echo '<tr>
                            <td>'.$i.'</td>
                            <td>'.$nv['ten_CT'].'</td>
                            <td>'.$nv['ten_nganh'].'</td>
                            <td>'.$nv['stt_nguyenvong'].'</td>
                            <td> 
                                <a href="index.php?act=deleteNV&id='.$nv['id'].'"><i class="bi bi-trash3-fill" style="color: black;"></i></a>
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