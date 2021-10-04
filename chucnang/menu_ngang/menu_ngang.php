<?php
    $sql="SELECT ID,Ten,Loai_menu from menu_ngang order by ID";
    $result = mysqli_query($conn, $sql);
    echo "<li class='chucnang'>";
        echo "<a href='index.php'>Trang chủ</a>";
     echo "</li>";
    
    if ($result) {
        while ($row = mysqli_fetch_array($result)) {
            //sử dụng "$row=mysqli_fetch_row($result)" khi in $row[0-4..]
            //nếu muốn in bảng với điều kiện là tên cột thì sd "$row = mysqli_fetch_array($result)"
            //và khi in thì phải in $row["tên_cột"] ví dụ ở data2.php
            if($row['Loai_menu']==""){
                $link_menu="?thamso=xuat_mot_tin&id=".$row['ID'];
            }
            if($row['Loai_menu']=="san_pham"){
                $link_menu="?thamso=xuat_san_pham_2";
            }
            echo "<li class='chucnang'>";
            echo "<a class='ten_menu_ngang' href='$link_menu'>";
            echo  "$row[Ten]";
            echo "</a>";
            echo "</li>";
        }
        mysqli_free_result($result);
    }
?>