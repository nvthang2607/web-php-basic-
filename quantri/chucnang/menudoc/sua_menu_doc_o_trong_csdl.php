<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    $ten_menu=trim($_POST['ten']);
    $ten_menu=str_replace("'","&#39;",$ten_menu);
    $id=$_GET['id'];
    $sql="SELECT TenNhom from nhomhanghoa where MaNhom='$id';";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $tencu=$row['TenNhom'];
    $kydanh=$_SESSION['ky_danh'];
    $sql="SELECT ChucVu from nhanvien where HoTenNV='$kydanh';";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);


    if($row['ChucVu']=='edit'|| $row['ChucVu']=='admin'){
        if($ten_menu!="")
        {
            $sql="UPDATE nhomhanghoa SET TenNhom = '$ten_menu' WHERE MaNhom ='$id';";
            $result=mysqli_query($conn,$sql);
            rename("../hinhanh/sanpham/$tencu", "../hinhanh/sanpham/$ten_menu");
        }
        else
        {
            thong_bao_html("Tên menu chưa được điền vào!");
        } 
    }else
    {
        thong_bao_html("Bạn không có quyền sửa menu này!");
    } 
?>