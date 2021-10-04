<?php
    $sql="SELECT * from nhomhanghoa order by MaNhom";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        while ($row = mysqli_fetch_array($result)) {
            //sử dụng "$row=mysqli_fetch_row($result)" khi in $row[0-4..]
            //nếu muốn in bảng với điều kiện là tên cột thì sd "$row = mysqli_fetch_array($result)"
            //và khi in thì phải in $row["tên_cột"] ví dụ ở data2.php
            $link="?thamso=xuat_san_pham&id=".$row['MaNhom'];
            echo "<li class='chucnang1'>";
            echo "<a class='ten_menu_doc' href='$link'>";
            echo  "$row[TenNhom]";
            echo "</a>";
            echo "</li>";
            echo "<br>";
        }
        mysqli_free_result($result);
    }
?>