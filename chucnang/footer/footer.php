<?php
    /*đây là đoạn code để hiển thị dữ liệu từ bảng footer (em chỉ làm 1 footer,
    nếu muốn em có thể làm thêm nhiều footer để lựa chọn cũng được)*/
    //lấy dữ liệu từ bảng:
    $sql="SELECT * from footer limit 0,1";
    //gọi câu truy vấn đến mysql:
    $result=mysqli_query($conn,$sql);
    //dữ liệu lấy ra lưu vào biến row:
    $row=mysqli_fetch_array($result);
    //in dữ liệu ra:
    echo $row['HTML'];
?>