<br>
<div id="quangcao">
    Quảng cáo
</div>
<br><br>
<?php
//lấy dữ liệu để in ra quảng cáo bên phải trang
    $sql="SELECT HTML from quangcao where ViTri='phai' ";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    echo $row['HTML'];
?>