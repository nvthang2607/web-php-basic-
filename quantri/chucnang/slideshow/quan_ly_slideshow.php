<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
// lấy các ảnh trong bảng slideshow ra
    $sql="SELECT * from slideshow order by ID ";
    $result=mysqli_query($conn,$sql);
    $kydanh=$_SESSION['ky_danh'];
    $sql="SELECT ChucVu from nhanvien where HoTenNV='$kydanh';";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);


    if($row['ChucVu']!='quanly'&& $row['ChucVu']!='admin'){
        thong_bao_html("Bạn không có quyền với chức năng này!");
    }

    $sql1="SELECT * from slideshow order by ID";
    $result1=mysqli_query($conn,$sql1);
?>

<table width="990px" class="tb_a1" >
    <tr style="background:#CCFFFF;height:40px;" >
        <td align="center" width="120px" ><b>Hình ảnh</b></td>
        <td align="center" width="140px" ><b>Sửa</b></td>
        <td align="center" width="140px" ><b>Xóa</b></td>
    </tr>
    <?php
        while($row=mysqli_fetch_array($result1))
        {
            $id=$row['ID'];
            $link_hinh="../hinhanh/slideshow/".$row['Hinh'];
            $link_sua="?thamso=sua_slideshow&id=".$id;
            $link_xoa="?xoa_slideshow=co&id=".$id;
            ?>
                <tr class="a_1" >
                    <td align="center" >
                        <a href="<?php echo $link_sua; ?>" >
                            <img src="<?php echo $link_hinh; ?>" style="width:120px; height:115px;margin-top:10px;margin-bottom:10px;" border="0" >
                        </a>
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

</table>