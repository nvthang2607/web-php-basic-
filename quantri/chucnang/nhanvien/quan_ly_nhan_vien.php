<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    //trang này giống quản lý menu ngang, sẽ là bảng các menu dọc
    $so_dong_tren_mot_trang=20;
    if(!isset($_GET['trang'])){$_GET['trang']=1;}
  
    $sql="SELECT count(*) from nhanvien";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $so_trang=ceil($row[0]/$so_dong_tren_mot_trang);
  
    $vtbd=($_GET['trang']-1)*$so_dong_tren_mot_trang+1;
    $sql1="SELECT * from nhanvien order by MSNV limit $vtbd,$so_dong_tren_mot_trang";
    $result1=mysqli_query($conn,$sql1);

    
    $kydanh=$_SESSION['ky_danh'];
    $sql="SELECT ChucVu from nhanvien where HoTenNV='$kydanh';";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);


    if($row['ChucVu']!='quanly'&& $row['ChucVu']!='admin'){
        thong_bao_html("Bạn không có quyền xem thông tin nhân viên!");
    }
?>
<table width="990px" class="tb_a1" >
    <tr style="background:#CCFFFF;height:40px;" >
        <td align="center"width="200px" ><b>Mã nhân viên</b></td>
        <td align="center"width="700px" ><b>Tên nhân viên</b></td>
        <td align="center"width="1000px" ><b>Chức vụ</b></td>
        <td align="center"width="550px" ><b>Địa chỉ</b></td>
        <td align="center"width="400px" ><b>SDT</b></td>
        <td align="center" width="220px" ><b>Sửa</b></td>
        <td align="center" width="220px" ><b>Xóa</b></td>
    </tr>
    <?php
        while($row1=mysqli_fetch_array($result1))
        {
            $msnv=$row1['MSNV'];
            $tennv=$row1['HoTenNV'];
            $chucvu=$row1['ChucVu'];
            $diachi=$row1['DiaChi'];
            $sdt=$row1['SoDienThoai'];
            $link_sua="?thamso=sua_thong_tin_nhan_vien&id=".$msnv."&trang=".$_GET['trang'];
            $link_xoa="?thamso=xoa_nhan_vien&id=".$msnv."&trang=".$_GET['trang'];

    ?>
                <tr class="a_1" >
                    <td>
                        <a class="lk_a1" ><?php echo $msnv; ?></a>
                    </td>
                    <td>
                        <a class="lk_a1" ><?php echo $tennv; ?></a>
                    </td>
                    <td>
                        <a class="lk_a1" ><?php echo $chucvu; ?></a>
                    </td>
                    <td>
                        <a class="lk_a1" ><?php echo $diachi; ?></a>
                    </td>
                    <td>
                        <a class="lk_a1" ><?php echo $sdt; ?></a>
                    </td>
                    <td align="center" >
                        <a href="<?php echo $link_sua; ?>" class="lk_a1" >Sửa</a>
                    </td>
                    <td align="center" >
                        <a href="<?php echo $link_xoa; ?>" class="lk_a1" >Xóa</a>
                    </td>
                </tr>
            <?php
        }
    ?>
    <tr>
        <td colspan="7" align="center" >
            <br>
            <?php
                echo "<center>";
                for($i=1;$i<=$so_trang;$i++)
                {
                    $link_phan_trang="?thamso=quan_ly_nhan_vien&trang=".$i;
                    echo "<a href='$link_phan_trang' class='phan_trang' >";
                        echo $i;
                    echo "</a> ";
                }
                echo "</center>";
            ?>
            <br><br>
        </td>
    </tr>
</table>