<?php
    if(!isset($bien_bao_mat)){exit();}
?>

<?php
//phần phân  trang, vì sản phẩm có mặt ở trang chủ là rất nhiều nên cần phân trang để quản lý
    $so_dong_tren_mot_trang=10;
    if(!isset($_GET['trang'])){$_GET['trang']=1;}   
    //lấy số sp có mục TrangChủ (mục này để đánh dấu là sp có được lên trang chủ hày không)
    $sql="SELECT count(MSHH) from hanghoa where TrangChu='co' ";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $so_trang=ceil($row[0]/$so_dong_tren_mot_trang);
    //vị trí bắt đầu sp, đã nói ở những phần đâu
    $vtbd=($_GET['trang']-1)*$so_dong_tren_mot_trang;
    //lấy ra thông tin các sp để in ra
    $sql1="SELECT MSHH,TenHH,gia,Hinh,SXTrangChu,MaNhom from hanghoa where TrangChu='co' order by SXTrangChu desc limit $vtbd,$so_dong_tren_mot_trang";
    $result1=mysqli_query($conn,$sql1);

    $kydanh=$_SESSION['ky_danh'];
    $sql="SELECT ChucVu from nhanvien where HoTenNV='$kydanh';";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);


    if($row['ChucVu']!='quanly'&& $row['ChucVu']!='admin'){
        thong_bao_html("Bạn không có quyền với chức năng này!");
    }
?>

<form method="post" >
    <table width="990px" class="tb_a1" >
        <tr style="background:#CCFFFF;height:40px;" >
            <td width="120px" ><b>Hình ảnh</b></td>
            <td width="450px" ><b>Tên</b></td>
            <td align="center" width="140px" ><b>Giá</b></td>
            <td align="center" width="140px" ><b>Trang chủ</b></td>
            <td align="center" width="140px" ><b>Thứ tự</b></td>       
        </tr>
        <?php
            $i=1;
            while($row1=mysqli_fetch_array($result1))
            {
                $mshh=$row1['MSHH'];
                $tenhh=$row1['TenHH'];
                $gia=$row1['gia'];
                $gia=number_format($gia,0,",",".");
                $sap_xep_trang_chu=$row1['SXTrangChu'];
                $ten_select="select_".$i;
                $ten_input="input_".$i;
                $ten_id="id_".$i;
                $manhom=$row1['MaNhom'];

                $sql2="SELECT TenNhom from nhomhanghoa where MaNhom='$manhom';";
                $result2=mysqli_query($conn,$sql2);
                $row2=mysqli_fetch_array($result2);
                $tennhom=$row2['TenNhom'];
                $link_hinh="../hinhanh/sanpham/".$tennhom.'/'.$row1['Hinh'];
                ?>
                    <tr class="a_1" >
                        <td align="center" >
                            <img src="<?php echo $link_hinh; ?>" style="width:100px;margin-top:10px;margin-bottom:10px;" border="0" >
                        </td>
                        <td>
                            <?php echo $tenhh; ?>
                        </td>
                        <td align="center" >
                            <?php echo $gia; ?>
                        </td>
                        <td align="center" >
                            <select name="<?php echo $ten_select; ?>" >
                                <option value="co" selected >Có</option>
                                <option value="" >Không</option>
                            </select>
                        </td>
                        <td align="center" >
                            <input value="<?php echo $sap_xep_trang_chu; ?>" style="width:50px" name="<?php echo $ten_input; ?>" >
                            <input  type="hidden" value="<?php echo $mshh; ?>" name="<?php echo $ten_id; ?>" > 
                        </td>                   
                    </tr>
                <?php               
                $i++;
            }
        ?>
        <tr>
            <td colspan="3" align="center" >
                &nbsp;
            </td>
            <td colspan="2" align="center" >
                <br>
                <input type="submit" name="bieu_mau_san_pham_trang_chu" value="Cập nhật" style="width:180px;height:50px;font-size:24px" >
                <br><br>
            </td>           
        </tr>
        <tr>
            <td colspan="5" align="center" >
                <br>
                <?php
                    for($i=1;$i<=$so_trang;$i++)
                    {
                        $link_phan_trang="?thamso=san_pham_trang_chu&trang=".$i;
                        echo "<a href='$link_phan_trang' class='phan_trang' >";
                            echo $i;
                        echo "</a> ";
                    }
                ?>
                <br><br>
            </td>
        </tr>
    </table>
</form>