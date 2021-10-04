
<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    //trang này giống quản lý menu ngang, sẽ là bảng các menu dọc
    $so_dong_tren_mot_trang=20;
    if(!isset($_GET['trang'])){$_GET['trang']=1;}
  
    $sql="SELECT count(*) from dathang";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $so_trang=ceil($row[0]/$so_dong_tren_mot_trang);
  
    $vtbd=($_GET['trang']-1)*$so_dong_tren_mot_trang;
    $sql1="SELECT * from dathang where TrangThai='Đang chờ' order by SoDonDH limit $vtbd,$so_dong_tren_mot_trang";
    $result1=mysqli_query($conn,$sql1);
    
    $kydanh=$_SESSION['ky_danh'];
    $sql="SELECT ChucVu from nhanvien where HoTenNV='$kydanh';";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);


    if($row['ChucVu']!='quanly'&& $row['ChucVu']!='admin'&&$row['ChucVu']!='banhang'){
        thong_bao_html("Bạn không có quyền xem hóa đơn chi tiết!");
    }
?>
<table width="1350px" class="tb_a1" min-height="300px">
    <tr style="background:#CCFFFF;height:20px;" >
        <td align="center"width="200px" ><b>STT</b></td>
        <td align="center"width="700px" ><b>Tên Khách hàng</b></td>
        <td align="center"width="400px" ><b>Địa chỉ</b></td>
        <td align="center"width="350px" ><b>SDT khách hàng</b></td>
        <td align="center"width="1000px" ><b>Nhân viên phụ trách</b></td>
        <td align="center"width="550px" ><b>Ngày đặt</b></td>
        <td align="center"width="400px" ><b>Trạng thái</b></td>
        <td align="center"width="400px" ><b>Tổng giá trị</b></td>
        <td align="center" width="220px" ><b>Xem</b></td>
        <td align="center" width="220px" ><b>Xóa</b></td>
        <td align="center" width="220px" ><b>Duyệt</b></td>
    </tr>
    <?php
        while($row1=mysqli_fetch_array($result1))
        {
            $id=$row1['SoDonDH'];
            $mskh=$row1['MSKH'];
            $msnv=$row1['MSNV'];
            $ngay=$row1['NgayDH'];
            $tongtien=0;
            $tongtien=number_format($tongtien,0,",",".");
            $trangthai=$row1['TrangThai'];
            $link_xem="?thamso=xem_hoa_don&id=".$id."&trang=".$_GET['trang'];
            $link_duyet="?duyet_hoa_don=co&id=".$id."&trang=".$_GET['trang'];
            $link_xoa="?xoa_hoa_don2=co&id=".$id."&trang=".$_GET['trang'];
            $sql3="SELECT * from khachhang where MSKH='$mskh';";
            $result3=mysqli_query($conn,$sql3);
            $row3=mysqli_fetch_array($result3);
            $tenkh=$row3['HoTenKH'];
            $dc=$row3['DiaChi'];
            $sdt=$row3['SDT'];
            $sql2="SELECT * from nhanvien where MSNV='$msnv';";
            $result2=mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_array($result2);
            $tennv=$row2['HoTenNV'];

            $sql="SELECT * from chitietdathang where SoDonDH='$id' order by MSHH limit $vtbd,$so_dong_tren_mot_trang ";
            $result=mysqli_query($conn,$sql);
            $tongtien=0;
            while($row=mysqli_fetch_array($result)){
                $tongtien=$tongtien+$row['GiaDatHang'];
            }
            $tongtien=number_format($tongtien,0,",",".");

    ?>
                <tr class="a_1" >
                    <td>
                        <a href="<?php echo $link_xem; ?>" class="lk_a1" ><?php echo $id; ?></a>
                    </td>
                    <td>
                        <a class="lk_a1" ><?php echo $tenkh; ?></a>
                    </td>
                    <td>
                        <a class="lk_a1" ><?php echo $dc; ?></a>
                    </td>
                    <td>
                        <a class="lk_a1" ><?php echo $sdt; ?></a>
                    </td>
                    <td>
                        <a class="lk_a1" ><?php echo $tennv; ?></a>
                    </td>
                    <td>
                        <a class="lk_a1" ><?php echo $ngay; ?></a>
                    </td>
                    <td>
                        <a class="lk_a1" ><?php echo $trangthai; ?></a>
                    </td>
                    <td>
                        <a class="lk_a1" ><?php echo $tongtien; ?></a>
                    </td>
                    <td align="center" >
                        <a href="<?php echo $link_xem; ?>" class="lk_a1" >Xem</a>
                    </td>
                    <td align="center" >
                        <a href="<?php echo $link_xoa; ?>" class="lk_a1" >Xóa</a>
                    </td>
                    <td align="center" >
                        <a href="<?php echo $link_duyet; ?>" class="lk_a1" >Duyệt</a>
                    </td>
                </tr>
            <?php
        }
    ?>
    <tr>
        <td colspan="10" align="center" >
            <br><br><br><br><br>
            <?php
                echo "<center>";
                for($i=1;$i<=$so_trang;$i++)
                {
                    $link_phan_trang="?thamso=hoa_don&trang=".$i;
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