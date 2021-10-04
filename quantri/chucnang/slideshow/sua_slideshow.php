
<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    $id=$_GET['id'];
    $sql="SELECT * from slideshow where ID='$id' ";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $ten_anh=$row['Hinh'];
    $lien_ket=$row['LK'];
    $link_hinh="../hinhanh/slideshow/".$row['Hinh'];
    $link_dong="?thamso=quan_ly_slideshow";
?>
<form action="" method="post" enctype="multipart/form-data" >
    <table width="990px" >
        <tr>
            <td width="180px" ><b style="color:blue;font-size:20px" >Sửa slideshow</b><br><br> </td>
            <td width="810px" align="right" >
                <a href="<?php echo $link_dong; ?>" class="lk_a1" style="margin-right:30px" >Đóng</a>
            </td>
        </tr>
        <tr>
            <td >Liên kết : </td>
            <td >
                <input style="width:400px;margin-top:3px;margin-bottom:3px;" name="lien_ket" value="<?php echo $lien_ket; ?>" >
            </td>
        </tr>
        <tr>
            <td valign="top" >Hình ảnh : </td>
            <td>
                <img src='<?php echo $link_hinh; ?>' style='width:600px' >
                <br><br>
                <input type="file" name="hinh_anh" >
                <input type="hidden" name="ten_anh" value="<?php echo $ten_anh; ?>" >
                <br><br>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <br>
                <input type="submit" name="bieu_mau_sua_slideshow" value="Sửa" style="width:200px;height:50px;font-size:24px" >
            </td>
        </tr>
    </table>
</form>