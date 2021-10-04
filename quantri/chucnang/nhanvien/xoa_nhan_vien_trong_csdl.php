<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    $msnv=$_GET['id'];
    
    $sql1="SELECT count(*) from nhanvien where MSNV='$msnv';";
    $result1=mysqli_query($conn,$sql1);
    $row1=mysqli_fetch_array($result1);


        $sql2="SELECT * from nhanvien where MSNV='$msnv';";
        $result2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_array($result2);
        $tennv=$row2['HoTenNV'];
        if($row1[0]==1){
            if($tennv!=$_SESSION['ky_danh']){
                $sql3="DELETE from nhanvien where MSNV='$msnv';";
                $result3=mysqli_query($conn,$sql3);

                $sql4="DELETE from admin where Ten='$tennv';";
                $result24=mysqli_query($conn,$sql4);  
            }
            else{
                thong_bao_html("Không thể xóa tài khoản đang đăng nhập!");
            }
        }
        else{
            thong_bao_html("Mã nhân viên không tồn tại, vui lòng kiểm tra lại!");
        }
    $link="?thamso=quan_ly_nhan_vien&trang=".$_GET['trang'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Xóa nhân viên</title>
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
