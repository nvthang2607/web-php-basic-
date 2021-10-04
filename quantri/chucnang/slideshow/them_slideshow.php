<?php
    if(!isset($bien_bao_mat)){exit();}
    $link_quan_ly="?thamso=quan_ly_slideshow";
    $kydanh=$_SESSION['ky_danh'];
    $sql="SELECT ChucVu from nhanvien where HoTenNV='$kydanh';";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);


    if($row['ChucVu']!='quanly'&& $row['ChucVu']!='admin'){
        thong_bao_html("Bạn không có quyền với chức năng này!");
    }
?>
<!--enctype="multipart/form-data" cho phép tải file ảnh lên-->
<form action="" method="post" enctype="multipart/form-data" >
    <table width="990px" >
        <tr>
            <td colspan="2" ><b style="color:blue;font-size:20px" >Thêm ảnh slideshow</b><br><br> </td>
           
        </tr>
        <tr>
            <td width="150px" >Liên kết : </td>
            <td width="840px" >
                <input name="lien_ket" style="width:400px;margin-top:3px;margin-bottom:3px;" placeholder="?thamso=chi_tiet_san_pham&id=[Mã_sp]" >
            </td>
        </tr>
        <tr>
            <td>Hình ảnh : </td>
            <td>
                <input type="file" name="hinh_anh" >
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <br><br>
                <input type="submit" name="bieu_mau_them_slideshow" value="Thêm ảnh" style="width:150px;height:40px;font-size:18px" >
            </td>
            <td width="250px" align="right" style="font-size: 24px">
                <a href="<?php echo $link_quan_ly; ?>" class="lk_a1" style="margin-right:30px"> Quản lý </a>
            </td>
        </tr>
    </table>
</form>