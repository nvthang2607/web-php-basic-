<?php
    //lấy các tin trong dứ liệu để in ra
    $id=$_GET['id'];
    $sql="SELECT * from menu_ngang where ID='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo "<h1>";
        echo $row['Ten'];
    echo "</h1>";
    echo $row['Noi_Dung'];
?>