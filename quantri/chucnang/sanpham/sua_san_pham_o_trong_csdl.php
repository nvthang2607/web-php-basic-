<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    $ten=trim($_POST['ten']);
    $ten=str_replace("'","&#39;",$ten);
    $gia=trim($_POST['gia']);
    $soluong=trim($_POST['soluong']);
    $trang_chu=$_POST['trang_chu'];
    $noi_bat=$_POST['noi_bat'];
    $noi_dung=$_POST['noi_dung'];
    $noi_dung=str_replace("'","&#39;",$noi_dung);
    $ten_file_anh_tai_len=$_FILES['hinh_anh']['name'];

    $kydanh=$_SESSION['ky_danh'];
    $sql="SELECT ChucVu from nhanvien where HoTenNV='$kydanh';";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);


    if($row['ChucVu']=='edit'|| $row['ChucVu']=='admin'){
        if($ten_file_anh_tai_len!="")
        {
            $ten_file_anh=$ten_file_anh_tai_len;
        }
        else
        {
            $ten_file_anh=$_POST['ten_anh'];
        }
        $id=$_GET['id'];
        if($ten!="")
        {
            $sql1="SELECT count(*) from hanghoa where Hinh='$ten_file_anh'; ";
            $result1=mysqli_query($conn,$sql1);
            $row1=mysqli_fetch_array($result1);
            if($row1[0]==0 || $ten_file_anh_tai_len=="")
            {
                $sql2="UPDATE  hanghoa SET TenHH = '$ten',gia = '$gia',Hinh='$ten_file_anh',SoLuongHang='$soluong',MoTaHH = '$noi_dung',TrangChu ='$trang_chu',noi_bat = '$noi_bat' WHERE MSHH ='$id';";
                $result2=mysqli_query($conn,$sql2);
                
                $sql3="SELECT * from hanghoa where MSHH='$id' ";
                $result3=mysqli_query($conn,$sql3);
                $row3=mysqli_fetch_array($result3);
                $manhom=$row3['MaNhom'];

                $sql4="SELECT TenNhom from nhomhanghoa where MaNhom='$manhom';";
                $result4=mysqli_query($conn,$sql4);
                $row4=mysqli_fetch_array($result4);
                $tennhom=$row4['TenNhom'];
                if($ten_file_anh_tai_len!="")
                {             
                    $duong_dan_anh="../hinhanh/sanpham/".$tennhom.'/'.$ten_file_anh_tai_len;
                    move_uploaded_file($_FILES['hinh_anh']['tmp_name'],$duong_dan_anh);
                    $duong_dan_anh_cu="../hinhanh/sanpham/".$tennhom.'/'.$_POST['ten_anh'];
                    unlink($duong_dan_anh_cu);
                }
                
            }
            else
            {
                thong_bao_html("Hình ảnh bị trùng tên");
            }
        }
        else
        {
            thong_bao_html("Tên sản phẩm chưa được điền vào");
        }
    }
    else
        {
            thong_bao_html("Bạn không có quyền sửa sản phẩm này!");
        }
    
?>