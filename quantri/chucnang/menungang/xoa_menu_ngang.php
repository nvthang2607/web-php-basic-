
<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    $id=$_GET['id'];
    $kydanh=$_SESSION['ky_danh'];
    $sql="SELECT ChucVu from nhanvien where HoTenNV='$kydanh';";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    if($row['ChucVu']=='edit'|| $row['ChucVu']=='admin'){
        $sql="DELETE FROM menu_ngang WHERE ID = $id ";
        $result=mysqli_query($conn,$sql);
    }else{
        thong_bao_html("Bạn không có quyền xóa menu này!");
    }
    
?>