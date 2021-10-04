<br>
<div id="quangcao">
    Quảng cáo
</div>
<br><br>
<?php
//lấy dữ liệu để in ra quảng cáo bên trái trang
    $sql="SELECT HTML from quangcao where ViTri='trai' ";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    echo $row['HTML'];
?>