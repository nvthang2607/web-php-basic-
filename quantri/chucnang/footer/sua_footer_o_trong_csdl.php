<?php
//thao tác sửa xong, ấn submit thì phần này sẽ hoạt động để sửa nội dung trong cơ sở dữ liệu
    if(!isset($bien_bao_mat)){exit();}
    $noi_dung=$_POST['noi_dung'];
    $noi_dung=str_replace("'","&#39;",$noi_dung);

    $sql="UPDATE footer SET HTML = '$noi_dung' WHERE ID=1;";
    $result=mysqli_query($conn,$sql);
?>