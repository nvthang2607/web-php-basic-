<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    $soluong=trim($_POST['soluong']);
    $soluongthemvao=trim($_POST['soluongthemvao']);
    $id=$_GET['id'];
    $tong=$soluong+$soluongthemvao;

    $kydanh=$_SESSION['ky_danh'];
    $sql="SELECT ChucVu from nhanvien where HoTenNV='$kydanh';";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);


    if($row['ChucVu']=='nhaplieu'|| $row['ChucVu']=='admin'){
        $sql2="UPDATE  hanghoa SET SoLuongHang = '$tong' WHERE MSHH ='$id';";
        $result2=mysqli_query($conn,$sql2);
        thong_bao_html("Bạn đã thêm số lượng sản phẩm thành công!");
    }
    else
    {
        thong_bao_html("Bạn không có quyền thêm số lượng sản phẩm!");
    } 
?>