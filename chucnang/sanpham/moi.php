<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div id="spmoi">
        Sản phẩm mới
    </div>
<br><br>
<center>
    <?php
    //phần này hiển thị bên trái trang là sản phẩm mới
        $sql="SELECT MSHH,TenHH,Hinh,MaNhom from hanghoa order by MSHH desc limit 0,3";
        $result=mysqli_query($conn,$sql);
        

        
        while($row=mysqli_fetch_array($result))
        {   $manhom=$row['MaNhom'];
            $sql2="SELECT TenNhom from nhomhanghoa where MaNhom='$manhom';";
            $result2=mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_array($result2);
            $tennhom=$row2['TenNhom'];
            $link_anh="hinhanh/sanpham/".$tennhom.'/'.$row['Hinh'];
            $link_chi_tiet="?thamso=chi_tiet_san_pham&id=".$row['MSHH'];
            echo "<a href='$link_chi_tiet' >";
                echo "<img src='$link_anh' width='100px' >";
            echo "</a>";
            echo "<br><br>";
            echo $row['TenHH'];
            echo "<br>";
            echo "<br>";
        }
    ?>
</center>