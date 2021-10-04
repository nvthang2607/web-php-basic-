<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    $kydanh=$_SESSION['ky_danh'];
    $ten=trim($_POST['ten']);
    $ten=str_replace("'","&#39;",$ten);
    $pass=md5($_POST['pass']);
    $pass=md5($pass);
    $chuc_vu=$_POST['chuc_vu'];
    $dia_chi=$_POST['dia_chi'];
    $sdt=$_POST['sdt'];
    $id=$_GET['id'];
    $count=strlen($pass);
    $sql="SELECT ChucVu from nhanvien where HoTenNV='$kydanh';";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    if($ten!="")
    {   if($chuc_vu!=""){
            if($dia_chi!=""){
                if($sdt!=""){
                    if($row['ChucVu']=='quanly'|| $row['ChucVu']=='admin'){
                        $sql="UPDATE nhanvien SET HoTenNV = '$ten',ChucVu='$chuc_vu',DiaChi='$dia_chi',SoDienThoai='$sdt' WHERE MSNV ='$id';";
                        $result=mysqli_query($conn,$sql);
                        $sql1="UPDATE admin SET Ten = '$ten' WHERE ID ='$id';";
                        $result=mysqli_query($conn,$sql1);
                        $sql1="SELECT Pass from admin WHERE ID ='$id';";
                        if($pass!=md5(md5(""))){
                            $sql2="UPDATE admin SET Pass='$pass' WHERE ID ='$id';";
                            $result=mysqli_query($conn,$sql2);
                        }
                        thong_bao_html("Sửa thông tin nhân viên thành công!");
                    }
                    else
                    {
                        thong_bao_html("Bạn không có quyền sửa thông tin nhân viên!");
                    }
                }
                else
                {
                    thong_bao_html("Số điện thoại không được để trống");
                }
            }
            else
            {
                thong_bao_html("Địa Chỉ không được để trống");
            }
        }
        else
        {
            thong_bao_html("Chức vụ không được để trống");
        }
    }
    else
    {
        thong_bao_html("Tên nhân viên không được để trống");
    }
?>