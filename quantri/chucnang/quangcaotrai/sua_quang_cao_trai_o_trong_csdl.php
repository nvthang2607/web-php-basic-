<?php
    if(!isset($bien_bao_mat)){exit();}
    $noi_dung=$_POST['noi_dung'];
    $noi_dung=str_replace("'","&#39;",$noi_dung);

    $sql="UPDATE quangcao SET HTML = '$noi_dung' WHERE ViTri='trai';";
    $result=mysqli_query($conn,$sql);
?>