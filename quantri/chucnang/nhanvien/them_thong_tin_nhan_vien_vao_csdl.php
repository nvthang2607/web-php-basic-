<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    $maso=$_POST['maso'];
    $ten=trim($_POST['ten']);
    $ten=str_replace("'","&#39;",$ten);
    $pass=md5($_POST['pass']);
    $pass=md5($pass);
    $chucvu=$_POST['chuc_vu'];
    $diachi=$_POST['dia_chi'];
    $sdt=$_POST['sdt'];

    $sql2="SELECT count(*) from nhanvien where MSNV='$maso';";
    $result2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_array($result2);

    $kydanh=$_SESSION['ky_danh'];
    $sql="SELECT ChucVu from nhanvien where HoTenNV='$kydanh';";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);


    if($row['ChucVu']=='quanly'|| $row['ChucVu']=='admin'){
        if($maso!=""){
            if($row2[0]=='0'){
                if($ten!="")
                {   if($chucvu!=""){
                        if($diachi!=""){
                            if($sdt!=""){
                                $sql="INSERT INTO nhanvien (MSNV,HoTenNV,ChucVu,DiaChi,SoDienThoai) VALUES ('$maso','$ten','$chucvu','$diachi','$sdt');";
                                $result=mysqli_query($conn,$sql);
                                $sql1="INSERT INTO admin (Ten,Pass)VALUES ('$ten','$pass');";
                                $result=mysqli_query($conn,$sql1);
                            }
                            else
                            {
                                thong_bao_html("Số điện thoại không được để trống!");
                            }
                        }
                        else
                        {
                            thong_bao_html("Địa Chỉ không được để trống!");
                        }
                    }
                    else
                    {
                        thong_bao_html("Chức vụ không được để trống!");
                    }
                }
                else
                {
                    thong_bao_html("Tên nhân viên không được để trống!");
                }  
            }
            else
            {
                thong_bao_html("Tên nhân viên không được để trống!");
            }
        } 
        else
        {
            thong_bao_html("Mã số nhân viên không được để trống!");
        }
    }else
    {
        thong_bao_html("Bạn không có quyền thêm nhân viên!");
    }
?>