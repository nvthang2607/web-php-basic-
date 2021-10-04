<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    $id=$_GET['id'];
    // câu truy vấn này là xem menu được bấm xóa có còn dữ liệu hay không , nếu truy vấn select trả về 0 thì menu không có dữ liệu
    // lệnh count để đếm dòng dữ liệu
    $sql="SELECT count(*) from hanghoa where MaNhom='$id' ";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);

    $sql2="SELECT TenNhom from nhomhanghoa where MaNhom='$id';";
    $result2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_array($result2);
    $tennhom=$row2['TenNhom'];


    $kydanh=$_SESSION['ky_danh'];
    $sql="SELECT ChucVu from nhanvien where HoTenNV='$kydanh';";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);


    if($row['ChucVu']=='edit'|| $row['ChucVu']=='admin'){
        //nếu số tập tin =0 nghĩa là không có dữ liệu trong menu đó
        if($row[0]==0)
        {   //xóa
            rmdir("../hinhanh/sanpham/$tennhom");
            $truy_van_xoa="DELETE FROM nhomhanghoa WHERE MaNhom = $id ";
            $result=mysqli_query($conn,$truy_van_xoa);
            
        }
        else
        {
            thong_bao_html("Menu này vẫn còn dữ liệu nên không thể xóa!");
        }
    }
    else
        {
            thong_bao_html("Bạn không có quyền xóa menu này!");
        }
    
?>