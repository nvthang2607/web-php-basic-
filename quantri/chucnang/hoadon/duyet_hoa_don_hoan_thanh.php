<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    $id=$_GET['id'];
    //nhân viên đang duyệt
    $nhanvien=$_SESSION['ky_danh'];
    //lấy MSNV đang duyệt:
    $sql="SELECT  * from nhanvien where HoTenNV='$nhanvien' ;";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $msnv=$row['MSNV'];

    $sql1="UPDATE  dathang SET MSNV='$msnv',TrangThai='Đã hoàn thành' where SoDonDH='$id' ";
    $result1=mysqli_query($conn,$sql1);
    $link="?thamso=hoa_don_da_duyet";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Duyệt hóa đơn</title>
    </head>
    <body>
        <script type="text/javascript" >
            window.location="<?php echo $link; ?>";
        </script>
    </body>
</html>
<?php
    exit();
?>