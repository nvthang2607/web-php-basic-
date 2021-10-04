
<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    $msnv=$_GET['id'];
    $sql="SELECT * from nhanvien where MSNV='$msnv' ";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $ten=$row['HoTenNV'];
    $chuc_vu=$row['ChucVu'];
    $dia_chi=$row['DiaChi'];
    $sdt=$row['SoDienThoai'];
    $link_dong="?thamso=quan_ly_nhan_vien&trang=".$_GET['trang'];
?>
<form action="" method="post">
    <table width="990px" >
        <tr>
            <td width="250px" ><b style="color:blue;font-size:20px" >Sửa thông tin nhân viên</b><br><br> </td>
            <td width="710px" align="right" >
                <a href="<?php echo $link_dong; ?>" class="lk_a1" style="margin-right:30px" >Đóng</a>
            </td>
        </tr>
        <tr>
            <td >Tên : </td>
            <td >
                <input style="width:400px;margin-top:3px;margin-bottom:3px;" name="ten" value="<?php echo $ten; ?>" >
            </td>
        </tr>
        <tr>
            <td >Mật khẩu tài khoản : </td>
            <td >
                <input type="password" style="width:400px;margin-top:3px;margin-bottom:3px;" name="pass">
            </td>
        </tr> 
        <tr>
            <td >Chức vụ : </td>
            <td >
                <input style="width:400px;margin-top:3px;margin-bottom:3px;" name="chuc_vu" value="<?php echo $chuc_vu; ?>" >
            </td>
        </tr>
        <tr>
            <td >Địa chỉ : </td>
            <td >
                <input style="width:400px;margin-top:3px;margin-bottom:3px;" name="dia_chi" value="<?php echo $dia_chi; ?>" >
            </td>
        </tr>
        <tr>
            <td >Số điện thoại : </td>
            <td >
                <input style="width:400px;margin-top:3px;margin-bottom:3px;" name="sdt" value="<?php echo $sdt; ?>" >
            </td>
        </tr> 
        <tr>
            <td>&nbsp;</td>
            <td>
                <br>
                <input type="submit" name="bieu_mau_sua_thong_tin_nhan_vien" value="Sửa" style="width:200px;height:50px;font-size:24px" >
            </td>
        </tr>
    </table>
</form>