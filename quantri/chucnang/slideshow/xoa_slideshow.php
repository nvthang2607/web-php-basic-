
<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    $id=$_GET['id'];   
    $sql="SELECT * from slideshow where ID='$id' ";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);

    $link_hinh="../hinhanh/slideshow/".$row['Hinh'];
    if(is_file($link_hinh))   
    {
        unlink($link_hinh);
    }
   
    $sql="DELETE FROM slideshow WHERE ID = $id ";
    $result=mysqli_query($conn,$sql);
?>