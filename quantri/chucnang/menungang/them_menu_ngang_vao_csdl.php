
<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    $ten_menu=trim($_POST['ten']);
    $ten_menu=str_replace("'","&#39;",$ten_menu);
    $loai_menu=$_POST['loai_menu'];
    $noi_dung=$_POST['noi_dung'];
    $noi_dung=str_replace("'","&#39;",$noi_dung);
    $kydanh=$_SESSION['ky_danh'];
    $sql="SELECT ChucVu from nhanvien where HoTenNV='$kydanh';";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    if($ten_menu!="")
    {   
        if($row['ChucVu']=='edit'|| $row['ChucVu']=='admin'){
            $sql="INSERT INTO menu_ngang (Ten,Noi_Dung,Loai_menu) VALUES ('$ten_menu','$noi_dung','$loai_menu');";
            $result=mysqli_query($conn,$sql);
            $_SESSION['loai_menu_wr8']=$loai_menu;
        }
        else{
            thong_bao_html("Bạn không có quyền thêm menu này!");
        }
    }
    else
    {
        thong_bao_html("Tên menu chưa được điền vào!");
    }
?>