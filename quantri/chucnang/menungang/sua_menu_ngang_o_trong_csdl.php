<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    $ten_menu=trim($_POST['ten']);
    $ten_menu=str_replace("'","&#39;",$ten_menu);
    $loai_menu=$_POST['loai_menu'];
    $noi_dung=$_POST['noi_dung'];
    $noi_dung=str_replace("'","&#39;",$noi_dung);
    $id=$_GET['id'];
    $kydanh=$_SESSION['ky_danh'];
    $sql="SELECT ChucVu from nhanvien where HoTenNV='$kydanh';";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    if($ten_menu!="")
    {   
        if($row['ChucVu']=='edit'|| $row['ChucVu']=='admin'){
            $sql="UPDATE menu_ngang SET Ten = '$ten_menu',Noi_Dung = '$noi_dung',Loai_menu = '$loai_menu' WHERE ID =$id;
            ";
            $result=mysqli_query($conn,$sql);
        }
        else
        {
            thong_bao_html("Bạn không có quyền sửa menu này!");
        }
        
    }
    else
    {
        thong_bao_html("Tên menu chưa được điền vào");
    }
?>