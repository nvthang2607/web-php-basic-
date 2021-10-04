<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    $id=$_GET['id'];
    $sql="SELECT * from nhanvien where MSNV='$id';";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $tennv=$row['HoTenNV'];
?>
<form action="" method="post">
    <table width="990px" height="320px" >
            <tr>
                <td width="300px" ><b style="color:blue;font-size:20px" >Xóa thông tin nhân viên</b><br><br> </td>
            </tr>
            <tr>
                <td >Mã nhân viên: </td>
                <td>
                    <a><b><?php echo $id; ?></b></a>
                </td>
            </tr>
            <tr>
                <td >Tên nhân viên: </td>
                <td>
                    <a><b><?php echo $tennv; ?></b></a>
                </td>
            </tr>
            <tr>
                <td>
                    <a><b>Bạn có chắc muốn xóa nhân viên này không?</b></a>
                    <input type="submit" name="bieu_mau_xoa_nhan_vien" value="CÓ" style="width:50px;height:30px;font-size:15px;margin-left:20px;" >
                </td>
            </tr>
    </table>
</form