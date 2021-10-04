<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    $ten_menu=trim($_POST['ten']);
    $ten_menu=str_replace("'","&#39;",$ten_menu);
    $kydanh=$_SESSION['ky_danh'];
    $sql="SELECT ChucVu from nhanvien where HoTenNV='$kydanh';";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    if($row['ChucVu']=='edit'|| $row['ChucVu']=='admin'){
        if($ten_menu!="")
            {
                $sql="INSERT INTO nhomhanghoa (TenNhom)VALUES ('$ten_menu');";
                $result=mysqli_query($conn,$sql);
                mkdir("../hinhanh/sanpham/".$ten_menu);
            }
        else
        {
            thong_bao_html("Tên menu chưa được điền vào");
        }
    }
    else
        {
            thong_bao_html("Bạn không có quyền thêm menu này!");
        }
?>