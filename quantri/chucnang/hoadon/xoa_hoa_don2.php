
<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    $id=$_GET['id'];
    $sql="DELETE FROM chitietdathang WHERE SoDonDH = '$id' ";
    $result=mysqli_query($conn,$sql);
    $sql="DELETE FROM dathang WHERE SoDonDH = '$id' ";
    $result=mysqli_query($conn,$sql);
    $link="?thamso=hoa_don_dang_cho&trang=".$_GET['trang'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Xóa hóa đơn</title>
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