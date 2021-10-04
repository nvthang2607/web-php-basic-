<?php
    session_start();
    $bien_bao_mat="co";
    include("../ket_noi.php");  
    include("chucnang/quantri2/xacdinhdangnhap.php");
    include("chucnang/quantri2/ham.php");
    if(isset($xac_dinh_dang_nhap))
    {
        if($xac_dinh_dang_nhap=="co")
    {
            include("chucnang/quantri2/xulypost_get.php");
        }   
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Quản trị</title>
        <script src='phan_bo_tro/tinymce/js/tinymce/tinymce.min.js'></script>
        <link rel="stylesheet" type="text/css" href="giaodien/giaodien2.css">
    </head>
    <body>
        <?php
            if(!isset($xac_dinh_dang_nhap))
            {
                include("chucnang/quantri2/khungdangnhap.php");
            }
            else
            {
                if($xac_dinh_dang_nhap=="co"){
                    echo "<center>";
                    include("chucnang/quantri2/trangchu.php");
                    echo "</center>";
                }
            }
        ?>
    </body>
</html>