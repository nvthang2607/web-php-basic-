<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
//xóa từng sp trong hóa đơn
    $id=$_GET['id'];
    $mshh=$_GET['MSHH'];
    $sql="DELETE FROM chitietdathang WHERE SoDonDH = '$id' and MSHH='$mshh';";
    $result=mysqli_query($conn,$sql);
//kiểm ra lại nếu ko còn sp trong hóa đơn thì xóa luôn hóa đơn
    $sql1="SELECT count(*) FROM chitietdathang WHERE SoDonDH = '$id';";
    $result1=mysqli_query($conn,$sql1);
    $row1=mysqli_fetch_array($result1);
    if($row1['0']==0){
        $sql2="DELETE FROM dathang WHERE SoDonDH = '$id';";
        $result2=mysqli_query($conn,$sql2);
    }
?>