<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    $id=$_GET['id'];
    $sql="SELECT * from hanghoa where MSHH='$id' ";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $ten=$row['TenHH'];
    $soluong=$row['SoLuongHang'];
    $manhom=$row['MaNhom'];

    $sql2="SELECT TenNhom from nhomhanghoa where MaNhom='$manhom';";
    $result2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_array($result2);
    $tennhom=$row2['TenNhom'];
    $link_hinh="../hinhanh/sanpham/".$tennhom.'/'.$row['Hinh'];

    $link_dong="?thamso=quan_ly_san_pham&id_menu=".$_GET['id_menu']."&trang=".$_GET['trang'];
?>
<form action="" method="post" enctype="multipart/form-data" >
    <table width="990px" >
        <tr>
            <td width="180px" ><b style="color:blue;font-size:20px" >Cập nhật số lượng sản phẩm</b><br><br> </td>
            <td width="810px" align="right" >
                <a href="<?php echo $link_dong; ?>" class="lk_a1" style="margin-right:30px" >Đóng</a>
            </td>
        </tr>
        <tr>
            <td >Tên : </td>
            <td >
            <br><br>
                <?php echo $ten; ?>
                <br><br>
            </td>
        </tr>
        <tr>
            <td valign="top" >Hình ảnh : </td>
            <td >
                <img src='<?php echo $link_hinh; ?>' style='width:180px' >
                <br><br>
            </td>
        </tr>
        <tr>
            <td >Số lượng : </td>
            <td>
                <a><?php echo $soluong;?></a>
                <input type="hidden" name="soluong" value="<?php echo $soluong; ?>" >
            </td>
        </tr>
        <tr>
            <td >Số lượng thêm mới : </td>
            <td >
                <input style="width:40px;margin-top:3px;margin-bottom:3px;" name="soluongthemvao" value="0" >
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <br>
                <input type="submit" name="bieu_mau_them_so_luong_san_pham" value="Thêm" style="width:100px;height:50px;font-size:24px" >
            </td>
        </tr>
    </table>
</form>