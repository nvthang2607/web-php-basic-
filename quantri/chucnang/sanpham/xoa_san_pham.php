<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    $id=$_GET['id'];
    
    $sql1="SELECT * from hanghoa where MSHH='$id' ";
    $result1=mysqli_query($conn,$sql1);
    $row1=mysqli_fetch_array($result1);
    $manhom=$row1['MaNhom'];

    $sql2="SELECT TenNhom from nhomhanghoa where MaNhom='$manhom';";
    $result2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_array($result2);
    $tennhom=$row2['TenNhom'];
    $link_hinh="../hinhanh/sanpham/".$tennhom.'/'.$row1['Hinh'];

    $kydanh=$_SESSION['ky_danh'];
    $sql="SELECT ChucVu from nhanvien where HoTenNV='$kydanh';";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);


    if($row['ChucVu']=='edit'|| $row['ChucVu']=='admin'){
        if(is_file($link_hinh)) 
        {
            unlink($link_hinh);
        }
    
        $sql="DELETE FROM hanghoa WHERE MSHH = '$id' ";
        $result=mysqli_query($conn,$sql);
        thong_bao_html("Bạn đã xóa thành công sản phẩm!");
    }
    else
        {
            thong_bao_html("Bạn không có quyền xóa sản phẩm này!");
        }
?>