
<?php
    if(!isset($bien_bao_mat)){exit();}
?>

<?php
    //vì số lượng sản phẩm  nổi bật khá ít nên chỉ cần 10 sản phẩm, không cần phân trang
    $sql1="SELECT MSHH,TenHH,gia,Hinh,MaNhom from hanghoa where noi_bat='co' order by MSHH desc limit 0,10";
    $result1=mysqli_query($conn,$sql1);
    $kydanh=$_SESSION['ky_danh'];
    $sql="SELECT ChucVu from nhanvien where HoTenNV='$kydanh';";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);


    if($row['ChucVu']!='quanly'&& $row['ChucVu']!='admin'){
        thong_bao_html("Bạn không có quyền với chức năng này!");
    }
?>
<div style="width:990px;text-align:left" >
    <form method="post" >
        <table width="850px" class="tb_a1" >
            <tr style="background:#CCFFFF;height:40px;" >
                <td width="120px" ><b>Hình ảnh</b></td>
                <td width="450px" ><b>Tên</b></td>
                <td align="center" width="140px" ><b>Giá</b></td>
                <td align="center" width="140px" ><b>Có</b></td>
            </tr>
            <?php
                $i=1;
                while($row1=mysqli_fetch_array($result1))
                {
                    $mshh=$row1['MSHH'];
                    $tenhh=$row1['TenHH'];
                    $gia=$row1['gia'];
                    $gia=number_format($gia,0,",",".");
                    $ten_select="select_".$i;
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
                <td align="center" >
                    <br>
                    <input type="submit" name="bieu_mau_san_pham_noi_bat" value="Cập nhật" style="width:120px;height:40px;font-size:20px" >
                    <br><br>
                </td>           
            </tr>

        </table>
    </form>
</div>